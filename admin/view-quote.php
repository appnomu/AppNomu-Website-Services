<?php
// Start session for admin authentication
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

require_once __DIR__ . '/includes/quote-status-notifier.php';

// Set page title for header
$pageTitle = 'View Quote Request';

// Load configuration
require_once '../config/config.php';

// Initialize variables
$quote = null;
$errorMessage = '';
$successMessage = '';

// Get quote ID from URL parameter
$quoteId = $_GET['id'] ?? '';

if (empty($quoteId)) {
    header("Location: quotes.php");
    exit;
}

try {
    // Create database connection
    $pdo = Config::getDatabaseConnection();
    
    // Handle status updates if form submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
        $newStatus = $_POST['status'] ?? '';
        $adminNotes = $_POST['admin_notes'] ?? '';
        $notifyClient = isset($_POST['notify_client']) ? true : false;
        
        if (!empty($newStatus)) {
            // First get current status before update
            $currentStatusStmt = $pdo->prepare("SELECT status FROM quote_requests WHERE quote_id = :quote_id");
            $currentStatusStmt->bindParam(':quote_id', $quoteId);
            $currentStatusStmt->execute();
            $oldStatus = $currentStatusStmt->fetchColumn();
            
            // Update the quote status
            $updateStmt = $pdo->prepare("
                UPDATE quote_requests 
                SET status = :status, admin_notes = :admin_notes, last_updated = NOW()
                WHERE quote_id = :quote_id
            ");
            
            $updateStmt->bindParam(':status', $newStatus);
            $updateStmt->bindParam(':admin_notes', $adminNotes);
            $updateStmt->bindParam(':quote_id', $quoteId);
            
            $updateSuccess = $updateStmt->execute();
            
            if ($updateSuccess) {
                $successMessage = "Quote #$quoteId has been updated successfully.";
                
                // Send notification email if requested and status has changed
                if ($notifyClient && $oldStatus !== $newStatus) {
                    // Refresh quote data after update
                    $refreshStmt = $pdo->prepare("SELECT * FROM quote_requests WHERE quote_id = :quote_id");
                    $refreshStmt->bindParam(':quote_id', $quoteId);
                    $refreshStmt->execute();
                    $updatedQuote = $refreshStmt->fetch(PDO::FETCH_ASSOC);
                    
                    if ($updatedQuote) {
                        $emailSent = sendQuoteStatusNotification($updatedQuote, $oldStatus, $newStatus);
                        
                        if ($emailSent) {
                            $successMessage .= " Client has been notified of the status change via email.";
                        } else {
                            $successMessage .= " However, there was an issue sending the notification email to the client.";
                        }
                    }
                }
            } else {
                $errorMessage = "Failed to update quote status.";
            }
        }
    }
    
    // Get quote details
    $stmt = $pdo->prepare("SELECT * FROM quote_requests WHERE quote_id = :quote_id");
    $stmt->bindParam(':quote_id', $quoteId);
    $stmt->execute();
    
    // Fetch quote
    $quote = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$quote) {
        $errorMessage = "Quote #$quoteId not found.";
    }
    
} catch (PDOException $e) {
    $errorMessage = "Database error: " . $e->getMessage();
}

