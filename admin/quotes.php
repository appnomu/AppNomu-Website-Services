<?php
// Start session for admin authentication
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

// Load configuration
require_once '../config/config.php';

// Initialize variables
$quotes = [];
$errorMessage = '';
$successMessage = '';

try {
    // Create database connection
    $pdo = Config::getDatabaseConnection();
    
    // Handle status updates if form submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
        $quoteId = $_POST['quote_id'] ?? '';
        $newStatus = $_POST['status'] ?? '';
        $adminNotes = $_POST['admin_notes'] ?? '';
        
        if (!empty($quoteId) && !empty($newStatus)) {
            $updateStmt = $pdo->prepare("
                UPDATE quote_requests 
                SET status = :status, admin_notes = :admin_notes, last_updated = NOW()
                WHERE quote_id = :quote_id
            ");
            
            $updateStmt->bindParam(':status', $newStatus);
            $updateStmt->bindParam(':admin_notes', $adminNotes);
            $updateStmt->bindParam(':quote_id', $quoteId);
            
            if ($updateStmt->execute()) {
                $successMessage = "Quote #$quoteId has been updated successfully.";
            } else {
                $errorMessage = "Failed to update quote status.";
            }
        }
    }
    
    // Get filter parameters
    $status = $_GET['status'] ?? 'all';
    $search = $_GET['search'] ?? '';
    $dateFrom = $_GET['date_from'] ?? '';
    $dateTo = $_GET['date_to'] ?? '';
    
    // Base query
    $sql = "SELECT * FROM quote_requests WHERE 1=1";
    $params = [];
    
    // Add filters
    if ($status !== 'all') {
        $sql .= " AND status = :status";
        $params[':status'] = $status;
    }
    
    if (!empty($search)) {
        $sql .= " AND (quote_id LIKE :search OR full_name LIKE :search OR email LIKE :search OR services LIKE :search)";
        $params[':search'] = "%$search%";
    }
    
    if (!empty($dateFrom)) {
        $sql .= " AND date_submitted >= :date_from";
        $params[':date_from'] = $dateFrom . ' 00:00:00';
    }
    
    if (!empty($dateTo)) {
        $sql .= " AND date_submitted <= :date_to";
        $params[':date_to'] = $dateTo . ' 23:59:59';
    }
    
    // Order by most recent first
    $sql .= " ORDER BY date_submitted DESC";
    
    // Prepare and execute query
    $stmt = $pdo->prepare($sql);
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->execute();
    
    // Fetch all quotes
    $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $errorMessage = "Database error: " . $e->getMessage();
}
?>

<?php
// Set page title for header
$pageTitle = 'Quote Requests';

// Include standard website header
include_once '../includes/header.php';
?>

