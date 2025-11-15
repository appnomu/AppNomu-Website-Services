<?php
// Start session for admin authentication
session_start();

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Set page title for header
$pageTitle = 'Projects Portfolio';

// Include standard website header
include_once '../includes/header.php';

// Load configuration
require_once '../config/config.php';

// Initialize variables
$projects = [];
$totalProjects = 0;
$errorMessage = '';
$successMessage = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        try {
            $pdo = Config::getDatabaseConnection();
            
            switch ($_POST['action']) {
                case 'delete':
                    $projectId = (int)$_POST['project_id'];
                    
                    // Get project details for logo deletion
                    $stmt = $pdo->prepare("SELECT logo_path FROM projects WHERE id = ?");
                    $stmt->execute([$projectId]);
                    $project = $stmt->fetch(PDO::FETCH_ASSOC);
                    
                    // Delete project
                    $stmt = $pdo->prepare("DELETE FROM projects WHERE id = ?");
                    if ($stmt->execute([$projectId])) {
                        // Delete logo file if exists
                        if ($project && $project['logo_path'] && file_exists($project['logo_path'])) {
                            unlink($project['logo_path']);
                        }
                        $successMessage = 'Project deleted successfully!';
                    } else {
                        $errorMessage = 'Failed to delete project.';
                    }
                    break;
                    
                case 'toggle_featured':
                    $projectId = (int)$_POST['project_id'];
                    $featured = (int)$_POST['featured'];
                    
                    $stmt = $pdo->prepare("UPDATE projects SET featured = ? WHERE id = ?");
                    if ($stmt->execute([$featured, $projectId])) {
                        $successMessage = $featured ? 'Project marked as featured!' : 'Project removed from featured!';
                    } else {
                        $errorMessage = 'Failed to update project status.';
                    }
                    break;
            }
        } catch (Exception $e) {
            $errorMessage = 'Error: ' . $e->getMessage();
        }
    }
}

// Get filter parameters
$statusFilter = $_GET['status'] ?? '';
$typeFilter = $_GET['type'] ?? '';
$searchQuery = $_GET['search'] ?? '';

try {
    $pdo = Config::getDatabaseConnection();
    
    // Build query with filters
    $whereConditions = [];
    $params = [];
    
    if ($statusFilter) {
        $whereConditions[] = "status = ?";
        $params[] = $statusFilter;
    }
    
    if ($typeFilter) {
        $whereConditions[] = "project_type = ?";
        $params[] = $typeFilter;
    }
    
    if ($searchQuery) {
        $whereConditions[] = "(title LIKE ? OR client_name LIKE ? OR description LIKE ?)";
        $searchParam = "%$searchQuery%";
        $params[] = $searchParam;
        $params[] = $searchParam;
        $params[] = $searchParam;
    }
    
    $whereClause = $whereConditions ? 'WHERE ' . implode(' AND ', $whereConditions) : '';
    
    // Get total count
    $countQuery = "SELECT COUNT(*) as total FROM projects $whereClause";
    $stmt = $pdo->prepare($countQuery);
    $stmt->execute($params);
    $totalProjects = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get projects
    $query = "SELECT * FROM projects $whereClause ORDER BY created_at DESC";
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $errorMessage = 'Database error: ' . $e->getMessage();
}
?>

