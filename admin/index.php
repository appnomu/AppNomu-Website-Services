<?php
// Start session for admin authentication
session_start();

// Set timezone to East Africa Time
date_default_timezone_set('Africa/Nairobi');

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to login page
    header("Location: login.php");
    exit;
}

// Set page title for header
$pageTitle = 'Admin Dashboard';

// Include standard website header
include_once '../includes/header.php';

// Load configuration
require_once '../config/config.php';

// Initialize variables
$totalQuotes = 0;
$newQuotes = 0;
$inProgressQuotes = 0;
$completedQuotes = 0;
$recentQuotes = [];
$totalProjects = 0;
$featuredProjects = 0;
$recentProjects = [];

try {
    // Create database connection
    $pdo = Config::getDatabaseConnection();
    
    // Get total quotes count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM quote_requests");
    $totalQuotes = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get new quotes count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM quote_requests WHERE status = 'New'");
    $newQuotes = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get in progress quotes count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM quote_requests WHERE status = 'In Progress'");
    $inProgressQuotes = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get quoted quotes count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM quote_requests WHERE status = 'Quoted'");
    $quotedQuotes = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get accepted quotes count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM quote_requests WHERE status = 'Accepted'");
    $acceptedQuotes = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get rejected quotes count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM quote_requests WHERE status = 'Rejected'");
    $rejectedQuotes = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get completed quotes count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM quote_requests WHERE status = 'Completed'");
    
    // Get recent quotes
    $stmt = $pdo->query("SELECT * FROM quote_requests ORDER BY date_submitted DESC LIMIT 5");
    $recentQuotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get total projects count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM projects");
    $totalProjects = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get audit leads statistics
    $totalAuditLeads = 0;
    $newAuditLeads = 0;
    $convertedAuditLeads = 0;
    $avgAuditScore = 0;
    $recentAuditLeads = [];
    
    try {
        // Check if audit_leads table exists, create if not
        $stmt = $pdo->query("SHOW TABLES LIKE 'audit_leads'");
        if ($stmt->rowCount() == 0) {
            // Create audit_leads table if it doesn't exist
            $pdo->exec("
                CREATE TABLE IF NOT EXISTS audit_leads (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    audit_id VARCHAR(32) UNIQUE NOT NULL,
                    website_url VARCHAR(500) NOT NULL,
                    business_name VARCHAR(255) NULL,
                    email VARCHAR(255) NULL,
                    phone VARCHAR(50) NULL,
                    industry VARCHAR(100) NULL,
                    overall_score INT NOT NULL,
                    performance_score INT NOT NULL,
                    seo_score INT NOT NULL,
                    mobile_score INT NOT NULL,
                    security_score INT NOT NULL,
                    accessibility_score INT NOT NULL,
                    audit_results JSON NULL,
                    ip_address VARCHAR(45) NULL,
                    user_agent TEXT NULL,
                    status ENUM('New', 'Contacted', 'Quoted', 'Converted', 'Lost') DEFAULT 'New',
                    notes TEXT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    
                    INDEX idx_audit_id (audit_id),
                    INDEX idx_email (email),
                    INDEX idx_status (status),
                    INDEX idx_created (created_at)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
            ");
        }
        
        if ($stmt->rowCount() > 0 || true) {
            // Get audit leads statistics
            $stmt = $pdo->query("
                SELECT 
                    COUNT(*) as total,
                    SUM(CASE WHEN status = 'New' THEN 1 ELSE 0 END) as new_leads,
                    SUM(CASE WHEN status = 'Converted' THEN 1 ELSE 0 END) as converted_leads,
                    AVG(overall_score) as avg_score
                FROM audit_leads
            ");
            $auditStats = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $totalAuditLeads = $auditStats['total'] ?? 0;
            $newAuditLeads = $auditStats['new_leads'] ?? 0;
            $convertedAuditLeads = $auditStats['converted_leads'] ?? 0;
            $avgAuditScore = round($auditStats['avg_score'] ?? 0, 1);
            
            // Get recent audit leads
            $stmt = $pdo->query("
                SELECT business_name, email, overall_score, status, created_at 
                FROM audit_leads 
                ORDER BY created_at DESC 
                LIMIT 5
            ");
            $recentAuditLeads = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    } catch (PDOException $e) {
        // Audit leads table doesn't exist yet - ignore
    }
    
    // Get featured projects count
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM projects WHERE featured = 1");
    $featuredProjects = $stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    
    // Get recent projects
    $stmt = $pdo->query("SELECT * FROM projects ORDER BY created_at DESC LIMIT 3");
    $recentProjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    // Handle database error (simple approach for demo)
    echo "Database error: " . $e->getMessage();
}
?>

    
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include_once __DIR__ . '/includes/admin-sidebar.php'; ?>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                <div class="content-container">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <i class="bi bi-calendar"></i> This week
                            </button>
                        </div>
                    </div>
                
                <!-- Stats Cards -->
                <div class="row g-4 mb-5">
                    <!-- Primary Stats Row -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                            <div class="card-body text-white p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-subtitle mb-2 text-white-50">Total Quotes</h6>
                                        <h2 class="card-title mb-0 fw-bold"><?php echo $totalQuotes; ?></h2>
                                        <small class="text-white-50">All time requests</small>
                                    </div>
                                    <div class="bg-white bg-opacity-20 rounded-circle p-3">
                                        <i class="bi bi-chat-quote fs-3"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                            <div class="card-body text-white p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-subtitle mb-2 text-white-50">New Requests</h6>
                                        <h2 class="card-title mb-0 fw-bold"><?php echo $newQuotes; ?></h2>
                                        <small class="text-white-50">Awaiting review</small>
                                    </div>
                                    <div class="bg-white bg-opacity-20 rounded-circle p-3">
                                        <i class="bi bi-bell fs-3"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);">
                            <div class="card-body text-white p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-subtitle mb-2 text-white-50">In Progress</h6>
                                        <h2 class="card-title mb-0 fw-bold"><?php echo $inProgressQuotes; ?></h2>
                                        <small class="text-white-50">Being processed</small>
                                    </div>
                                    <div class="bg-white bg-opacity-20 rounded-circle p-3">
                                        <i class="bi bi-hourglass-split fs-3"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-3 col-md-6">
                        <div class="card border-0 shadow-sm h-100" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);">
                            <div class="card-body text-white p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-subtitle mb-2 text-white-50">Completed</h6>
                                        <h2 class="card-title mb-0 fw-bold"><?php echo $completedQuotes; ?></h2>
                                        <small class="text-white-50">Finished projects</small>
                                    </div>
                                    <div class="bg-white bg-opacity-20 rounded-circle p-3">
                                        <i class="bi bi-check2-circle fs-3"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Secondary Stats Row -->
                <div class="row g-4 mb-5">
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-subtitle mb-2 text-muted">Quoted</h6>
                                        <h3 class="card-title mb-0 text-info fw-bold"><?php echo $quotedQuotes; ?></h3>
                                        <small class="text-muted">Price sent to clients</small>
                                    </div>
                                    <div class="bg-info bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-calculator fs-4 text-info"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-subtitle mb-2 text-muted">Accepted</h6>
                                        <h3 class="card-title mb-0 text-success fw-bold"><?php echo $acceptedQuotes; ?></h3>
                                        <small class="text-muted">Client approved</small>
                                    </div>
                                    <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-hand-thumbs-up fs-4 text-success"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h6 class="card-subtitle mb-2 text-muted">Rejected</h6>
                                        <h3 class="card-title mb-0 text-danger fw-bold"><?php echo $rejectedQuotes; ?></h3>
                                        <small class="text-muted">Client declined</small>
                                    </div>
                                    <div class="bg-danger bg-opacity-10 rounded-circle p-3">
                                        <i class="bi bi-hand-thumbs-down fs-4 text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recent Quote Requests -->
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">
                                <i class="bi bi-clock-history me-2 text-primary"></i>
                                Recent Quote Requests
                            </h4>
                            <a href="quotes.php" class="btn btn-primary">
                                <i class="bi bi-list-ul me-1"></i> View All Quotes
                            </a>
                        </div>
                        
                        <?php if (count($recentQuotes) > 0): ?>
                            <div class="row g-4">
                                <?php foreach ($recentQuotes as $quote): ?>
                                    <div class="col-lg-6 col-xl-4">
                                        <div class="card border-0 shadow-sm h-100 hover-shadow">
                                            <div class="card-body p-4">
                                                <div class="d-flex justify-content-between align-items-start mb-3">
                                                    <div>
                                                        <h6 class="card-title mb-1 fw-bold"><?php echo htmlspecialchars($quote['full_name']); ?></h6>
                                                        <small class="text-muted"><?php echo $quote['quote_id']; ?></small>
                                                    </div>
                                                    <span class="badge rounded-pill 
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
                                                </div>
                                                
                                                <div class="mb-3">
                                                    <p class="card-text text-muted mb-2">
                                                        <i class="bi bi-envelope me-1"></i>
                                                        <?php echo htmlspecialchars($quote['email']); ?>
                                                    </p>
                                                    <p class="card-text mb-2">
                                                        <i class="bi bi-gear me-1 text-primary"></i>
                                                        <small><?php echo htmlspecialchars(substr($quote['services'], 0, 50) . (strlen($quote['services']) > 50 ? '...' : '')); ?></small>
                                                    </p>
                                                    <p class="card-text mb-0">
                                                        <i class="bi bi-calendar me-1 text-muted"></i>
                                                        <small class="text-muted"><?php echo date('M d, Y \a\t g:i A', strtotime($quote['date_submitted'])); ?></small>
                                                    </p>
                                                </div>
                                                
                                                <div class="d-flex gap-2">
                                                    <a href="view-quote.php?id=<?php echo $quote['quote_id']; ?>" class="btn btn-primary btn-sm flex-fill">
                                                        <i class="bi bi-eye me-1"></i> View Details
                                                    </a>
                                                    <a href="quotes.php?search=<?php echo $quote['quote_id']; ?>" class="btn btn-outline-secondary btn-sm">
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted mb-3"></i>
                                    <h5 class="text-muted">No Recent Quote Requests</h5>
                                    <p class="text-muted mb-0">New quote requests will appear here when submitted.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Recent Audit Leads -->
                <?php if (count($recentAuditLeads) > 0): ?>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">
                                <i class="bi bi-search-heart me-2 text-success"></i>
                                Recent Website Audit Leads
                            </h4>
                            <a href="audit-leads.php" class="btn btn-success">
                                <i class="bi bi-search me-1"></i> View All Audit Leads
                            </a>
                        </div>
                        
                        <div class="row g-4">
                            <?php foreach ($recentAuditLeads as $lead): ?>
                                <div class="col-lg-6 col-xl-4">
                                    <div class="card border-0 shadow-sm h-100 hover-shadow">
                                        <div class="card-body p-4">
                                            <div class="d-flex justify-content-between align-items-start mb-3">
                                                <div>
                                                    <h6 class="card-title mb-1 fw-bold"><?php echo htmlspecialchars($lead['business_name']); ?></h6>
                                                    <small class="text-muted"><?php echo htmlspecialchars($lead['email']); ?></small>
                                                </div>
                                                <div class="text-end">
                                                    <?php
                                                    $scoreClass = $lead['overall_score'] >= 80 ? 'success' : 
                                                                 ($lead['overall_score'] >= 60 ? 'warning' : 'danger');
                                                    ?>
                                                    <span class="badge bg-<?php echo $scoreClass; ?> mb-1"><?php echo $lead['overall_score']; ?>/100</span>
                                                    <br>
                                                    <span class="badge rounded-pill 
                                                        <?php
                                                        switch ($lead['status']) {
                                                            case 'New': echo 'bg-warning text-dark'; break;
                                                            case 'Contacted': echo 'bg-info'; break;
                                                            case 'Quoted': echo 'bg-primary'; break;
                                                            case 'Converted': echo 'bg-success'; break;
                                                            case 'Lost': echo 'bg-danger'; break;
                                                            default: echo 'bg-secondary';
                                                        }
                                                        ?>"><?php echo $lead['status']; ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <small class="text-muted d-block">Audit Date</small>
                                                <span class="fw-medium"><?php echo date('M j, Y g:i A', strtotime($lead['created_at'])); ?></span>
                                            </div>
                                            
                                            <div class="d-flex justify-content-between align-items-center">
                                                <small class="text-muted">
                                                    <i class="bi bi-clock me-1"></i>
                                                    <?php 
                                                    $timeAgo = time() - strtotime($lead['created_at']);
                                                    if ($timeAgo < 3600) {
                                                        echo floor($timeAgo / 60) . ' min ago';
                                                    } elseif ($timeAgo < 86400) {
                                                        echo floor($timeAgo / 3600) . ' hrs ago';
                                                    } else {
                                                        echo floor($timeAgo / 86400) . ' days ago';
                                                    }
                                                    ?>
                                                </small>
                                                <div>
                                                    <a href="mailto:<?php echo htmlspecialchars($lead['email']); ?>" 
                                                       class="btn btn-sm btn-outline-primary me-1" title="Send Email">
                                                        <i class="bi bi-envelope"></i>
                                                    </a>
                                                    <a href="audit-leads.php?search=<?php echo urlencode($lead['email']); ?>" 
                                                       class="btn btn-sm btn-primary" title="View Details">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Recent Projects -->
                <?php if (count($recentProjects) > 0): ?>
                <div class="row mb-5">
                    <div class="col-12">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="mb-0">
                                <i class="bi bi-folder-fill me-2 text-primary"></i>
                                Recent Projects
                            </h4>
                            <a href="projects.php" class="btn btn-primary">
                                <i class="bi bi-folder me-1"></i> View All Projects
                            </a>
                        </div>
                        
                        <div class="row g-4">
                            <?php foreach ($recentProjects as $project): ?>
                                <div class="col-lg-4">
                                    <div class="card border-0 shadow-sm h-100 hover-shadow">
                                        <div class="card-body p-4">
                                            <div class="d-flex align-items-start mb-3">
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
                                                <div class="flex-grow-1">
                                                    <h6 class="card-title mb-1 fw-bold">
                                                        <?php echo htmlspecialchars($project['title']); ?>
                                                        <?php if ($project['featured']): ?>
                                                            <i class="bi bi-star-fill text-warning ms-1" title="Featured"></i>
                                                        <?php endif; ?>
                                                    </h6>
                                                    <small class="text-muted"><?php echo htmlspecialchars($project['project_type']); ?></small>
                                                </div>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <?php if ($project['description']): ?>
                                                    <p class="card-text mb-2">
                                                        <small class="text-muted">
                                                            <?php echo htmlspecialchars(substr($project['description'], 0, 80) . (strlen($project['description']) > 80 ? '...' : '')); ?>
                                                        </small>
                                                    </p>
                                                <?php endif; ?>
                                                
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span class="badge rounded-pill 
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
                                                    
                                                    <div class="d-flex gap-1">
                                                        <a href="<?php echo adminUrl('view-project.php?id=' . $project['id']); ?>" class="btn btn-sm btn-outline-primary">
                                                            <i class="bi bi-eye"></i>
                                                        </a>
                                                        <?php if ($project['url']): ?>
                                                            <a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="btn btn-sm btn-outline-success">
                                                                <i class="bi bi-box-arrow-up-right"></i>
                                                            </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Quick Actions & System Info -->
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-transparent border-0 pb-0">
                                <h5 class="mb-0">
                                    <i class="bi bi-lightning-charge me-2 text-primary"></i>
                                    Quick Actions
                                </h5>
                            </div>
                            <div class="card-body pt-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <a href="quotes.php?status=New" class="card border-0 bg-primary bg-opacity-10 text-decoration-none h-100">
                                            <div class="card-body text-center p-4">
                                                <i class="bi bi-bell fs-2 text-primary mb-2"></i>
                                                <h6 class="card-title text-primary mb-1">New Requests</h6>
                                                <span class="badge bg-primary rounded-pill fs-6"><?php echo $newQuotes; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="quotes.php" class="card border-0 bg-info bg-opacity-10 text-decoration-none h-100">
                                            <div class="card-body text-center p-4">
                                                <i class="bi bi-list-ul fs-2 text-info mb-2"></i>
                                                <h6 class="card-title text-info mb-1">All Quotes</h6>
                                                <span class="badge bg-info rounded-pill fs-6"><?php echo $totalQuotes; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="projects.php" class="card border-0 bg-purple bg-opacity-10 text-decoration-none h-100" style="background-color: rgba(102, 126, 234, 0.1) !important;">
                                            <div class="card-body text-center p-4">
                                                <i class="bi bi-folder-fill fs-2 mb-2" style="color: #667eea;"></i>
                                                <h6 class="card-title mb-1" style="color: #667eea;">Projects</h6>
                                                <span class="badge rounded-pill fs-6" style="background-color: #667eea;"><?php echo $totalProjects; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="projects.php?featured=1" class="card border-0 bg-warning bg-opacity-10 text-decoration-none h-100">
                                            <div class="card-body text-center p-4">
                                                <i class="bi bi-star-fill fs-2 text-warning mb-2"></i>
                                                <h6 class="card-title text-warning mb-1">Featured</h6>
                                                <span class="badge bg-warning text-dark rounded-pill fs-6"><?php echo $featuredProjects; ?></span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="users.php" class="card border-0 bg-success bg-opacity-10 text-decoration-none h-100">
                                            <div class="card-body text-center p-4">
                                                <i class="bi bi-people fs-2 text-success mb-2"></i>
                                                <h6 class="card-title text-success mb-1">Manage Users</h6>
                                                <small class="text-muted">Admin accounts</small>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <a href="../" target="_blank" class="card border-0 bg-warning bg-opacity-10 text-decoration-none h-100">
                                            <div class="card-body text-center p-4">
                                                <i class="bi bi-globe fs-2 text-warning mb-2"></i>
                                                <h6 class="card-title text-warning mb-1">Visit Website</h6>
                                                <small class="text-muted">View live site</small>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-header bg-transparent border-0 pb-0">
                                <h5 class="mb-0">
                                    <i class="bi bi-info-circle me-2 text-primary"></i>
                                    System Info
                                </h5>
                            </div>
                            <div class="card-body pt-3">
                                <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="bi bi-code-slash text-primary"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">PHP Version</h6>
                                        <small class="text-muted"><?php echo phpversion(); ?></small>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                                    <div class="bg-success bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="bi bi-server text-success"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Server</h6>
                                        <small class="text-muted"><?php echo substr($_SERVER['SERVER_SOFTWARE'] ?? 'Unknown', 0, 20); ?></small>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center mb-3 p-3 bg-light rounded">
                                    <div class="bg-info bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="bi bi-person-circle text-info"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Admin User</h6>
                                        <small class="text-muted"><?php echo $_SESSION['admin_username'] ?? 'Unknown'; ?></small>
                                    </div>
                                </div>
                                
                                <div class="d-flex align-items-center p-3 bg-light rounded">
                                    <div class="bg-warning bg-opacity-10 rounded-circle p-2 me-3">
                                        <i class="bi bi-clock text-warning"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Current Time</h6>
                                        <small class="text-muted"><?php echo date('M d, Y g:i A'); ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- Closing content-container -->
            </main>
        </div>
    </div>
    
    <!-- Custom Admin Dashboard CSS -->
    <link rel="stylesheet" href="css/admin-dashboard.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        /* Additional inline styles for immediate effect */
        .content-container {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 2rem;
            margin: 1rem 0;
        }
        
        .card {
            border-radius: 12px;
        }
        
        .rounded-circle {
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    
<?php include_once '../includes/footer.php'; ?>