<style>
    .quote-detail-row {
        display: none;
    }
    .status-new { background-color: #cfe2ff; }
    .status-in-progress { background-color: #fff3cd; }
    .status-quoted { background-color: #d1e7dd; }
    .status-accepted { background-color: #d1e7dd; }
    .status-rejected { background-color: #f8d7da; }
    .status-completed { background-color: #d1e7dd; }
</style>
    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include_once 'includes/admin-sidebar.php'; ?>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="content-container">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Quote Requests</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="window.print()">
                                <i class="bi bi-printer"></i> Print Report
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary ms-2" id="exportCsv">
                                <i class="bi bi-file-earmark-excel"></i> Export CSV
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
                
                <!-- Filters -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-funnel"></i> Filter Quote Requests
                    </div>
                    <div class="card-body">
                        <form method="GET" action="" class="row g-3">
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="all" <?php echo $status === 'all' ? 'selected' : ''; ?>>All Statuses</option>
                                    <option value="New" <?php echo $status === 'New' ? 'selected' : ''; ?>>New</option>
                                    <option value="In Progress" <?php echo $status === 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                    <option value="Quoted" <?php echo $status === 'Quoted' ? 'selected' : ''; ?>>Quoted</option>
                                    <option value="Accepted" <?php echo $status === 'Accepted' ? 'selected' : ''; ?>>Accepted</option>
                                    <option value="Rejected" <?php echo $status === 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                    <option value="Completed" <?php echo $status === 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="search" class="form-label">Search</label>
                                <input type="text" class="form-control" id="search" name="search" placeholder="Name, Email, or ID" value="<?php echo htmlspecialchars($search); ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="date_from" class="form-label">Date From</label>
                                <input type="date" class="form-control" id="date_from" name="date_from" value="<?php echo $dateFrom; ?>">
                            </div>
                            <div class="col-md-3">
                                <label for="date_to" class="form-label">Date To</label>
                                <input type="date" class="form-control" id="date_to" name="date_to" value="<?php echo $dateTo; ?>">
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Apply Filters</button>
                                <a href="quotes.php" class="btn btn-outline-secondary">Clear Filters</a>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Quotes Table -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="bi bi-table"></i> Quote Requests
                        <span class="badge bg-primary"><?php echo count($quotes); ?> Results</span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Quote ID</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Services</th>
                                        <th>Budget</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($quotes) > 0): ?>
                                        <?php foreach ($quotes as $quote): ?>
                                            <tr class="<?php echo 'status-' . strtolower(str_replace(' ', '-', $quote['status'])); ?>">
                                                <td><?php echo htmlspecialchars($quote['quote_id']); ?></td>
                                                <td><?php echo date('M d, Y', strtotime($quote['date_submitted'])); ?></td>
                                                <td><?php echo htmlspecialchars($quote['full_name']); ?></td>
                                                <td>
                                                    <a href="mailto:<?php echo htmlspecialchars($quote['email']); ?>">
                                                        <?php echo htmlspecialchars($quote['email']); ?>
                                                    </a>
                                                </td>
                                                <td><?php echo htmlspecialchars(substr($quote['services'], 0, 30) . (strlen($quote['services']) > 30 ? '...' : '')); ?></td>
                                                <td><?php echo htmlspecialchars($quote['budget']); ?></td>
                                                <td>
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
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-primary view-details me-1" data-quote-id="<?php echo $quote['quote_id']; ?>">
                                                        <i class="bi bi-eye"></i> Quick View
                                                    </button>
                                                    <a href="/admin/view-quote.php?id=<?php echo urlencode($quote['quote_id']); ?>" class="btn btn-sm btn-outline-primary">
                                                        <i class="bi bi-file-earmark-text"></i> Full Details
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Details Row -->
                                            <tr class="quote-detail-row" id="details-<?php echo $quote['quote_id']; ?>">
                                                <td colspan="8">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h5>Client Information</h5>
                                                                    <dl class="row">
                                                                        <dt class="col-sm-4">Full Name:</dt>
                                                                        <dd class="col-sm-8"><?php echo htmlspecialchars($quote['full_name']); ?></dd>
                                                                        
                                                                        <dt class="col-sm-4">Email:</dt>
                                                                        <dd class="col-sm-8"><?php echo htmlspecialchars($quote['email']); ?></dd>
                                                                        
                                                                        <dt class="col-sm-4">Phone:</dt>
                                                                        <dd class="col-sm-8"><?php echo htmlspecialchars($quote['phone_number']); ?></dd>
                                                                        
                                                                        <dt class="col-sm-4">Country:</dt>
                                                                        <dd class="col-sm-8"><?php echo htmlspecialchars($quote['country']); ?></dd>
                                                                    </dl>
                                                                    
                                                                    <h5>Project Request</h5>
                                                                    <dl class="row">
                                                                        <dt class="col-sm-4">Services:</dt>
                                                                        <dd class="col-sm-8"><?php echo htmlspecialchars($quote['services']); ?></dd>
                                                                        
                                                                        <dt class="col-sm-4">Budget:</dt>
                                                                        <dd class="col-sm-8"><?php echo htmlspecialchars($quote['budget']); ?></dd>
                                                                        
                                                                        <dt class="col-sm-4">Timeline:</dt>
                                                                        <dd class="col-sm-8"><?php echo htmlspecialchars($quote['timeline']); ?></dd>
                                                                    </dl>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h5>Problem Description</h5>
                                                                    <p><?php echo nl2br(htmlspecialchars($quote['current_problem'])); ?></p>
                                                                    
                                                                    <h5>Business Information</h5>
                                                                    <p><?php echo nl2br(htmlspecialchars($quote['business_info'])); ?></p>
                                                                    
                                                                    <?php if (!empty($quote['uploaded_files'])): ?>
                                                                    <h5>Uploaded Files</h5>
                                                                    <ul class="list-group">
                                                                        <?php 
                                                                        $files = explode(', ', $quote['uploaded_files']);
                                                                        foreach ($files as $file): 
                                                                            if (!empty($file)):
                                                                                $fileName = basename($file);
                                                                        ?>
                                                                        <li class="list-group-item">
                                                                            <a href="../<?php echo $file; ?>" target="_blank">
                                                                                <i class="bi bi-file-earmark"></i> <?php echo htmlspecialchars($fileName); ?>
                                                                            </a>
                                                                        </li>
                                                                        <?php 
                                                                            endif;
                                                                        endforeach; 
                                                                        ?>
                                                                    </ul>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                            
                                                            <!-- Status Update Form -->
                                                            <form method="POST" action="" class="mt-4 border-top pt-3">
                                                                <h5>Update Status</h5>
                                                                <div class="row g-3">
                                                                    <div class="col-md-4">
                                                                        <label for="status-<?php echo $quote['quote_id']; ?>" class="form-label">Status</label>
                                                                        <select class="form-select" id="status-<?php echo $quote['quote_id']; ?>" name="status">
                                                                            <option value="New" <?php echo $quote['status'] === 'New' ? 'selected' : ''; ?>>New</option>
                                                                            <option value="In Progress" <?php echo $quote['status'] === 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                                                                            <option value="Quoted" <?php echo $quote['status'] === 'Quoted' ? 'selected' : ''; ?>>Quoted</option>
                                                                            <option value="Accepted" <?php echo $quote['status'] === 'Accepted' ? 'selected' : ''; ?>>Accepted</option>
                                                                            <option value="Rejected" <?php echo $quote['status'] === 'Rejected' ? 'selected' : ''; ?>>Rejected</option>
                                                                            <option value="Completed" <?php echo $quote['status'] === 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-8">
                                                                        <label for="admin_notes-<?php echo $quote['quote_id']; ?>" class="form-label">Admin Notes</label>
                                                                        <textarea class="form-control" id="admin_notes-<?php echo $quote['quote_id']; ?>" name="admin_notes" rows="2"><?php echo htmlspecialchars($quote['admin_notes'] ?? ''); ?></textarea>
                                                                    </div>
                                                                    <div class="col-12">
                                                                        <input type="hidden" name="quote_id" value="<?php echo $quote['quote_id']; ?>">
                                                                        <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
                                                                        <a href="mailto:<?php echo htmlspecialchars($quote['email']); ?>" class="btn btn-outline-secondary">
                                                                            <i class="bi bi-envelope"></i> Email Client
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" class="text-center py-4">
                                                <div class="alert alert-info mb-0">
                                                    <i class="bi bi-info-circle me-2"></i> No quote requests found matching your criteria.
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- End content-container -->
            </main>
        </div>
    </div>
    
    <!-- Custom Scripts -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle view details buttons
        const viewDetailsButtons = document.querySelectorAll('.view-details');
        viewDetailsButtons.forEach(button => {
            button.addEventListener('click', function() {
                const quoteId = this.getAttribute('data-quote-id');
                const detailsRow = document.getElementById('details-' + quoteId);
                
                // Hide all other detail rows first
                document.querySelectorAll('.quote-detail-row').forEach(row => {
                    if (row.id !== 'details-' + quoteId) {
                        row.style.display = 'none';
                    }
                });
                
                // Toggle the selected detail row
                if (detailsRow.style.display === 'table-row') {
                    detailsRow.style.display = 'none';
                } else {
                    detailsRow.style.display = 'table-row';
                }
            });
        });
        
        // Export to CSV functionality
        document.getElementById('exportCsv').addEventListener('click', function() {
            window.location.href = 'export-quotes.php?' + new URLSearchParams(window.location.search).toString();
        });
    });
    </script>

<?php include_once '../includes/footer.php'; ?>
