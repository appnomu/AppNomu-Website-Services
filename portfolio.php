<?php
// Include header
include_once 'includes/header.php';

// Load configuration
require_once 'config/config.php';

// Initialize variables
$projects = [];
$featuredProjects = [];
$filterType = $_GET['type'] ?? 'all';
$errorMessage = '';

// Pagination settings
$projectsPerPage = 8;
$currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($currentPage - 1) * $projectsPerPage;
$totalProjects = 0;
$totalPages = 0;

try {
    $pdo = Config::getDatabaseConnection();
    
    // Get featured projects (ordered by recently published)
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE featured = 1 AND status IN ('Live', 'Completed') ORDER BY created_at DESC LIMIT 6");
    $stmt->execute();
    $featuredProjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Count total projects for pagination
    if ($filterType === 'all') {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM projects WHERE status IN ('Live', 'Completed')");
        $stmt->execute();
    } else {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM projects WHERE project_type = ? AND status IN ('Live', 'Completed')");
        $stmt->execute([$filterType]);
    }
    $totalProjects = $stmt->fetchColumn();
    $totalPages = ceil($totalProjects / $projectsPerPage);
    
    // Get paginated projects based on filter (ordered by recently published)
    if ($filterType === 'all') {
        $stmt = $pdo->prepare("SELECT * FROM projects WHERE status IN ('Live', 'Completed') ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(':limit', $projectsPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
    } else {
        $stmt = $pdo->prepare("SELECT * FROM projects WHERE project_type = ? AND status IN ('Live', 'Completed') ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
        $stmt->bindValue(1, $filterType, PDO::PARAM_STR);
        $stmt->bindValue(':limit', $projectsPerPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
    }
    $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $errorMessage = 'Unable to load projects at this time.';
}
?>

<!-- Hero Section -->
<section class="py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white;">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge bg-light text-primary px-3 py-2 mb-3">OUR PORTFOLIO</span>
                <h1 class="display-3 fw-bold mb-4">Transforming Ideas Into Digital Reality</h1>
                <p class="lead mb-4" style="opacity: 0.9;">Explore our portfolio of 1,200+ successful projects. From stunning websites to powerful mobile apps, see how we've helped businesses across Africa and beyond achieve their digital goals.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="request-quote.php" class="btn btn-light btn-lg px-4 py-3 fw-bold">Start Your Project</a>
                    <a href="#projects" class="btn btn-outline-light btn-lg px-4 py-3">View Projects</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-4 bg-light border-bottom">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-3 mb-md-0">
                <h3 class="fw-bold text-primary mb-0">1,200+</h3>
                <small class="text-muted">Projects Completed</small>
            </div>
            <div class="col-md-3 col-6 mb-3 mb-md-0">
                <h3 class="fw-bold text-success mb-0">100+</h3>
                <small class="text-muted">Mobile Apps</small>
            </div>
            <div class="col-md-3 col-6">
                <h3 class="fw-bold text-warning mb-0">20+</h3>
                <small class="text-muted">Countries Served</small>
            </div>
            <div class="col-md-3 col-6">
                <h3 class="fw-bold text-info mb-0">5.0</h3>
                <small class="text-muted">Client Rating</small>
            </div>
        </div>
        
        <!-- Portfolio Disclaimer -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="alert alert-info border-0 shadow-sm mb-0" role="alert" style="background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);">
                    <div class="d-flex align-items-start">
                        <i class="bi bi-info-circle-fill text-primary fs-4 me-3 mt-1"></i>
                        <div>
                            <h6 class="alert-heading fw-bold mb-2">Portfolio Showcase Notice</h6>
                            <p class="mb-0 small">
                                <strong>All projects listed in this portfolio were developed in-house by AppNomu.</strong> Due to the high traffic and visibility our website receives, featured projects pay a $300 listing fee for premium placement. This ensures quality showcase opportunities and helps maintain our platform. 
                                <a href="request-quote.php" class="alert-link fw-bold">Want your project featured? Get started →</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php if (count($featuredProjects) > 0): ?>
<!-- Featured Projects Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                <i class="bi bi-star-fill me-1"></i> FEATURED PROJECTS
            </span>
            <h2 class="display-5 fw-bold mb-3">Our Best Work</h2>
            <p class="lead text-muted">Handpicked projects that showcase our expertise and creativity</p>
        </div>
        
        <div class="row g-4">
            <?php foreach ($featuredProjects as $project): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm" style="transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'">
                    <?php 
                    // Fix the logo path - remove ../ prefix if present
                    $logoPath = $project['logo_path'] ? str_replace('../', '', $project['logo_path']) : '';
                    $logoExists = $logoPath && file_exists($logoPath);
                    ?>
                    <?php if ($logoExists): ?>
                    <div class="position-relative" style="height: 200px; overflow: hidden; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                        <img src="<?php echo htmlspecialchars($logoPath); ?>" 
                             alt="<?php echo htmlspecialchars($project['title']); ?>" 
                             class="w-100 h-100" style="object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="position-relative d-flex align-items-center justify-content-center" style="height: 200px; background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);">
                        <i class="bi bi-folder text-white" style="font-size: 4rem; opacity: 0.3;"></i>
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary-subtle text-primary"><?php echo htmlspecialchars($project['project_type']); ?></span>
                            <span class="badge bg-success-subtle text-success"><?php echo htmlspecialchars($project['status']); ?></span>
                        </div>
                        <h3 class="h5 fw-bold mb-2"><?php echo htmlspecialchars($project['title']); ?></h3>
                        <?php if ($project['client_name']): ?>
                        <p class="text-muted small mb-2">
                            <strong>Client:</strong> <?php echo htmlspecialchars($project['client_name']); ?>
                        </p>
                        <?php endif; ?>
                        <p class="card-text text-muted mb-3">
                            <?php echo htmlspecialchars(substr($project['description'], 0, 120)) . (strlen($project['description']) > 120 ? '...' : ''); ?>
                        </p>
                        
                        <?php if ($project['technologies']): ?>
                        <div class="mb-3">
                            <?php 
                            $techs = array_slice(explode(',', $project['technologies']), 0, 3);
                            foreach ($techs as $tech): 
                            ?>
                            <span class="badge bg-light text-dark me-1 mb-1"><?php echo htmlspecialchars(trim($tech)); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#projectModal<?php echo $project['id']; ?>">
                                <i class="bi bi-info-circle me-1"></i>Details
                            </button>
                            <?php if ($project['url']): ?>
                            <a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="btn btn-outline-primary flex-fill">
                                <i class="bi bi-box-arrow-up-right me-1"></i>Visit
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Filter Section -->
<section id="projects" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-4">
            <h2 class="h3 fw-bold mb-3">Browse All Projects</h2>
            <p class="text-muted">Filter by project type to find what you're looking for</p>
        </div>
        
        <!-- Filter Buttons -->
        <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
            <a href="portfolio.php?type=all" class="btn <?php echo $filterType === 'all' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                <i class="bi bi-grid me-1"></i> All Projects
            </a>
            <a href="portfolio.php?type=Website" class="btn <?php echo $filterType === 'Website' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                <i class="bi bi-laptop me-1"></i> Websites
            </a>
            <a href="portfolio.php?type=Mobile App" class="btn <?php echo $filterType === 'Mobile App' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                <i class="bi bi-phone me-1"></i> Mobile Apps
            </a>
            <a href="portfolio.php?type=Web App" class="btn <?php echo $filterType === 'Web App' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                <i class="bi bi-window me-1"></i> Web Apps
            </a>
            <a href="portfolio.php?type=Desktop App" class="btn <?php echo $filterType === 'Desktop App' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                <i class="bi bi-display me-1"></i> Desktop Apps
            </a>
        </div>
        
        <?php if (count($projects) > 0): ?>
        <!-- Projects Grid -->
        <div class="row g-4 mb-5">
            <?php foreach ($projects as $project): ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card h-100 border-0 shadow-sm" style="transition: transform 0.3s ease;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <?php 
                    // Fix the logo path - remove ../ prefix if present
                    $logoPath = $project['logo_path'] ? str_replace('../', '', $project['logo_path']) : '';
                    $logoExists = $logoPath && file_exists($logoPath);
                    ?>
                    <?php if ($logoExists): ?>
                    <div class="position-relative" style="height: 150px; overflow: hidden; background: #f8f9fa;">
                        <img src="<?php echo htmlspecialchars($logoPath); ?>" 
                             alt="<?php echo htmlspecialchars($project['title']); ?>" 
                             class="w-100 h-100" style="object-fit: cover;">
                        <?php if ($project['featured']): ?>
                        <div class="position-absolute top-0 end-0 m-2">
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php else: ?>
                    <div class="d-flex align-items-center justify-content-center" style="height: 150px; background: linear-gradient(135deg, #e9ecef 0%, #f8f9fa 100%);">
                        <i class="bi bi-folder text-muted" style="font-size: 3rem; opacity: 0.3;"></i>
                        <?php if ($project['featured']): ?>
                        <div class="position-absolute top-0 end-0 m-2">
                            <i class="bi bi-star-fill text-warning"></i>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                    
                    <div class="card-body p-3">
                        <span class="badge bg-light text-dark mb-2"><?php echo htmlspecialchars($project['project_type']); ?></span>
                        <h4 class="h6 fw-bold mb-2"><?php echo htmlspecialchars($project['title']); ?></h4>
                        <?php if ($project['client_name']): ?>
                        <p class="text-muted small mb-2">
                            <strong>Client:</strong> <?php echo htmlspecialchars($project['client_name']); ?>
                        </p>
                        <?php endif; ?>
                        <div class="d-flex gap-1">
                            <button type="button" class="btn btn-sm btn-primary flex-fill" data-bs-toggle="modal" data-bs-target="#projectModal<?php echo $project['id']; ?>">
                                <i class="bi bi-info-circle me-1"></i>Details
                            </button>
                            <?php if ($project['url']): ?>
                            <a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="btn btn-sm btn-outline-primary flex-fill">
                                <i class="bi bi-box-arrow-up-right me-1"></i>Visit
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- Pagination -->
        <?php if ($totalPages > 1): ?>
        <div class="d-flex justify-content-center align-items-center gap-2 flex-wrap">
            <!-- Previous Button -->
            <?php if ($currentPage > 1): ?>
            <a href="portfolio.php?type=<?php echo urlencode($filterType); ?>&page=<?php echo $currentPage - 1; ?>" 
               class="btn btn-outline-primary">
                <i class="bi bi-chevron-left me-1"></i>Previous
            </a>
            <?php else: ?>
            <button class="btn btn-outline-secondary" disabled>
                <i class="bi bi-chevron-left me-1"></i>Previous
            </button>
            <?php endif; ?>
            
            <!-- Page Numbers -->
            <div class="d-flex gap-1">
                <?php
                // Show max 5 page numbers at a time
                $startPage = max(1, $currentPage - 2);
                $endPage = min($totalPages, $currentPage + 2);
                
                // Show first page if not in range
                if ($startPage > 1): ?>
                    <a href="portfolio.php?type=<?php echo urlencode($filterType); ?>&page=1" 
                       class="btn btn-outline-primary">1</a>
                    <?php if ($startPage > 2): ?>
                        <span class="btn btn-outline-secondary disabled">...</span>
                    <?php endif; ?>
                <?php endif; ?>
                
                <?php for ($i = $startPage; $i <= $endPage; $i++): ?>
                    <a href="portfolio.php?type=<?php echo urlencode($filterType); ?>&page=<?php echo $i; ?>" 
                       class="btn <?php echo $i === $currentPage ? 'btn-primary' : 'btn-outline-primary'; ?>">
                        <?php echo $i; ?>
                    </a>
                <?php endfor; ?>
                
                <!-- Show last page if not in range -->
                <?php if ($endPage < $totalPages): ?>
                    <?php if ($endPage < $totalPages - 1): ?>
                        <span class="btn btn-outline-secondary disabled">...</span>
                    <?php endif; ?>
                    <a href="portfolio.php?type=<?php echo urlencode($filterType); ?>&page=<?php echo $totalPages; ?>" 
                       class="btn btn-outline-primary"><?php echo $totalPages; ?></a>
                <?php endif; ?>
            </div>
            
            <!-- Next Button -->
            <?php if ($currentPage < $totalPages): ?>
            <a href="portfolio.php?type=<?php echo urlencode($filterType); ?>&page=<?php echo $currentPage + 1; ?>" 
               class="btn btn-outline-primary">
                Next<i class="bi bi-chevron-right ms-1"></i>
            </a>
            <?php else: ?>
            <button class="btn btn-outline-secondary" disabled>
                Next<i class="bi bi-chevron-right ms-1"></i>
            </button>
            <?php endif; ?>
        </div>
        
        <!-- Pagination Info -->
        <div class="text-center mt-3">
            <small class="text-muted">
                Showing <?php echo min($offset + 1, $totalProjects); ?>-<?php echo min($offset + $projectsPerPage, $totalProjects); ?> 
                of <?php echo $totalProjects; ?> projects
            </small>
        </div>
        <?php endif; ?>
        
        <?php else: ?>
        <!-- Empty State -->
        <div class="text-center py-5">
            <i class="bi bi-folder-x fs-1 text-muted mb-3"></i>
            <h3 class="h5 text-muted mb-3">No Projects Found</h3>
            <p class="text-muted mb-4">We haven't added any <?php echo $filterType !== 'all' ? htmlspecialchars($filterType) : ''; ?> projects yet.</p>
            <a href="portfolio.php?type=all" class="btn btn-primary">View All Projects</a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="bg-primary rounded-4 p-5 text-center text-white" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%) !important;">
            <h2 class="display-5 fw-bold mb-3">Ready to Start Your Project?</h2>
            <p class="lead mb-4" style="opacity: 0.9;">Join 1,200+ successful businesses who trusted AppNomu with their digital transformation</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="request-quote.php" class="btn btn-light btn-lg px-5 py-3 fw-bold">Get Free Quote</a>
                <a href="contact.php" class="btn btn-outline-light btn-lg px-5 py-3">Contact Us</a>
            </div>
            <div class="mt-4">
                <div class="d-flex justify-content-center align-items-center gap-4 flex-wrap">
                    <div>
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <small>3-Day Delivery</small>
                    </div>
                    <div>
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <small>100% Satisfaction</small>
                    </div>
                    <div>
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <small>24/7 Support</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Project Detail Modals -->
<?php 
// Combine all projects for modals (featured + all projects)
$allProjectsForModals = [];
if (is_array($featuredProjects)) {
    $allProjectsForModals = array_merge($allProjectsForModals, $featuredProjects);
}
if (is_array($projects)) {
    $allProjectsForModals = array_merge($allProjectsForModals, $projects);
}

// Remove duplicates by id using a simpler approach
$uniqueProjects = [];
$seenIds = [];
foreach ($allProjectsForModals as $project) {
    if (!in_array($project['id'], $seenIds)) {
        $uniqueProjects[] = $project;
        $seenIds[] = $project['id'];
    }
}
?>
<?php
if (count($uniqueProjects) > 0):
foreach ($uniqueProjects as $project): 
    $logoPath = $project['logo_path'] ? str_replace('../', '', $project['logo_path']) : '';
    $logoExists = $logoPath && file_exists($logoPath);
?>
<div class="modal fade" id="projectModal<?php echo $project['id']; ?>" tabindex="-1" aria-labelledby="projectModalLabel<?php echo $project['id']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header border-0 pb-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-4 pt-0">
                <!-- Project Image -->
                <?php if ($logoExists): ?>
                <div class="mb-4 rounded-3 overflow-hidden" style="max-height: 300px;">
                    <img src="<?php echo htmlspecialchars($logoPath); ?>" 
                         alt="<?php echo htmlspecialchars($project['title']); ?>" 
                         class="w-100" style="object-fit: cover;">
                </div>
                <?php endif; ?>
                
                <!-- Project Header -->
                <div class="mb-4">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h2 class="h3 fw-bold mb-2"><?php echo htmlspecialchars($project['title']); ?></h2>
                            <?php if ($project['client_name']): ?>
                            <p class="text-muted mb-0">
                                <strong>Client:</strong> <?php echo htmlspecialchars($project['client_name']); ?>
                            </p>
                            <?php endif; ?>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-primary-subtle text-primary mb-2 d-block"><?php echo htmlspecialchars($project['project_type']); ?></span>
                            <span class="badge bg-success-subtle text-success d-block"><?php echo htmlspecialchars($project['status']); ?></span>
                            <?php if ($project['featured']): ?>
                            <span class="badge bg-warning text-dark mt-2 d-block">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Project Description -->
                <?php if ($project['description']): ?>
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-file-text text-primary me-2"></i>About This Project
                    </h5>
                    <p class="text-muted"><?php echo nl2br(htmlspecialchars($project['description'])); ?></p>
                </div>
                <?php endif; ?>
                
                <!-- Technologies Used -->
                <?php if ($project['technologies']): ?>
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-code-slash text-primary me-2"></i>Technologies Used
                    </h5>
                    <div class="d-flex flex-wrap gap-2">
                        <?php 
                        $techs = explode(',', $project['technologies']);
                        foreach ($techs as $tech): 
                        ?>
                        <span class="badge bg-light text-dark px-3 py-2"><?php echo htmlspecialchars(trim($tech)); ?></span>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Project Timeline -->
                <?php if ($project['start_date'] || $project['completion_date'] || $project['time_spent_hours']): ?>
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-calendar-check text-primary me-2"></i>Project Timeline
                    </h5>
                    <div class="row g-3">
                        <?php if ($project['start_date']): ?>
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">Start Date</small>
                                <strong><?php echo date('M d, Y', strtotime($project['start_date'])); ?></strong>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($project['completion_date']): ?>
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">Completion Date</small>
                                <strong><?php echo date('M d, Y', strtotime($project['completion_date'])); ?></strong>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php if ($project['time_spent_hours']): ?>
                        <div class="col-md-4">
                            <div class="bg-light rounded-3 p-3">
                                <small class="text-muted d-block mb-1">Time Invested</small>
                                <strong><?php echo number_format($project['time_spent_hours'], 1); ?> hours</strong>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Remarks/Notes -->
                <?php if ($project['remarks']): ?>
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">
                        <i class="bi bi-chat-text text-primary me-2"></i>Additional Notes
                    </h5>
                    <div class="bg-light rounded-3 p-3">
                        <p class="mb-0 text-muted"><?php echo nl2br(htmlspecialchars($project['remarks'])); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="modal-footer border-0 pt-0">
                <?php if ($project['url']): ?>
                <a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="btn btn-primary">
                    <i class="bi bi-box-arrow-up-right me-2"></i>Visit Live Project
                </a>
                <?php endif; ?>
                <a href="request-quote.php" class="btn btn-success">
                    <i class="bi bi-plus-circle me-2"></i>Start Similar Project
                </a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
<?php endif; ?>

<?php include_once 'includes/footer.php'; ?>
