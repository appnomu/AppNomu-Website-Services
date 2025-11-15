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

$auditId = $_GET['id'] ?? '';
$audit = null;
$errorMessage = '';

if (empty($auditId)) {
    $errorMessage = "No audit ID provided.";
} else {
    try {
        // Create database connection
        $pdo = Config::getDatabaseConnection();
        
        // Get audit details
        $stmt = $pdo->prepare("
            SELECT * FROM audit_leads 
            WHERE audit_id = :audit_id
        ");
        $stmt->bindParam(':audit_id', $auditId);
        $stmt->execute();
        
        $audit = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (!$audit) {
            $errorMessage = "Audit not found with ID: " . htmlspecialchars($auditId);
            
            // Debug: Check if any audits exist
            $stmt = $pdo->query("SELECT COUNT(*) as count FROM audit_leads");
            $count = $stmt->fetch(PDO::FETCH_ASSOC)['count'] ?? 0;
            $errorMessage .= " (Total audits in database: $count)";
        } else {
            // Parse audit results JSON
            $auditResults = json_decode($audit['audit_results'], true);
        }
        
    } catch (PDOException $e) {
        $errorMessage = "Database error: " . $e->getMessage();
        
        // Check if table exists
        try {
            $stmt = $pdo->query("SHOW TABLES LIKE 'audit_leads'");
            if ($stmt->rowCount() == 0) {
                $errorMessage .= " (audit_leads table does not exist)";
            }
        } catch (Exception $e2) {
            $errorMessage .= " (Could not check table existence)";
        }
    }
}

$pageTitle = 'View Audit Report';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?> - AppNomu Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .sidebar { min-height: 100vh; }
        .score-circle { width: 120px; height: 120px; }
        .score-excellent { color: #28a745; }
        .score-good { color: #ffc107; }
        .score-poor { color: #dc3545; }
        .audit-section { border-left: 4px solid #007bff; }
        .issue-item { background: #f8f9fa; border-radius: 8px; }
        .success-item { background: #d4edda; border-radius: 8px; }
    </style>
</head>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <?php include_once 'includes/admin-sidebar.php'; ?>
            
            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">
                        <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                        Website Audit Report
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="audit-leads.php" class="btn btn-sm btn-outline-secondary">
                                <i class="bi bi-arrow-left me-1"></i>Back to Leads
                            </a>
                            <?php if ($audit): ?>
                            <a href="mailto:<?php echo htmlspecialchars($audit['email']); ?>?subject=Your Website Audit Results - AppNomu" 
                               class="btn btn-sm btn-primary">
                                <i class="bi bi-envelope me-1"></i>Email Client
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <?php echo htmlspecialchars($errorMessage); ?>
                    </div>
                <?php else: ?>
                    <!-- Audit Header -->
                    <div class="row mb-4">
                        <div class="col-lg-8">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3 class="card-title mb-3"><?php echo htmlspecialchars($audit['business_name']); ?></h3>
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <small class="text-muted">Website</small>
                                                    <div class="fw-bold">
                                                        <a href="<?php echo htmlspecialchars($audit['website_url']); ?>" target="_blank" class="text-decoration-none">
                                                            <?php echo htmlspecialchars(parse_url($audit['website_url'], PHP_URL_HOST)); ?>
                                                            <i class="bi bi-box-arrow-up-right ms-1"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Industry</small>
                                                    <div class="fw-bold"><?php echo htmlspecialchars($audit['industry'] ?: 'Not specified'); ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Email</small>
                                                    <div class="fw-bold">
                                                        <a href="mailto:<?php echo htmlspecialchars($audit['email']); ?>" class="text-decoration-none">
                                                            <?php echo htmlspecialchars($audit['email']); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Phone</small>
                                                    <div class="fw-bold">
                                                        <?php if ($audit['phone']): ?>
                                                            <a href="tel:<?php echo htmlspecialchars($audit['phone']); ?>" class="text-decoration-none">
                                                                <?php echo htmlspecialchars($audit['phone']); ?>
                                                            </a>
                                                        <?php else: ?>
                                                            <span class="text-muted">Not provided</span>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Audit Date</small>
                                                    <div class="fw-bold"><?php echo date('M j, Y g:i A', strtotime($audit['created_at'])); ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <small class="text-muted">Status</small>
                                                    <div>
                                                        <?php
                                                        $statusColors = [
                                                            'New' => 'warning',
                                                            'Contacted' => 'info',
                                                            'Quoted' => 'primary',
                                                            'Converted' => 'success',
                                                            'Lost' => 'danger'
                                                        ];
                                                        $statusColor = $statusColors[$audit['status']] ?? 'secondary';
                                                        ?>
                                                        <span class="badge bg-<?php echo $statusColor; ?>"><?php echo $audit['status']; ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 text-center">
                                            <div class="position-relative d-inline-block">
                                                <canvas id="overallScoreChart" width="120" height="120"></canvas>
                                                <div class="position-absolute top-50 start-50 translate-middle">
                                                    <h2 class="fw-bold mb-0 <?php 
                                                        echo $audit['overall_score'] >= 80 ? 'score-excellent' : 
                                                            ($audit['overall_score'] >= 60 ? 'score-good' : 'score-poor'); 
                                                    ?>"><?php echo $audit['overall_score']; ?></h2>
                                                    <small class="text-muted">/ 100</small>
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <small class="text-muted">Overall Score</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-body p-4">
                                    <h5 class="card-title mb-3">Score Breakdown</h5>
                                    <div class="row g-3">
                                        <div class="col-6">
                                            <div class="text-center p-3 bg-light rounded">
                                                <h4 class="mb-1"><?php echo $audit['performance_score']; ?></h4>
                                                <small class="text-muted">Performance</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center p-3 bg-light rounded">
                                                <h4 class="mb-1"><?php echo $audit['seo_score']; ?></h4>
                                                <small class="text-muted">SEO</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center p-3 bg-light rounded">
                                                <h4 class="mb-1"><?php echo $audit['mobile_score']; ?></h4>
                                                <small class="text-muted">Mobile</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-center p-3 bg-light rounded">
                                                <h4 class="mb-1"><?php echo $audit['security_score']; ?></h4>
                                                <small class="text-muted">Security</small>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="text-center p-3 bg-light rounded">
                                                <h4 class="mb-1"><?php echo $audit['accessibility_score']; ?></h4>
                                                <small class="text-muted">Accessibility</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Detailed Analysis -->
                    <?php if (isset($auditResults)): ?>
                    <div class="row g-4">
                        <!-- Performance Analysis -->
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">
                                        <i class="bi bi-speedometer2 me-2"></i>
                                        Performance Analysis
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Score</span>
                                            <span class="fw-bold"><?php echo $auditResults['performance']['score'] ?? 0; ?>/100</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-primary" style="width: <?php echo $auditResults['performance']['score'] ?? 0; ?>%"></div>
                                        </div>
                                    </div>

                                    <?php if (isset($auditResults['performance']['loadTime'])): ?>
                                    <div class="mb-3">
                                        <small class="text-muted">Load Time</small>
                                        <div class="fw-bold"><?php echo round($auditResults['performance']['loadTime'] / 1000, 2); ?> seconds</div>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($auditResults['performance']['successes'])): ?>
                                    <div class="mb-3">
                                        <h6 class="text-success mb-2">✅ What's Working Well</h6>
                                        <?php foreach ($auditResults['performance']['successes'] as $success): ?>
                                            <div class="success-item p-2 mb-2">
                                                <small><?php echo htmlspecialchars($success); ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($auditResults['performance']['issues'])): ?>
                                    <div>
                                        <h6 class="text-warning mb-2">⚠️ Areas for Improvement</h6>
                                        <?php foreach ($auditResults['performance']['issues'] as $issue): ?>
                                            <div class="issue-item p-2 mb-2">
                                                <small><?php echo htmlspecialchars($issue); ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- SEO Analysis -->
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">
                                        <i class="bi bi-search me-2"></i>
                                        SEO Analysis
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Score</span>
                                            <span class="fw-bold"><?php echo $auditResults['seo']['score'] ?? 0; ?>/100</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-success" style="width: <?php echo $auditResults['seo']['score'] ?? 0; ?>%"></div>
                                        </div>
                                    </div>

                                    <?php if (!empty($auditResults['seo']['successes'])): ?>
                                    <div class="mb-3">
                                        <h6 class="text-success mb-2">✅ SEO Strengths</h6>
                                        <?php foreach ($auditResults['seo']['successes'] as $success): ?>
                                            <div class="success-item p-2 mb-2">
                                                <small><?php echo htmlspecialchars($success); ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($auditResults['seo']['issues'])): ?>
                                    <div>
                                        <h6 class="text-warning mb-2">⚠️ SEO Issues</h6>
                                        <?php foreach ($auditResults['seo']['issues'] as $issue): ?>
                                            <div class="issue-item p-2 mb-2">
                                                <small><?php echo htmlspecialchars($issue); ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Security Analysis -->
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-warning text-dark">
                                    <h5 class="mb-0">
                                        <i class="bi bi-shield-check me-2"></i>
                                        Security Analysis
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Score</span>
                                            <span class="fw-bold"><?php echo $auditResults['security']['score'] ?? 0; ?>/100</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-warning" style="width: <?php echo $auditResults['security']['score'] ?? 0; ?>%"></div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted">HTTPS Status</small>
                                        <div class="fw-bold">
                                            <?php if ($auditResults['security']['isHttps'] ?? false): ?>
                                                <span class="text-success">✅ Enabled</span>
                                            <?php else: ?>
                                                <span class="text-danger">❌ Not Enabled</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?php if (!empty($auditResults['security']['successes'])): ?>
                                    <div class="mb-3">
                                        <h6 class="text-success mb-2">✅ Security Features</h6>
                                        <?php foreach ($auditResults['security']['successes'] as $success): ?>
                                            <div class="success-item p-2 mb-2">
                                                <small><?php echo htmlspecialchars($success); ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($auditResults['security']['issues'])): ?>
                                    <div>
                                        <h6 class="text-danger mb-2">🔒 Security Concerns</h6>
                                        <?php foreach ($auditResults['security']['issues'] as $issue): ?>
                                            <div class="issue-item p-2 mb-2">
                                                <small><?php echo htmlspecialchars($issue); ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Mobile Analysis -->
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm h-100">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0">
                                        <i class="bi bi-phone me-2"></i>
                                        Mobile Analysis
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <span>Score</span>
                                            <span class="fw-bold"><?php echo $auditResults['mobile']['score'] ?? 0; ?>/100</span>
                                        </div>
                                        <div class="progress" style="height: 8px;">
                                            <div class="progress-bar bg-info" style="width: <?php echo $auditResults['mobile']['score'] ?? 0; ?>%"></div>
                                        </div>
                                    </div>

                                    <?php if (!empty($auditResults['mobile']['successes'])): ?>
                                    <div class="mb-3">
                                        <h6 class="text-success mb-2">✅ Mobile Features</h6>
                                        <?php foreach ($auditResults['mobile']['successes'] as $success): ?>
                                            <div class="success-item p-2 mb-2">
                                                <small><?php echo htmlspecialchars($success); ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>

                                    <?php if (!empty($auditResults['mobile']['issues'])): ?>
                                    <div>
                                        <h6 class="text-warning mb-2">📱 Mobile Issues</h6>
                                        <?php foreach ($auditResults['mobile']['issues'] as $issue): ?>
                                            <div class="issue-item p-2 mb-2">
                                                <small><?php echo htmlspecialchars($issue); ?></small>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Items -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card border-0 shadow-sm">
                                <div class="card-header bg-dark text-white">
                                    <h5 class="mb-0">
                                        <i class="bi bi-list-check me-2"></i>
                                        Recommended Action Items
                                    </h5>
                                </div>
                                <div class="card-body p-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6 class="text-success mb-3">🟢 Quick Wins (1-2 days)</h6>
                                            <ul class="list-unstyled">
                                                <?php if ($auditResults['security']['score'] < 80): ?>
                                                    <li class="mb-2">• Enable HTTPS encryption</li>
                                                <?php endif; ?>
                                                <?php if ($auditResults['seo']['score'] < 80): ?>
                                                    <li class="mb-2">• Add missing meta descriptions</li>
                                                    <li class="mb-2">• Optimize image alt tags</li>
                                                <?php endif; ?>
                                                <?php if ($auditResults['mobile']['score'] < 80): ?>
                                                    <li class="mb-2">• Add viewport meta tag</li>
                                                <?php endif; ?>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="text-warning mb-3">🟡 Medium Priority (1-2 weeks)</h6>
                                            <ul class="list-unstyled">
                                                <?php if ($auditResults['performance']['score'] < 70): ?>
                                                    <li class="mb-2">• Optimize image compression</li>
                                                    <li class="mb-2">• Enable browser caching</li>
                                                <?php endif; ?>
                                                <li class="mb-2">• Improve page load speed</li>
                                                <li class="mb-2">• Add security headers</li>
                                            </ul>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 p-3 bg-light rounded">
                                        <h6 class="mb-2">💡 AppNomu Can Help With:</h6>
                                        <p class="mb-2">Based on this audit, we recommend our <strong>Website Optimization Package</strong> which includes:</p>
                                        <ul class="mb-0">
                                            <li>Performance optimization and speed improvements</li>
                                            <li>SEO enhancements and content optimization</li>
                                            <li>Security hardening and SSL setup</li>
                                            <li>Mobile responsiveness improvements</li>
                                            <li>Ongoing monitoring and maintenance</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <?php if ($audit): ?>
    <script>
    // Draw overall score chart
    function drawOverallScoreChart() {
        const canvas = document.getElementById('overallScoreChart');
        const ctx = canvas.getContext('2d');
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;
        const radius = 50;
        const score = <?php echo $audit['overall_score']; ?>;
        
        // Clear canvas
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        // Background circle
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
        ctx.strokeStyle = '#e9ecef';
        ctx.lineWidth = 8;
        ctx.stroke();
        
        // Score arc
        const startAngle = -Math.PI / 2;
        const endAngle = startAngle + (2 * Math.PI * score / 100);
        
        ctx.beginPath();
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
        ctx.strokeStyle = score >= 80 ? '#28a745' : score >= 60 ? '#ffc107' : '#dc3545';
        ctx.lineWidth = 8;
        ctx.lineCap = 'round';
        ctx.stroke();
    }
    
    // Draw chart when page loads
    document.addEventListener('DOMContentLoaded', drawOverallScoreChart);
    </script>
    <?php endif; ?>
</body>
</html>
