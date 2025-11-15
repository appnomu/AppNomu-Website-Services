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

// Initialize variables
$leads = [];
$errorMessage = '';
$successMessage = '';
$totalLeads = 0;
$newLeads = 0;
$convertedLeads = 0;

try {
    // Create database connection
    $pdo = Config::getDatabaseConnection();
    
    // Handle status updates if form submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_status'])) {
        $leadId = $_POST['lead_id'] ?? '';
        $newStatus = $_POST['status'] ?? '';
        $adminNotes = $_POST['admin_notes'] ?? '';
        $followUpDate = $_POST['follow_up_date'] ?? null;
        
        if (!empty($leadId) && !empty($newStatus)) {
            $updateStmt = $pdo->prepare("
                UPDATE audit_leads 
                SET status = :status, admin_notes = :admin_notes, follow_up_date = :follow_up_date, updated_at = NOW()
                WHERE id = :lead_id
            ");
            
            $updateStmt->bindParam(':status', $newStatus);
            $updateStmt->bindParam(':admin_notes', $adminNotes);
            $updateStmt->bindParam(':follow_up_date', $followUpDate);
            $updateStmt->bindParam(':lead_id', $leadId);
            
            if ($updateStmt->execute()) {
                $successMessage = "Lead #$leadId has been updated successfully.";
            } else {
                $errorMessage = "Failed to update lead status.";
            }
        }
    }
    
    // Get filter parameters
    $status = $_GET['status'] ?? 'all';
    $search = $_GET['search'] ?? '';
    $sortBy = $_GET['sort'] ?? 'created_at';
    $sortOrder = $_GET['order'] ?? 'DESC';
    $page = max(1, intval($_GET['page'] ?? 1));
    $limit = 20;
    $offset = ($page - 1) * $limit;
    
    // Build WHERE clause
    $whereConditions = [];
    $params = [];
    
    if ($status !== 'all') {
        $whereConditions[] = "status = :status";
        $params[':status'] = $status;
    }
    
    if (!empty($search)) {
        $whereConditions[] = "(business_name LIKE :search OR email LIKE :search OR website_url LIKE :search)";
        $params[':search'] = "%$search%";
    }
    
    $whereClause = !empty($whereConditions) ? 'WHERE ' . implode(' AND ', $whereConditions) : '';
    
    // Get total count for pagination
    $countStmt = $pdo->prepare("SELECT COUNT(*) as total FROM audit_leads $whereClause");
    $countStmt->execute($params);
    $totalLeads = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];
    
    // Get leads with pagination
    $validSortColumns = ['created_at', 'business_name', 'overall_score', 'status', 'email'];
    $sortBy = in_array($sortBy, $validSortColumns) ? $sortBy : 'created_at';
    $sortOrder = strtoupper($sortOrder) === 'ASC' ? 'ASC' : 'DESC';
    
    $stmt = $pdo->prepare("
        SELECT id, audit_id, website_url, business_name, email, phone, industry,
               overall_score, performance_score, seo_score, mobile_score, security_score,
               status, created_at, follow_up_date, ip_address
        FROM audit_leads 
        $whereClause
        ORDER BY $sortBy $sortOrder
        LIMIT :limit OFFSET :offset
    ");
    
    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    
    $stmt->execute();
    $leads = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Get summary statistics
    $statsStmt = $pdo->query("
        SELECT 
            COUNT(*) as total,
            SUM(CASE WHEN status = 'New' THEN 1 ELSE 0 END) as new_leads,
            SUM(CASE WHEN status = 'Converted' THEN 1 ELSE 0 END) as converted_leads,
            AVG(overall_score) as avg_score
        FROM audit_leads
    ");
    $stats = $statsStmt->fetch(PDO::FETCH_ASSOC);
    
    $totalLeads = $stats['total'];
    $newLeads = $stats['new_leads'];
    $convertedLeads = $stats['converted_leads'];
    $avgScore = round($stats['avg_score'], 1);
    
} catch (PDOException $e) {
    $errorMessage = "Database error: " . $e->getMessage();
}

$pageTitle = 'Website Audit Leads';
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
        .score-badge { 
            font-weight: bold; 
            padding: 0.4rem 0.8rem; 
            border-radius: 0.5rem; 
            font-size: 0.9rem;
            min-width: 70px;
            text-align: center;
        }
        .score-excellent { background-color: #d4edda; color: #155724; }
        .score-good { background-color: #fff3cd; color: #856404; }
        .score-poor { background-color: #f8d7da; color: #721c24; }
        .table > tbody > tr:hover { background-color: #f8f9fa; }
        .table td { vertical-align: middle; }
        .table th { 
            font-weight: 600; 
            text-transform: uppercase; 
            font-size: 0.75rem;
            letter-spacing: 0.5px;
        }
        .btn-sm { padding: 0.25rem 0.5rem; font-size: 0.875rem; }
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
                        <i class="bi bi-search-heart me-2 text-primary"></i>
                        Website Audit Leads
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="?status=New" class="btn btn-sm btn-outline-primary">New Leads</a>
                            <a href="?status=Contacted" class="btn btn-sm btn-outline-info">Contacted</a>
                            <a href="?status=Converted" class="btn btn-sm btn-outline-success">Converted</a>
                        </div>
                    </div>
                </div>

                <?php if ($successMessage): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($successMessage); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($errorMessage); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <div class="col-md-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="card-title"><?php echo $totalLeads; ?></h4>
                                        <p class="card-text">Total Leads</p>
                                    </div>
                                    <i class="bi bi-people fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-warning text-dark">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="card-title"><?php echo $newLeads; ?></h4>
                                        <p class="card-text">New Leads</p>
                                    </div>
                                    <i class="bi bi-exclamation-circle fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="card-title"><?php echo $convertedLeads; ?></h4>
                                        <p class="card-text">Converted</p>
                                    </div>
                                    <i class="bi bi-check-circle fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-info text-white">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <h4 class="card-title"><?php echo $avgScore ?? 0; ?></h4>
                                        <p class="card-text">Avg Score</p>
                                    </div>
                                    <i class="bi bi-graph-up fs-1"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="GET" class="row g-3">
                            <div class="col-md-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="all" <?php echo $status === 'all' ? 'selected' : ''; ?>>All Status</option>
                                    <option value="New" <?php echo $status === 'New' ? 'selected' : ''; ?>>New</option>
                                    <option value="Contacted" <?php echo $status === 'Contacted' ? 'selected' : ''; ?>>Contacted</option>
                                    <option value="Quoted" <?php echo $status === 'Quoted' ? 'selected' : ''; ?>>Quoted</option>
                                    <option value="Converted" <?php echo $status === 'Converted' ? 'selected' : ''; ?>>Converted</option>
                                    <option value="Lost" <?php echo $status === 'Lost' ? 'selected' : ''; ?>>Lost</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="search" class="form-label">Search</label>
                                <input type="text" name="search" id="search" class="form-control" 
                                       placeholder="Business name, email, or website..." value="<?php echo htmlspecialchars($search); ?>">
                            </div>
                            <div class="col-md-2">
                                <label for="sort" class="form-label">Sort By</label>
                                <select name="sort" id="sort" class="form-select">
                                    <option value="created_at" <?php echo $sortBy === 'created_at' ? 'selected' : ''; ?>>Date</option>
                                    <option value="business_name" <?php echo $sortBy === 'business_name' ? 'selected' : ''; ?>>Business</option>
                                    <option value="overall_score" <?php echo $sortBy === 'overall_score' ? 'selected' : ''; ?>>Score</option>
                                    <option value="status" <?php echo $sortBy === 'status' ? 'selected' : ''; ?>>Status</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="order" class="form-label">Order</label>
                                <select name="order" id="order" class="form-select">
                                    <option value="DESC" <?php echo $sortOrder === 'DESC' ? 'selected' : ''; ?>>Newest First</option>
                                    <option value="ASC" <?php echo $sortOrder === 'ASC' ? 'selected' : ''; ?>>Oldest First</option>
                                </select>
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Leads Table -->
                <div class="card">
                    <div class="card-header">
                        <i class="bi bi-table"></i> Audit Leads
                        <span class="badge bg-primary ms-2"><?php echo count($leads); ?> of <?php echo $totalLeads; ?></span>
                    </div>
                    <div class="card-body p-0">
                        <?php if (empty($leads)): ?>
                            <div class="text-center py-5">
                                <i class="bi bi-inbox display-1 text-muted"></i>
                                <h3 class="mt-3">No audit leads found</h3>
                                <p class="text-muted">No leads match your current filters.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover table-striped mb-0">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Date</th>
                                            <th>Business</th>
                                            <th>Website</th>
                                            <th>Contact</th>
                                            <th>Industry</th>
                                            <th>Overall Score</th>
                                            <th>Scores</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                        <?php foreach ($leads as $lead): 
                            $scoreClass = $lead['overall_score'] >= 80 ? 'score-excellent' : 
                                         ($lead['overall_score'] >= 60 ? 'score-good' : 'score-poor');
                            $statusColors = [
                                'New' => 'warning',
                                'Contacted' => 'info',
                                'Quoted' => 'primary',
                                'Converted' => 'success',
                                'Lost' => 'danger'
                            ];
                            $statusColor = $statusColors[$lead['status']] ?? 'secondary';
                        ?>
                            <tr>
                                <td class="text-nowrap">
                                    <small><?php echo date('M j, Y', strtotime($lead['created_at'])); ?></small><br>
                                    <small class="text-muted"><?php echo date('g:i A', strtotime($lead['created_at'])); ?></small>
                                </td>
                                <td>
                                    <strong><?php echo htmlspecialchars($lead['business_name']); ?></strong>
                                </td>
                                <td>
                                    <a href="<?php echo htmlspecialchars($lead['website_url']); ?>" target="_blank" class="text-decoration-none">
                                        <?php echo htmlspecialchars(parse_url($lead['website_url'], PHP_URL_HOST)); ?>
                                        <i class="bi bi-box-arrow-up-right small"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="mailto:<?php echo htmlspecialchars($lead['email']); ?>" class="text-decoration-none d-block">
                                        <i class="bi bi-envelope"></i> <?php echo htmlspecialchars($lead['email']); ?>
                                    </a>
                                    <?php if ($lead['phone']): ?>
                                        <a href="tel:<?php echo htmlspecialchars($lead['phone']); ?>" class="text-decoration-none d-block small">
                                            <i class="bi bi-telephone"></i> <?php echo htmlspecialchars($lead['phone']); ?>
                                        </a>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark"><?php echo htmlspecialchars($lead['industry'] ?: 'N/A'); ?></span>
                                </td>
                                <td class="text-center">
                                    <span class="score-badge <?php echo $scoreClass; ?> d-inline-block">
                                        <strong><?php echo $lead['overall_score']; ?></strong>/100
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <span class="badge bg-info" title="Performance">P: <?php echo $lead['performance_score']; ?></span>
                                        <span class="badge bg-primary" title="SEO">S: <?php echo $lead['seo_score']; ?></span>
                                        <span class="badge bg-warning text-dark" title="Security">Sec: <?php echo $lead['security_score']; ?></span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge bg-<?php echo $statusColor; ?>"><?php echo $lead['status']; ?></span>
                                </td>
                                <td class="text-nowrap">
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" 
                                            data-bs-target="#leadModal<?php echo $lead['id']; ?>" title="Manage Lead">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <a href="/admin/view-audit.php?id=<?php echo $lead['audit_id']; ?>" 
                                       class="btn btn-sm btn-primary" title="View Full Report">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Lead Management Modal -->
                            <div class="modal fade" id="leadModal<?php echo $lead['id']; ?>" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form method="POST">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Manage Lead - <?php echo htmlspecialchars($lead['business_name']); ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="lead_id" value="<?php echo $lead['id']; ?>">
                                                
                                                <div class="mb-3">
                                                    <label for="status<?php echo $lead['id']; ?>" class="form-label">Status</label>
                                                    <select name="status" id="status<?php echo $lead['id']; ?>" class="form-select" required>
                                                        <option value="New" <?php echo $lead['status'] === 'New' ? 'selected' : ''; ?>>New</option>
                                                        <option value="Contacted" <?php echo $lead['status'] === 'Contacted' ? 'selected' : ''; ?>>Contacted</option>
                                                        <option value="Quoted" <?php echo $lead['status'] === 'Quoted' ? 'selected' : ''; ?>>Quoted</option>
                                                        <option value="Converted" <?php echo $lead['status'] === 'Converted' ? 'selected' : ''; ?>>Converted</option>
                                                        <option value="Lost" <?php echo $lead['status'] === 'Lost' ? 'selected' : ''; ?>>Lost</option>
                                                    </select>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="follow_up_date<?php echo $lead['id']; ?>" class="form-label">Follow-up Date</label>
                                                    <input type="date" name="follow_up_date" id="follow_up_date<?php echo $lead['id']; ?>" 
                                                           class="form-control" value="<?php echo $lead['follow_up_date']; ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="admin_notes<?php echo $lead['id']; ?>" class="form-label">Admin Notes</label>
                                                    <textarea name="admin_notes" id="admin_notes<?php echo $lead['id']; ?>" 
                                                              class="form-control" rows="4" 
                                                              placeholder="Add notes about this lead..."></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" name="update_status" class="btn btn-primary">Update Lead</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Pagination -->
                <?php if ($totalLeads > $limit): ?>
                    <nav aria-label="Leads pagination">
                        <ul class="pagination justify-content-center">
                            <?php
                            $totalPages = ceil($totalLeads / $limit);
                            $currentPage = $page;
                            
                            // Previous page
                            if ($currentPage > 1): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $currentPage - 1; ?>&status=<?php echo $status; ?>&search=<?php echo urlencode($search); ?>&sort=<?php echo $sortBy; ?>&order=<?php echo $sortOrder; ?>">Previous</a>
                                </li>
                            <?php endif;
                            
                            // Page numbers
                            for ($i = max(1, $currentPage - 2); $i <= min($totalPages, $currentPage + 2); $i++): ?>
                                <li class="page-item <?php echo $i === $currentPage ? 'active' : ''; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>&status=<?php echo $status; ?>&search=<?php echo urlencode($search); ?>&sort=<?php echo $sortBy; ?>&order=<?php echo $sortOrder; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor;
                            
                            // Next page
                            if ($currentPage < $totalPages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $currentPage + 1; ?>&status=<?php echo $status; ?>&search=<?php echo urlencode($search); ?>&sort=<?php echo $sortBy; ?>&order=<?php echo $sortOrder; ?>">Next</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
