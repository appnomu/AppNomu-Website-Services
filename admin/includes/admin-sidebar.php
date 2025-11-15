<?php
// Include the path utilities
require_once __DIR__ . '/path-utils.php';
?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar collapse" style="background: linear-gradient(180deg, #f8f9fa 0%, #e9ecef 100%); border-right: 1px solid #dee2e6;">
  <div class="position-sticky pt-4">
    <!-- Admin Brand -->
    <div class="px-3 mb-4">
      <div class="d-flex align-items-center">
        <div class="bg-primary rounded-circle p-2 me-3">
          <i class="bi bi-shield-check text-white"></i>
        </div>
        <div>
          <h6 class="mb-0 fw-bold text-dark">Admin Panel</h6>
          <small class="text-muted">AppNomu Management</small>
        </div>
      </div>
    </div>

    <!-- Main Navigation -->
    <div class="px-2">
      <h6 class="sidebar-heading px-3 mt-2 mb-3 text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">
        <span>Main Menu</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item mb-1">
          <a class="nav-link rounded-3 <?php echo basename($_SERVER['PHP_SELF']) === 'index.php' ? 'active bg-primary text-white shadow-sm' : 'text-dark'; ?>" 
             href="<?php echo adminUrl('index.php'); ?>" style="padding: 0.75rem 1rem;">
            <i class="bi bi-speedometer2 me-3"></i>
            <span class="fw-medium">Dashboard</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link rounded-3 <?php echo basename($_SERVER['PHP_SELF']) === 'quotes.php' ? 'active bg-primary text-white shadow-sm' : 'text-dark'; ?>" 
             href="<?php echo adminUrl('quotes.php'); ?>" style="padding: 0.75rem 1rem;">
            <i class="bi bi-chat-quote me-3"></i>
            <span class="fw-medium">Quote Requests</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link rounded-3 <?php echo in_array(basename($_SERVER['PHP_SELF']), ['audit-leads.php', 'view-audit.php']) ? 'active bg-primary text-white shadow-sm' : 'text-dark'; ?>" 
             href="<?php echo adminUrl('audit-leads.php'); ?>" style="padding: 0.75rem 1rem;">
            <i class="bi bi-search-heart me-3 text-success"></i>
            <span class="fw-medium">Audit Leads</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link rounded-3 <?php echo in_array(basename($_SERVER['PHP_SELF']), ['projects.php', 'add-project.php', 'view-project.php', 'edit-project.php']) ? 'active bg-primary text-white shadow-sm' : 'text-dark'; ?>" 
             href="<?php echo adminUrl('projects.php'); ?>" style="padding: 0.75rem 1rem;">
            <i class="bi bi-folder-fill me-3 text-primary"></i>
            <span class="fw-medium">Projects Portfolio</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link rounded-3 <?php echo basename($_SERVER['PHP_SELF']) === 'settings.php' ? 'active bg-primary text-white shadow-sm' : 'text-dark'; ?>" 
             href="<?php echo adminUrl('settings.php'); ?>" style="padding: 0.75rem 1rem;">
            <i class="bi bi-gear me-3"></i>
            <span class="fw-medium">Settings</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Administrative Section -->
    <div class="px-2 mt-4">
      <h6 class="sidebar-heading px-3 mt-2 mb-3 text-muted text-uppercase fw-bold" style="font-size: 0.75rem; letter-spacing: 0.5px;">
        <span>Administrative</span>
      </h6>
      <ul class="nav flex-column">
        <li class="nav-item mb-1">
          <a class="nav-link rounded-3 <?php echo in_array(basename($_SERVER['PHP_SELF']), ['manage-users.php', 'users.php']) ? 'active bg-primary text-white shadow-sm' : 'text-dark'; ?>" 
             href="<?php echo adminUrl('manage-users.php'); ?>" style="padding: 0.75rem 1rem;">
            <i class="bi bi-people me-3"></i>
            <span class="fw-medium">Admin Users</span>
          </a>
        </li>
        <li class="nav-item mb-1">
          <a class="nav-link rounded-3 text-dark" href="../index.php" target="_blank" style="padding: 0.75rem 1rem;">
            <i class="bi bi-box-arrow-up-right me-3 text-info"></i>
            <span class="fw-medium">View Website</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- Logout Section -->
    <div class="px-2 mt-4 pt-3" style="border-top: 1px solid #dee2e6;">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link rounded-3 text-danger hover-bg-danger" href="<?php echo adminUrl('logout.php'); ?>" 
             style="padding: 0.75rem 1rem;" onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='white';" 
             onmouseout="this.style.backgroundColor=''; this.style.color='#dc3545';">
            <i class="bi bi-box-arrow-right me-3"></i>
            <span class="fw-medium">Logout</span>
          </a>
        </li>
      </ul>
    </div>

    <!-- User Info Footer -->
    <div class="px-3 mt-4 pt-3" style="border-top: 1px solid #dee2e6;">
      <div class="d-flex align-items-center">
        <div class="bg-success rounded-circle p-1 me-2">
          <i class="bi bi-person-fill text-white" style="font-size: 0.8rem;"></i>
        </div>
        <div>
          <small class="text-muted d-block">Logged in as</small>
          <small class="fw-bold text-dark"><?php echo $_SESSION['admin_username'] ?? 'Admin'; ?></small>
        </div>
      </div>
    </div>
  </div>
</nav>
