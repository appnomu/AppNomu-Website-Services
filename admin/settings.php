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
$settings = [];
$errorMessage = '';
$successMessage = '';

// Get current settings
try {
    // Create database connection
    $pdo = Config::getDatabaseConnection();
    
    // Check if settings table exists
    $tableExists = false;
    $tables = $pdo->query("SHOW TABLES LIKE 'site_settings'")->fetchAll();
    if (count($tables) > 0) {
        $tableExists = true;
    }
    
    // Create the settings table if it doesn't exist
    if (!$tableExists) {
        $pdo->exec("CREATE TABLE site_settings (
            setting_id INT AUTO_INCREMENT PRIMARY KEY,
            setting_name VARCHAR(100) NOT NULL UNIQUE,
            setting_value TEXT,
            setting_group VARCHAR(50) DEFAULT 'general',
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )");
        
        // Insert default settings
        $defaultSettings = [
            ['site_name', 'AppNomu Business Services', 'general'],
            ['admin_email', 'info@appnomu.com', 'general'],
            ['quote_notification', '1', 'notifications'],
            ['quote_auto_reply', '1', 'notifications'],
            ['maintenance_mode', '0', 'system']
        ];
        
        $insertStmt = $pdo->prepare("INSERT INTO site_settings (setting_name, setting_value, setting_group) VALUES (?, ?, ?)");
        foreach ($defaultSettings as $setting) {
            $insertStmt->execute($setting);
        }
    }
    
    // Process form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_settings'])) {
        // Get all settings from form
        $newSettings = $_POST['settings'] ?? [];
        
        // Update each setting
        if (!empty($newSettings)) {
            $updateStmt = $pdo->prepare("UPDATE site_settings SET setting_value = ?, updated_at = NOW() WHERE setting_name = ?");
            
            foreach ($newSettings as $name => $value) {
                $updateStmt->execute([$value, $name]);
            }
            
            $successMessage = 'Settings updated successfully.';
        }
    }
    
    // Get all settings from database
    $stmt = $pdo->query("SELECT * FROM site_settings ORDER BY setting_group, setting_name");
    $allSettings = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Group settings
    $settings = [];
    foreach ($allSettings as $row) {
        $group = $row['setting_group'];
        if (!isset($settings[$group])) {
            $settings[$group] = [];
        }
        $settings[$group][] = $row;
    }
    
} catch (PDOException $e) {
    $errorMessage = "Database error: " . $e->getMessage();
}

// Set page title for header
$pageTitle = 'System Settings';

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
                    <h1 class="h2">System Settings</h1>
                </div>
                
                <?php if (!empty($errorMessage)): ?>
                <div class="alert alert-danger" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <?php echo $errorMessage; ?>
                </div>
                <?php endif; ?>
                
                <?php if (!empty($successMessage)): ?>
                <div class="alert alert-success" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?php echo $successMessage; ?>
                </div>
                <?php endif; ?>
                
                <form method="POST" action="">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <ul class="nav nav-tabs card-header-tabs" id="settings-tabs" role="tablist">
                                        <?php 
                                        $firstTab = true;
                                        foreach ($settings as $group => $groupSettings): 
                                            $groupId = strtolower(str_replace(' ', '-', $group));
                                        ?>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link <?php echo $firstTab ? 'active' : ''; ?>" 
                                                id="<?php echo $groupId; ?>-tab" 
                                                data-bs-toggle="tab" 
                                                data-bs-target="#<?php echo $groupId; ?>" 
                                                type="button" 
                                                role="tab" 
                                                aria-controls="<?php echo $groupId; ?>" 
                                                aria-selected="<?php echo $firstTab ? 'true' : 'false'; ?>">
                                                <?php echo ucfirst($group); ?>
                                            </button>
                                        </li>
                                        <?php 
                                            $firstTab = false;
                                        endforeach; 
                                        ?>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content" id="settings-tab-content">
                                        <?php 
                                        $firstTab = true;
                                        foreach ($settings as $group => $groupSettings): 
                                            $groupId = strtolower(str_replace(' ', '-', $group));
                                        ?>
                                        <div class="tab-pane fade <?php echo $firstTab ? 'show active' : ''; ?>" 
                                            id="<?php echo $groupId; ?>" 
                                            role="tabpanel" 
                                            aria-labelledby="<?php echo $groupId; ?>-tab">
                                            
                                            <?php foreach ($groupSettings as $setting): ?>
                                                <div class="mb-3">
                                                    <?php
                                                    // Convert setting_name to label
                                                    $label = str_replace('_', ' ', $setting['setting_name']);
                                                    $label = ucwords($label);
                                                    
                                                    // Determine input type
                                                    $inputType = 'text';
                                                    $inputOptions = '';
                                                    
                                                    if (strpos($setting['setting_name'], 'email') !== false) {
                                                        $inputType = 'email';
                                                    } elseif (in_array($setting['setting_value'], ['0', '1'])) {
                                                        $inputType = 'select';
                                                        $inputOptions = '<option value="1" ' . ($setting['setting_value'] == '1' ? 'selected' : '') . '>Enabled</option>';
                                                        $inputOptions .= '<option value="0" ' . ($setting['setting_value'] == '0' ? 'selected' : '') . '>Disabled</option>';
                                                    }
                                                    ?>
                                                    
                                                    <label for="<?php echo $setting['setting_name']; ?>" class="form-label">
                                                        <?php echo $label; ?>
                                                    </label>
                                                    
                                                    <?php if ($inputType === 'select'): ?>
                                                        <select class="form-select" id="<?php echo $setting['setting_name']; ?>" name="settings[<?php echo $setting['setting_name']; ?>]">
                                                            <?php echo $inputOptions; ?>
                                                        </select>
                                                    <?php else: ?>
                                                        <input type="<?php echo $inputType; ?>" class="form-control" id="<?php echo $setting['setting_name']; ?>" name="settings[<?php echo $setting['setting_name']; ?>]" value="<?php echo htmlspecialchars($setting['setting_value']); ?>">
                                                    <?php endif; ?>
                                                    
                                                    <div class="form-text">
                                                        <?php echo getSettingHelp($setting['setting_name']); ?>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                        <?php 
                                            $firstTab = false;
                                        endforeach; 
                                        ?>
                                    </div>
                                </div>
                                <div class="card-footer text-end">
                                    <button type="submit" name="save_settings" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">System Information</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            PHP Version
                                            <span class="badge bg-secondary rounded-pill"><?php echo phpversion(); ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            MySQL Version
                                            <span class="badge bg-secondary rounded-pill">
                                                <?php 
                                                try {
                                                    $version = $pdo->query('select version()')->fetchColumn();
                                                    echo $version;
                                                } catch (Exception $e) {
                                                    echo 'Unknown';
                                                }
                                                ?>
                                            </span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Server Software
                                            <span class="badge bg-secondary rounded-pill"><?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'Unknown'; ?></span>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            Admin System
                                            <span class="badge bg-secondary rounded-pill">v1.0</span>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Card footer removed -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</div>

<?php
// Helper function to get help text for settings
function getSettingHelp($settingName) {
    $helpTexts = [
        'site_name' => 'The name of your website, displayed in the browser title and emails.',
        'admin_email' => 'The primary email address for system notifications.',
        'quote_notification' => 'Enable email notifications when new quote requests are received.',
        'quote_auto_reply' => 'Send automatic confirmation emails to users after submitting a quote request.',
        'maintenance_mode' => 'Enable maintenance mode to temporarily make the site unavailable to visitors.'
    ];
    
    return $helpTexts[$settingName] ?? '';
}
?>

<?php include_once '../includes/footer.php'; ?>