<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <?php include_once __DIR__ . '/includes/admin-sidebar.php'; ?>
        
        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <div class="content-container">
                <!-- Header -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
                    <h1 class="h2">
                        <i class="bi bi-folder-fill me-2 text-primary"></i>
                        Projects Portfolio
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="/admin/add-project.php" class="btn btn-primary">
                            <i class="bi bi-plus-circle me-1"></i> Add New Project
                        </a>
                    </div>
                </div>

                <!-- Messages -->
                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <?php echo htmlspecialchars($errorMessage); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if ($successMessage): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        <?php echo htmlspecialchars($successMessage); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Filters -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <form method="GET" class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label">Search</label>
                                <input type="text" name="search" class="form-control" placeholder="Search projects..." value="<?php echo htmlspecialchars($searchQuery); ?>">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select">
                                    <option value="">All Statuses</option>
                                    <option value="Completed" <?php echo $statusFilter === 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                    <option value="Live" <?php echo $statusFilter === 'Live' ? 'selected' : ''; ?>>Live</option>
                                    <option value="Maintenance" <?php echo $statusFilter === 'Maintenance' ? 'selected' : ''; ?>>Maintenance</option>
                                    <option value="Archived" <?php echo $statusFilter === 'Archived' ? 'selected' : ''; ?>>Archived</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Type</label>
                                <select name="type" class="form-select">
                                    <option value="">All Types</option>
                                    <option value="Website" <?php echo $typeFilter === 'Website' ? 'selected' : ''; ?>>Website</option>
                                    <option value="Mobile App" <?php echo $typeFilter === 'Mobile App' ? 'selected' : ''; ?>>Mobile App</option>
                                    <option value="Web App" <?php echo $typeFilter === 'Web App' ? 'selected' : ''; ?>>Web App</option>
                                    <option value="Desktop App" <?php echo $typeFilter === 'Desktop App' ? 'selected' : ''; ?>>Desktop App</option>
                                    <option value="Other" <?php echo $typeFilter === 'Other' ? 'selected' : ''; ?>>Other</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">&nbsp;</label>
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-primary flex-fill">
                                        <i class="bi bi-search me-1"></i> Filter
                                    </button>
                                    <a href="projects.php" class="btn btn-outline-secondary">
                                        <i class="bi bi-arrow-clockwise"></i>
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Projects Table -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <i class="bi bi-table"></i> Projects Portfolio
                        <span class="badge bg-primary ms-2"><?php echo count($projects); ?> of <?php echo $totalProjects; ?></span>
                    </div>
                    <div class="card-body p-0">
                        <?php if (count($projects) > 0): ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Project</th>
                                            <th>Client</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Completion Date</th>
                                            <th>Time Spent</th>
                                            <th>Featured</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php foreach ($projects as $project): ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <?php if ($project['logo_path'] && file_exists($project['logo_path'])): ?>
                                                <img src="<?php echo htmlspecialchars($project['logo_path']); ?>" 
                                                     alt="<?php echo htmlspecialchars($project['title']); ?>" 
                                                     class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                            <?php else: ?>
                                                <div class="bg-primary bg-opacity-10 rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                    <i class="bi bi-folder text-primary"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <strong><?php echo htmlspecialchars($project['title']); ?></strong>
                                            <?php if ($project['url']): ?>
                                                <br><a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="small text-decoration-none">
                                                    <i class="bi bi-box-arrow-up-right"></i> Visit
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </td>
                                <td><?php echo htmlspecialchars($project['client_name'] ?: 'N/A'); ?></td>
                                <td><span class="badge bg-light text-dark"><?php echo htmlspecialchars($project['project_type']); ?></span></td>
                                <td>
                                    <span class="badge 
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
                                </td>
                                <td class="text-nowrap">
                                    <small><?php echo $project['completion_date'] ? date('M d, Y', strtotime($project['completion_date'])) : 'Not set'; ?></small>
                                </td>
                                <td class="text-nowrap">
                                    <?php if ($project['time_spent_hours']): ?>
                                        <span class="badge bg-info"><?php echo number_format($project['time_spent_hours'], 1); ?>h</span>
                                    <?php else: ?>
                                        <span class="text-muted">-</span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <?php if ($project['featured']): ?>
                                        <i class="bi bi-star-fill text-warning" title="Featured"></i>
                                    <?php else: ?>
                                        <i class="bi bi-star text-muted" title="Not Featured"></i>
                                    <?php endif; ?>
                                </td>
                                <td class="text-nowrap">
                                    <div class="btn-group" role="group">
                                        <a href="/admin/view-project.php?id=<?php echo $project['id']; ?>" class="btn btn-sm btn-outline-primary" title="View Details">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="/admin/edit-project.php?id=<?php echo $project['id']; ?>" class="btn btn-sm btn-outline-secondary" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <div class="btn-group" role="group">
                                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" title="More">
                                                <i class="bi bi-three-dots"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <form method="POST" class="d-inline">
                                                        <input type="hidden" name="action" value="toggle_featured">
                                                        <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
                                                        <input type="hidden" name="featured" value="<?php echo $project['featured'] ? 0 : 1; ?>">
                                                        <button type="submit" class="dropdown-item">
                                                            <i class="bi bi-star me-2"></i>
                                                            <?php echo $project['featured'] ? 'Unmark Featured' : 'Mark Featured'; ?>
                                                        </button>
                                                    </form>
                                                </li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li>
                                                    <form method="POST" class="d-inline" onsubmit="return confirm('Delete this project?')">
                                                        <input type="hidden" name="action" value="delete">
                                                        <input type="hidden" name="project_id" value="<?php echo $project['id']; ?>">
                                                        <button type="submit" class="dropdown-item text-danger">
                                                            <i class="bi bi-trash me-2"></i>Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <!-- Empty State -->
                            <div class="text-center py-5">
                                <i class="bi bi-folder-x fs-1 text-muted mb-3"></i>
                                <h5 class="text-muted">No Projects Found</h5>
                                <p class="text-muted mb-4">
                                    <?php if ($searchQuery || $statusFilter || $typeFilter): ?>
                                        No projects match your current filters. Try adjusting your search criteria.
                                    <?php else: ?>
                                        Start building your portfolio by adding your first completed project.
                                    <?php endif; ?>
                                </p>
                                <a href="/admin/add-project.php" class="btn btn-primary">
                                    <i class="bi bi-plus-circle me-1"></i> Add Your First Project
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Custom CSS -->
<link rel="stylesheet" href="css/admin-dashboard.css">

<?php include_once '../includes/footer.php'; ?>
