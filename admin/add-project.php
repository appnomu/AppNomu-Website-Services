<?php
// Start session for admin authentication with secure configuration
ini_set('session.cookie_httponly', 1);
ini_set('session.cookie_secure', 1);
ini_set('session.cookie_samesite', 'Strict');
ini_set('session.use_strict_mode', 1);
session_start();

// Regenerate session ID periodically to prevent session fixation
if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
} else if (time() - $_SESSION['created'] > 1800) {
    session_regenerate_id(true);
    $_SESSION['created'] = time();
}

// Generate CSRF token if not exists
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Load configuration
require_once '../config/config.php';

// Check if editing existing project
$isEdit = isset($_GET['id']) && !empty($_GET['id']);
$projectId = $isEdit ? (int)$_GET['id'] : 0;
$project = null;

$errorMessage = '';
$successMessage = '';

// Get existing project data if editing
if ($isEdit) {
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
        // Log error for debugging
        error_log('Project load error: ' . $e->getMessage() . ' | Project ID: ' . $projectId);
        
        // Show generic error to user (don't expose database details)
        $errorMessage = 'Error loading project. Please try again or contact support.';
    }
}

// Handle form submission BEFORE including header
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // CSRF Protection
        if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
            throw new Exception('Security validation failed. Please try again.');
        }
        
        // Rate Limiting - Prevent abuse
        if (!isset($_SESSION['form_submissions'])) {
            $_SESSION['form_submissions'] = [];
        }
        $now = time();
        $_SESSION['form_submissions'] = array_filter(
            $_SESSION['form_submissions'],
            function($time) use ($now) { return $time > $now - 3600; }
        );
        if (count($_SESSION['form_submissions']) >= 10) {
            throw new Exception('Too many submissions. Please try again in an hour.');
        }
        $_SESSION['form_submissions'][] = $now;
        
        $pdo = Config::getDatabaseConnection();
        
        // Validate required fields
        $title = trim($_POST['title'] ?? '');
        $projectType = $_POST['project_type'] ?? 'Website';
        $url = trim($_POST['url'] ?? '');
        $clientName = trim($_POST['client_name'] ?? '');
        $clientEmail = trim($_POST['client_email'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $technologies = trim($_POST['technologies'] ?? '');
        $timeSpent = floatval($_POST['time_spent_hours'] ?? 0);
        $startDate = $_POST['start_date'] ?? null;
        $completionDate = $_POST['completion_date'] ?? null;
        $status = $_POST['status'] ?? 'Completed';
        $remarks = trim($_POST['remarks'] ?? '');
        $featured = isset($_POST['featured']) ? 1 : 0;
        
        // Input Validation
        if (empty($title)) {
            throw new Exception('Project title is required.');
        }
        if (strlen($title) > 200) {
            throw new Exception('Project title is too long (maximum 200 characters).');
        }
        if (strlen($description) > 5000) {
            throw new Exception('Description is too long (maximum 5000 characters).');
        }
        if (strlen($technologies) > 1000) {
            throw new Exception('Technologies field is too long (maximum 1000 characters).');
        }
        if (strlen($remarks) > 2000) {
            throw new Exception('Remarks field is too long (maximum 2000 characters).');
        }
        
        // Email Validation
        if (!empty($clientEmail) && !filter_var($clientEmail, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email address format.');
        }
        
        // URL Validation
        if (!empty($url) && !filter_var($url, FILTER_VALIDATE_URL)) {
            throw new Exception('Invalid URL format. Please include http:// or https://');
        }
        
        // Whitelist validation for project type and status
        $allowedTypes = ['Website', 'Mobile App', 'Web App', 'Desktop App', 'Other'];
        if (!in_array($projectType, $allowedTypes)) {
            throw new Exception('Invalid project type.');
        }
        $allowedStatuses = ['Completed', 'Live', 'Maintenance', 'Archived'];
        if (!in_array($status, $allowedStatuses)) {
            throw new Exception('Invalid project status.');
        }
        
        // Handle logo upload
        $logoPath = $project['logo_path'] ?? '';
        if (isset($_FILES['logo']) && $_FILES['logo']['error'] !== UPLOAD_ERR_NO_FILE) {
            // Handle upload errors
            switch ($_FILES['logo']['error']) {
                case UPLOAD_ERR_OK:
                    // Continue processing
                    break;
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new Exception('File is too large. Maximum size is 5MB.');
                case UPLOAD_ERR_PARTIAL:
                    throw new Exception('File upload was incomplete. Please try again.');
                case UPLOAD_ERR_NO_TMP_DIR:
                    throw new Exception('Server configuration error. Please contact support.');
                case UPLOAD_ERR_CANT_WRITE:
                    throw new Exception('Failed to save file. Please try again.');
                default:
                    throw new Exception('File upload failed. Please try again.');
            }
            
            $uploadDir = '../uploads/project-logos/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            // Verify MIME type (actual file content, not just extension)
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mimeType = finfo_file($finfo, $_FILES['logo']['tmp_name']);
            finfo_close($finfo);
            
            $allowedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (!in_array($mimeType, $allowedMimes)) {
                throw new Exception('Invalid file type detected. Only JPG, PNG, GIF, and WebP images are allowed.');
            }
            
            // Validate file extension
            $fileExtension = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            
            if (!in_array($fileExtension, $allowedExtensions)) {
                throw new Exception('Invalid logo file extension. Please use JPG, PNG, GIF, or WebP.');
            }
            
            // Validate file size
            if ($_FILES['logo']['size'] > 5 * 1024 * 1024) { // 5MB limit
                throw new Exception('Logo file is too large. Maximum size is 5MB.');
            }
            
            // Generate secure filename
            $fileName = 'project_' . ($isEdit ? $projectId : time()) . '_' . bin2hex(random_bytes(8)) . '.' . $fileExtension;
            $logoPath = $uploadDir . $fileName;
            
            // Move uploaded file
            if (!move_uploaded_file($_FILES['logo']['tmp_name'], $logoPath)) {
                throw new Exception('Failed to upload logo file. Please try again.');
            }
            
            // Delete old logo if editing (with directory traversal protection)
            if ($isEdit && !empty($project['logo_path']) && $project['logo_path'] !== $logoPath) {
                $uploadDirReal = realpath($uploadDir);
                $oldFileReal = realpath($project['logo_path']);
                
                // Ensure old file is within upload directory
                if ($oldFileReal && $uploadDirReal && strpos($oldFileReal, $uploadDirReal) === 0) {
                    if (file_exists($oldFileReal)) {
                        unlink($oldFileReal);
                    }
                }
            }
        }
        
        // Prepare dates
        $startDate = $startDate ? $startDate : null;
        $completionDate = $completionDate ? $completionDate : null;
        
        if ($isEdit) {
            // Authorization Check - Verify user has permission to edit this project
            $stmt = $pdo->prepare("SELECT created_by FROM projects WHERE id = ?");
            $stmt->execute([$projectId]);
            $projectOwner = $stmt->fetchColumn();
            
            // Allow if user is owner or has admin role
            if ($projectOwner && $projectOwner != ($_SESSION['admin_id'] ?? 0)) {
                // Check if user has admin role (you may need to adjust based on your role system)
                if (!isset($_SESSION['admin_role']) || $_SESSION['admin_role'] !== 'admin') {
                    throw new Exception('You do not have permission to edit this project.');
                }
            }
            
            // Update existing project
            $stmt = $pdo->prepare("
                UPDATE projects SET 
                    title = ?, project_type = ?, url = ?, logo_path = ?, client_name = ?, 
                    client_email = ?, description = ?, technologies = ?, time_spent_hours = ?, 
                    start_date = ?, completion_date = ?, status = ?, remarks = ?, featured = ?,
                    updated_at = NOW()
                WHERE id = ?
            ");
            
            $success = $stmt->execute([
                $title, $projectType, $url, $logoPath, $clientName, $clientEmail, 
                $description, $technologies, $timeSpent, $startDate, $completionDate, 
                $status, $remarks, $featured, $projectId
            ]);
            
            if ($success) {
                $successMessage = 'Project updated successfully!';
                // Refresh project data
                $stmt = $pdo->prepare("SELECT * FROM projects WHERE id = ?");
                $stmt->execute([$projectId]);
                $project = $stmt->fetch(PDO::FETCH_ASSOC);
            } else {
                throw new Exception('Failed to update project.');
            }
        } else {
            // Create new project
            $stmt = $pdo->prepare("
                INSERT INTO projects (
                    title, project_type, url, logo_path, client_name, client_email, 
                    description, technologies, time_spent_hours, start_date, completion_date, 
                    status, remarks, featured, created_by, created_at
                ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())
            ");
            
            $success = $stmt->execute([
                $title, $projectType, $url, $logoPath, $clientName, $clientEmail, 
                $description, $technologies, $timeSpent, $startDate, $completionDate, 
                $status, $remarks, $featured, $_SESSION['admin_id'] ?? 1
            ]);
            
            if ($success) {
                $successMessage = 'Project added successfully!';
                $projectId = $pdo->lastInsertId();
                
                // Redirect to edit mode to show the created project
                header("Location: add-project.php?id=$projectId&success=1");
                exit;
            } else {
                throw new Exception('Failed to create project.');
            }
        }
        
    } catch (Exception $e) {
        // Log error for debugging (don't expose to user)
        error_log('Project form error: ' . $e->getMessage() . ' | User: ' . ($_SESSION['admin_id'] ?? 'unknown'));
        
        // Show user-friendly error message
        $errorMessage = $e->getMessage();
    }
}

// Check for success parameter from redirect
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $successMessage = 'Project created successfully!';
}

// Set page title for header
$pageTitle = $isEdit ? 'Edit Project' : 'Add New Project';

// Include standard website header AFTER form processing
include_once '../includes/header.php';
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
                        <i class="bi bi-<?php echo $isEdit ? 'pencil' : 'plus-circle'; ?> me-2 text-primary"></i>
                        <?php echo $pageTitle; ?>
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="<?php echo adminUrl('projects.php'); ?>" class="btn btn-outline-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Back to Projects
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

                <!-- Project Form -->
                <form method="POST" enctype="multipart/form-data">
                    <!-- CSRF Protection -->
                    <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($_SESSION['csrf_token']); ?>">
                    <div class="row g-4">
                        <!-- Basic Information -->
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-info-circle me-2"></i>
                                        Basic Information
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-8">
                                            <label for="title" class="form-label">Project Title *</label>
                                            <input type="text" class="form-control" id="title" name="title" 
                                                   value="<?php echo htmlspecialchars($project['title'] ?? ''); ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="project_type" class="form-label">Project Type</label>
                                            <select class="form-select" id="project_type" name="project_type">
                                                <option value="Website" <?php echo ($project['project_type'] ?? '') === 'Website' ? 'selected' : ''; ?>>Website</option>
                                                <option value="Mobile App" <?php echo ($project['project_type'] ?? '') === 'Mobile App' ? 'selected' : ''; ?>>Mobile App</option>
                                                <option value="Web App" <?php echo ($project['project_type'] ?? '') === 'Web App' ? 'selected' : ''; ?>>Web App</option>
                                                <option value="Desktop App" <?php echo ($project['project_type'] ?? '') === 'Desktop App' ? 'selected' : ''; ?>>Desktop App</option>
                                                <option value="Other" <?php echo ($project['project_type'] ?? '') === 'Other' ? 'selected' : ''; ?>>Other</option>
                                            </select>
                                        </div>
                                        <div class="col-12">
                                            <label for="url" class="form-label">Project URL</label>
                                            <input type="url" class="form-control" id="url" name="url" 
                                                   value="<?php echo htmlspecialchars($project['url'] ?? ''); ?>" 
                                                   placeholder="https://example.com">
                                            <div class="form-text">The live URL where the project can be accessed</div>
                                        </div>
                                        <div class="col-12">
                                            <label for="description" class="form-label">Project Description</label>
                                            <textarea class="form-control" id="description" name="description" rows="4" 
                                                      placeholder="Describe the project, its purpose, and key features..."><?php echo htmlspecialchars($project['description'] ?? ''); ?></textarea>
                                        </div>
                                        <div class="col-12">
                                            <label for="technologies" class="form-label">Technologies Used</label>
                                            <textarea class="form-control" id="technologies" name="technologies" rows="3" 
                                                      placeholder="e.g., PHP, MySQL, Bootstrap, JavaScript, React..."><?php echo htmlspecialchars($project['technologies'] ?? ''); ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Logo & Status -->
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-image me-2"></i>
                                        Project Logo
                                    </h5>
                                </div>
                                <div class="card-body text-center">
                                    <?php if ($project && $project['logo_path'] && file_exists($project['logo_path'])): ?>
                                        <img src="<?php echo htmlspecialchars($project['logo_path']); ?>" 
                                             alt="Current Logo" class="img-fluid rounded mb-3" style="max-height: 150px;">
                                        <p class="text-muted small">Current logo</p>
                                    <?php else: ?>
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center mb-3" style="height: 150px;">
                                            <i class="bi bi-image fs-1 text-muted"></i>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*">
                                    <div class="form-text">Upload JPG, PNG, GIF, or WebP (max 5MB)</div>
                                </div>
                            </div>

                            <div class="card border-0 shadow-sm mt-4">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-gear me-2"></i>
                                        Status & Settings
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Project Status</label>
                                        <select class="form-select" id="status" name="status">
                                            <option value="Completed" <?php echo ($project['status'] ?? '') === 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                            <option value="Live" <?php echo ($project['status'] ?? '') === 'Live' ? 'selected' : ''; ?>>Live</option>
                                            <option value="Maintenance" <?php echo ($project['status'] ?? '') === 'Maintenance' ? 'selected' : ''; ?>>Maintenance</option>
                                            <option value="Archived" <?php echo ($project['status'] ?? '') === 'Archived' ? 'selected' : ''; ?>>Archived</option>
                                        </select>
                                    </div>
                                    
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="featured" name="featured" 
                                               <?php echo ($project['featured'] ?? 0) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="featured">
                                            <i class="bi bi-star me-1"></i>
                                            Featured Project
                                        </label>
                                        <div class="form-text">Featured projects are highlighted in the portfolio</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Client Information -->
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-person me-2"></i>
                                        Client Information
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-12">
                                            <label for="client_name" class="form-label">Client Name</label>
                                            <input type="text" class="form-control" id="client_name" name="client_name" 
                                                   value="<?php echo htmlspecialchars($project['client_name'] ?? ''); ?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="client_email" class="form-label">Client Email</label>
                                            <input type="email" class="form-control" id="client_email" name="client_email" 
                                                   value="<?php echo htmlspecialchars($project['client_email'] ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Timeline & Hours -->
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-clock me-2"></i>
                                        Timeline & Hours
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="start_date" class="form-label">Start Date</label>
                                            <input type="date" class="form-control" id="start_date" name="start_date" 
                                                   value="<?php echo $project['start_date'] ?? ''; ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="completion_date" class="form-label">Completion Date</label>
                                            <input type="date" class="form-control" id="completion_date" name="completion_date" 
                                                   value="<?php echo $project['completion_date'] ?? ''; ?>">
                                        </div>
                                        <div class="col-12">
                                            <label for="time_spent_hours" class="form-label">Time Spent (Hours)</label>
                                            <input type="number" class="form-control" id="time_spent_hours" name="time_spent_hours" 
                                                   step="0.5" min="0" value="<?php echo $project['time_spent_hours'] ?? ''; ?>">
                                            <div class="form-text">Total hours spent on this project</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Remarks -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-transparent">
                                    <h5 class="mb-0">
                                        <i class="bi bi-chat-text me-2"></i>
                                        Remarks & Notes
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <textarea class="form-control" id="remarks" name="remarks" rows="4" 
                                              placeholder="Add any additional notes, challenges faced, lessons learned, or other remarks about this project..."><?php echo htmlspecialchars($project['remarks'] ?? ''); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex gap-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="bi bi-<?php echo $isEdit ? 'check' : 'plus'; ?>-circle me-1"></i>
                                            <?php echo $isEdit ? 'Update Project' : 'Create Project'; ?>
                                        </button>
                                        <a href="<?php echo adminUrl('projects.php'); ?>" class="btn btn-outline-secondary">
                                            <i class="bi bi-x-circle me-1"></i>
                                            Cancel
                                        </a>
                                        <?php if ($isEdit && $project): ?>
                                            <a href="<?php echo adminUrl('view-project.php?id=' . $project['id']); ?>" class="btn btn-outline-info">
                                                <i class="bi bi-eye me-1"></i>
                                                View Project
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<!-- Custom CSS -->
<link rel="stylesheet" href="css/admin-dashboard.css">

<script>
// Preview uploaded logo
document.getElementById('logo').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.querySelector('.card-body img, .bg-light');
            if (preview.tagName === 'IMG') {
                preview.src = e.target.result;
            } else {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'img-fluid rounded mb-3';
                img.style.maxHeight = '150px';
                preview.parentNode.replaceChild(img, preview);
            }
        };
        reader.readAsDataURL(file);
    }
});
</script>

<?php include_once '../includes/footer.php'; ?>
