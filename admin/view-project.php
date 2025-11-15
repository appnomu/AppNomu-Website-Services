<?php
// Start session for admin authentication
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Load configuration
require_once '../config/config.php';

// Get project ID
$projectId = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if (!$projectId) {
    header("Location: projects.php");
    exit;
}

$project = null;
$errorMessage = '';

// Get project data
try {
    $pdo = Config::getDatabaseConnection();
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
    $stmt->execute([$projectId]);
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$project) {
        header("Location: projects.php");
        exit;
    }
} catch (Exception $e) {
    $errorMessage = 'Error loading project: ' . $e->getMessage();
}

// Set page title
$pageTitle = 'Project Details - ' . ($project['title'] ?? 'Unknown');

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
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <?php echo htmlspecialchars($errorMessage); ?>
                    </div>
                <?php elseif ($project): ?>
                    <!-- Header -->
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                        <div class="d-flex align-items-center">
                            <?php if ($project['logo_path'] && file_exists($project['logo_path'])): ?>
                                <img src="<?php echo htmlspecialchars($project['logo_path']); ?>" 
                                     alt="<?php echo htmlspecialchars($project['title']); ?>" 
                                     class="rounded me-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <?php else: ?>
                                <div class="bg-primary bg-opacity-10 rounded me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-folder fs-3 text-primary"></i>
                                </div>
                            <?php endif; ?>
                            <div>
                                <h1 class="h2 mb-0">
                                    <?php echo htmlspecialchars($project['title']); ?>
                                    <?php if ($project['featured']): ?>
                                        <i class="bi bi-star-fill text-warning ms-2" title="Featured Project"></i>
                                    <?php endif; ?>
                                </h1>
                                <p class="text-muted mb-0"><?php echo htmlspecialchars($project['project_type']); ?></p>
                            </div>
                        </div>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <a href="<?php echo adminUrl('add-project.php?id=' . $project['id']); ?>" class="btn btn-primary">
                                    <i class="bi bi-pencil me-1"></i> Edit Project
                                </a>
                                <?php if ($project['url']): ?>
                                    <a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="btn btn-success">
                                        <i class="bi bi-box-arrow-up-right me-1"></i> Visit Live Site
                                    </a>
                                <?php endif; ?>
                            </div>
                            <a href="<?php echo adminUrl('projects.php'); ?>" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i> Back to Projects
                            </a>
                        </div>
                    </div>

                    <div class="row g-4">
                        <!-- Main Project Information -->
                        <div class="col-lg-8">
                            <!-- Project Overview -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-info-circle me-2 text-primary"></i>
                                        Project Overview
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <?php if ($project['description']): ?>
                                        <p class="card-text"><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                                    <?php else: ?>
                                        <p class="text-muted">No description provided.</p>
                                    <?php endif; ?>
                                    
                                    <?php if ($project['url']): ?>
                                        <div class="mt-3">
                                            <strong>Project URL:</strong>
                                            <a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="ms-2">
                                                <?php echo htmlspecialchars($project['url']); ?>
                                                <i class="bi bi-box-arrow-up-right ms-1"></i>
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Technologies Used -->
                            <?php if ($project['technologies']): ?>
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0">
                                            <i class="bi bi-code-slash me-2 text-primary"></i>
                                            Technologies Used
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex flex-wrap gap-2">
                                            <?php 
                                            $technologies = array_map('trim', explode(',', $project['technologies']));
                                            foreach ($technologies as $tech): 
                                                if (!empty($tech)):
                                            ?>
                                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2 rounded-pill">
                                                    <?php echo htmlspecialchars($tech); ?>
                                                </span>
                                            <?php 
                                                endif;
                                            endforeach; 
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Remarks & Notes -->
                            <?php if ($project['remarks']): ?>
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0">
                                            <i class="bi bi-chat-text me-2 text-primary"></i>
                                            Remarks & Notes
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text"><?php echo nl2br(htmlspecialchars($project['remarks'])); ?></p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Sidebar Information -->
                        <div class="col-lg-4">
                            <!-- Project Status -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-gear me-2 text-primary"></i>
                                        Project Status
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="text-center mb-3">
                                        <span class="badge rounded-pill fs-6 px-4 py-2
                                            <?php
                                            switch ($project['status']) {
                                                case 'Completed': echo 'bg-success'; break;
                                                case 'Live': echo 'bg-primary'; break;
                                                case 'Maintenance': echo 'bg-warning text-dark'; break;
                                                case 'Archived': echo 'bg-secondary'; break;
                                                default: echo 'bg-secondary';
                                            }
                                            ?>">
                                            <?php echo htmlspecialchars($project['status']); ?>
                                        </span>
                                    </div>
                                    
                                    <div class="row g-3 text-center">
                                        <div class="col-6">
                                            <div class="bg-light rounded p-3">
                                                <i class="bi bi-calendar-check fs-4 text-success mb-2"></i>
                                                <h6 class="mb-0">Created</h6>
                                                <small class="text-muted">
                                                    <?php echo date('M d, Y', strtotime($project['created_at'])); ?>
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-light rounded p-3">
                                                <i class="bi bi-arrow-clockwise fs-4 text-info mb-2"></i>
                                                <h6 class="mb-0">Updated</h6>
                                                <small class="text-muted">
                                                    <?php echo $project['updated_at'] ? date('M d, Y', strtotime($project['updated_at'])) : 'Never'; ?>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Client Information -->
                            <?php if ($project['client_name'] || $project['client_email']): ?>
                                <div class="card border-0 shadow-sm mb-4">
                                    <div class="card-header bg-transparent">
                                        <h5 class="mb-0">
                                            <i class="bi bi-person me-2 text-primary"></i>
                                            Client Information
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <?php if ($project['client_name']): ?>
                                            <div class="d-flex align-items-center mb-3">
                                                <i class="bi bi-person-circle me-3 text-muted"></i>
                                                <div>
                                                    <h6 class="mb-0"><?php echo htmlspecialchars($project['client_name']); ?></h6>
                                                    <small class="text-muted">Client Name</small>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($project['client_email']): ?>
                                            <div class="d-flex align-items-center">
                                                <i class="bi bi-envelope me-3 text-muted"></i>
                                                <div>
                                                    <h6 class="mb-0">
                                                        <a href="mailto:<?php echo htmlspecialchars($project['client_email']); ?>" class="text-decoration-none">
                                                            <?php echo htmlspecialchars($project['client_email']); ?>
                                                        </a>
                                                    </h6>
                                                    <small class="text-muted">Email Address</small>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <!-- Timeline & Hours -->
                            <div class="card border-0 shadow-sm mb-4">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-clock me-2 text-primary"></i>
                                        Timeline & Hours
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <?php if ($project['time_spent_hours']): ?>
                                        <div class="text-center mb-4">
                                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                <span class="fs-4 fw-bold text-primary">
                                                    <?php echo number_format($project['time_spent_hours'], 1); ?>h
                                                </span>
                                            </div>
                                            <p class="text-muted mt-2 mb-0">Total Hours Spent</p>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="row g-3">
                                        <?php if ($project['start_date']): ?>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <i class="bi bi-play-circle fs-4 text-success mb-2"></i>
                                                    <h6 class="mb-0">Started</h6>
                                                    <small class="text-muted">
                                                        <?php echo date('M d, Y', strtotime($project['start_date'])); ?>
                                                    </small>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <?php if ($project['completion_date']): ?>
                                            <div class="col-6">
                                                <div class="text-center">
                                                    <i class="bi bi-check-circle fs-4 text-primary mb-2"></i>
                                                    <h6 class="mb-0">Completed</h6>
                                                    <small class="text-muted">
                                                        <?php echo date('M d, Y', strtotime($project['completion_date'])); ?>
                                                    </small>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <?php if ($project['start_date'] && $project['completion_date']): ?>
                                        <?php 
                                        $start = new DateTime($project['start_date']);
                                        $end = new DateTime($project['completion_date']);
                                        $duration = $start->diff($end);
                                        ?>
                                        <div class="mt-3 pt-3 border-top">
                                            <div class="text-center">
                                                <i class="bi bi-calendar-range text-info"></i>
                                                <strong class="ms-2">Duration: <?php echo $duration->days; ?> days</strong>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-lightning-charge me-2 text-primary"></i>
                                        Quick Actions
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="d-grid gap-2">
                                        <a href="<?php echo adminUrl('add-project.php?id=' . $project['id']); ?>" class="btn btn-primary">
                                            <i class="bi bi-pencil me-2"></i>Edit Project
                                        </a>
                                        <?php if ($project['url']): ?>
                                            <a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="btn btn-success">
                                                <i class="bi bi-box-arrow-up-right me-2"></i>Visit Live Site
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo adminUrl('projects.php'); ?>" class="btn btn-outline-secondary">
                                            <i class="bi bi-list me-2"></i>All Projects
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </main>
    </div>
</div>

<!-- Custom CSS -->
<link rel="stylesheet" href="css/admin-dashboard.css">

<?php include_once '../includes/footer.php'; ?>