// Include standard website header
include_once '../includes/header.php';
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include_once __DIR__ . '/includes/admin-sidebar.php'; ?>
        
        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="content-container">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">
                        <i class="bi bi-clipboard-data me-2"></i>
                        Quote Request #<?php echo $quoteId; ?>
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <?php
                        // Include the path utilities
                        require_once __DIR__ . '/includes/path-utils.php';
                        ?>
                        <a href="<?php echo adminUrl('quotes.php'); ?>" class="btn btn-sm btn-outline-secondary me-2">
                            <i class="bi bi-arrow-left"></i> Back to Quotes
                        </a>
                        <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()">
                            <i class="bi bi-printer"></i> Print Quote
                        </button>
                    </div>
                </div>
                
                <?php if (!empty($errorMessage)): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $errorMessage; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $successMessage; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php endif; ?>
                
                <?php if ($quote): ?>
                <!-- Quote Details -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-person me-2"></i> Client Information
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <dt class="col-sm-4 text-sm-end">Full Name:</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($quote['full_name']); ?></dd>
                                    
                                    <dt class="col-sm-4 text-sm-end">Email:</dt>
                                    <dd class="col-sm-8">
                                        <a href="mailto:<?php echo htmlspecialchars($quote['email']); ?>">
                                            <?php echo htmlspecialchars($quote['email']); ?>
                                        </a>
                                    </dd>
                                    
                                    <dt class="col-sm-4 text-sm-end">Phone:</dt>
                                    <dd class="col-sm-8">
                                        <a href="tel:<?php echo htmlspecialchars($quote['phone_number']); ?>">
                                            <?php echo htmlspecialchars($quote['phone_number']); ?>
                                        </a>
                                    </dd>
                                    
                                    <dt class="col-sm-4 text-sm-end">Country:</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($quote['country']); ?></dd>
                                    
                                    <dt class="col-sm-4 text-sm-end">Date Submitted:</dt>
                                    <dd class="col-sm-8"><?php echo date('F j, Y, g:i a', strtotime($quote['date_submitted'])); ?></dd>
                                    
                                    <dt class="col-sm-4 text-sm-end">Last Updated:</dt>
                                    <dd class="col-sm-8">
                                        <?php echo $quote['last_updated'] ? date('F j, Y, g:i a', strtotime($quote['last_updated'])) : 'Not updated yet'; ?>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-briefcase me-2"></i> Project Details
                            </div>
                            <div class="card-body">
                                <dl class="row mb-0">
                                    <dt class="col-sm-4 text-sm-end">Services:</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($quote['services']); ?></dd>
                                    
                                    <dt class="col-sm-4 text-sm-end">Budget:</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($quote['budget']); ?></dd>
                                    
                                    <dt class="col-sm-4 text-sm-end">Timeline:</dt>
                                    <dd class="col-sm-8"><?php echo htmlspecialchars($quote['timeline']); ?></dd>
                                    
                                    <dt class="col-sm-4 text-sm-end">Current Status:</dt>
                                    <dd class="col-sm-8">
                                        <span class="badge 
                                            <?php
                                            switch ($quote['status']) {
                                                case 'New': echo 'bg-primary'; break;
                                                case 'In Progress': echo 'bg-warning text-dark'; break;
                                                case 'Quoted': echo 'bg-info'; break;
                                                case 'Accepted': echo 'bg-success'; break;
                                                case 'Rejected': echo 'bg-danger'; break;
                                                case 'Completed': echo 'bg-secondary'; break;
                                                default: echo 'bg-secondary';
                                            }
                                            ?>">
                                            <?php echo htmlspecialchars($quote['status']); ?>
                                        </span>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-chat-quote me-2"></i> Project Description
                            </div>
                            <div class="card-body">
                                <div class="mb-4">
                                    <h5>Current Problem/Challenge</h5>
                                    <div class="p-3 bg-light rounded">
                                        <?php echo nl2br(htmlspecialchars($quote['current_problem'])); ?>
                                    </div>
                                </div>
                                
                                <div>
                                    <h5>Business Information</h5>
                                    <div class="p-3 bg-light rounded">
                                        <?php echo nl2br(htmlspecialchars($quote['business_info'])); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php if (!empty($quote['uploaded_files'])): ?>
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-paperclip me-2"></i> Attached Files
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <?php 
                                    $files = explode(', ', $quote['uploaded_files']);
                                    foreach ($files as $file):
                                        if (!empty($file)):
                                            $fileName = basename($file);
                                            $fileExt = pathinfo($fileName, PATHINFO_EXTENSION);
                                            $iconClass = 'bi-file-earmark';
                                            
                                            // Determine file icon based on extension
                                            switch(strtolower($fileExt)) {
                                                case 'pdf': $iconClass = 'bi-file-earmark-pdf'; break;
                                                case 'doc': 
                                                case 'docx': $iconClass = 'bi-file-earmark-word'; break;
                                                case 'xls': 
                                                case 'xlsx': $iconClass = 'bi-file-earmark-excel'; break;
                                                case 'ppt': 
                                                case 'pptx': $iconClass = 'bi-file-earmark-ppt'; break;
                                                case 'jpg': 
                                                case 'jpeg': 
                                                case 'png': 
                                                case 'gif': $iconClass = 'bi-file-earmark-image'; break;
                                                case 'zip': 
                                                case 'rar': $iconClass = 'bi-file-earmark-zip'; break;
                                            }
                                    ?>
                                    <div class="col-md-3 mb-3">
                                        <div class="card h-100">
                                            <div class="card-body text-center">
                                                <a href="<?php echo str_replace('../', '/', $file); ?>" target="_blank">
                                                    <i class="bi <?php echo $iconClass; ?> display-4 mb-2"></i>
                                                    <p class="mb-2 text-truncate"><?php echo htmlspecialchars($fileName); ?></p>
                                                    <button class="btn btn-sm btn-outline-primary">
                                                        View File
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php 
                                        endif;
                                    endforeach; 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Status Update Form -->
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <i class="bi bi-pencil-square me-2"></i> Update Quote Status
                            </div>
                            <div class="card-body">
                                <form method="POST" action="">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="status" class="form-label">Status</label>
                                            <select class="form-select" id="status" name="status">
                                                <option value="New" <?php echo $quote['status'] === 'New' ? 'selected' : ''; ?>>New</option>
                                                <option value="In Progress" <?php echo $quote['status'] === 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                                <option value="Quoted" <?php echo $quote['status'] === 'Quoted' ? 'selected' : ''; ?>>Quoted</option>
                                                <option value="Accepted" <?php echo $quote['status'] === 'Accepted' ? 'selected' : ''; ?>>Accepted</option>
                                                <option value="Rejected" <?php echo $quote['status'] === 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                                <option value="Completed" <?php echo $quote['status'] === 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="admin_notes" class="form-label">Admin Notes</label>
                                        <textarea class="form-control" id="admin_notes" name="admin_notes" rows="4"><?php echo htmlspecialchars($quote['admin_notes'] ?? ''); ?></textarea>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="notify_client" name="notify_client" checked>
                                            <label class="form-check-label" for="notify_client">
                                                Send email notification to client about status change
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex gap-2">
                                        <button type="submit" name="update_status" class="btn btn-primary">
                                            <i class="bi bi-save"></i> Update Status
                                        </button>
                                        <a href="mailto:<?php echo htmlspecialchars($quote['email']); ?>" class="btn btn-outline-primary">
                                            <i class="bi bi-envelope"></i> Email Client
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <?php else: ?>
                <div class="alert alert-warning">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    Quote not found or has been deleted.
                </div>
                <div class="text-center mt-4">
                    <a href="quotes.php" class="btn btn-primary">
                        <i class="bi bi-arrow-left me-2"></i> Back to All Quotes
                    </a>
                </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Add any specific scripts for the view quote page here
});
</script>

<?php
// Include standard website footer
include_once '../includes/footer.php';
?>
