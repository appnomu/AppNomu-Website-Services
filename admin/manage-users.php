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
$users = [];
$errorMessage = '';
$successMessage = '';

try {
    // Create database connection
    $pdo = Config::getDatabaseConnection();
    
    // Handle user actions
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $action = $_POST['action'] ?? '';
        
        if ($action === 'toggle_status') {
            $userId = $_POST['user_id'] ?? '';
            $newStatus = $_POST['new_status'] ?? '';
            
            if (!empty($userId) && in_array($newStatus, ['0', '1'])) {
                $stmt = $pdo->prepare("
                    UPDATE admin_users 
                    SET is_active = :status, updated_at = NOW()
                    WHERE id = :user_id
                ");
                
                if ($stmt->execute([':status' => $newStatus, ':user_id' => $userId])) {
                    $statusText = $newStatus === '1' ? 'activated' : 'deactivated';
                    $successMessage = "User has been {$statusText} successfully.";
                } else {
                    $errorMessage = "Failed to update user status.";
                }
            }
        } elseif ($action === 'reset_password') {
            $userId = $_POST['user_id'] ?? '';
            
            if (!empty($userId)) {
                // Get user email
                $stmt = $pdo->prepare("SELECT email, full_name FROM admin_users WHERE id = :user_id");
                $stmt->execute([':user_id' => $userId]);
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if ($user) {
                    // Generate reset token
                    $resetToken = bin2hex(random_bytes(32));
                    $resetExpiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
                    
                    // Store reset token
                    $stmt = $pdo->prepare("
                        INSERT INTO password_resets (email, token, expires_at, ip_address, user_agent) 
                        VALUES (:email, :token, :expires_at, :ip, :user_agent)
                    ");
                    
                    $stmt->execute([
                        ':email' => $user['email'],
                        ':token' => $resetToken,
                        ':expires_at' => $resetExpiry,
                        ':ip' => $_SERVER['REMOTE_ADDR'] ?? 'admin-generated',
                        ':user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'admin-panel'
                    ]);
                    
                    // Send reset email
                    $resetLink = "https://" . $_SERVER['HTTP_HOST'] . "/admin/reset-password.php?token=" . $resetToken;
                    $userName = $user['full_name'] ?? $user['email'];
                    
                    $subject = "Admin Password Reset - AppNomu";
                    $emailBody = "
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                        <div style='background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 30px; text-align: center;'>
                            <h1>Password Reset</h1>
                            <p>AppNomu Admin Panel</p>
                        </div>
                        
                        <div style='padding: 30px; background: #f8f9fa;'>
                            <h2>Hello {$userName},</h2>
                            
                            <p>An administrator has initiated a password reset for your account. Click the button below to set a new password:</p>
                            
                            <div style='text-align: center; margin: 30px 0;'>
                                <a href='{$resetLink}' style='background: #dc3545; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;'>Reset Password</a>
                            </div>
                            
                            <p><strong>This link expires in 1 hour.</strong></p>
                            
                            <p>If you have any questions, contact your system administrator.</p>
                        </div>
                    </div>
                    ";
                    
                    $headers = [
                        'MIME-Version: 1.0',
                        'Content-type: text/html; charset=UTF-8',
                        'From: AppNomu Admin System <noreply@appnomu.com>',
                        'Reply-To: info@appnomu.com'
                    ];
                    
                    if (mail($user['email'], $subject, $emailBody, implode("\r\n", $headers))) {
                        $successMessage = "Password reset email sent to {$user['email']}.";
                    } else {
                        $errorMessage = "Failed to send password reset email.";
                    }
                } else {
                    $errorMessage = "User not found.";
                }
            }
        } elseif ($action === 'add_user') {
            $username = trim($_POST['username'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $fullName = trim($_POST['full_name'] ?? '');
            $role = $_POST['role'] ?? 'editor';
            
            if (empty($username) || empty($email) || empty($fullName)) {
                $errorMessage = "All fields are required.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errorMessage = "Please enter a valid email address.";
            } else {
                try {
                    // Generate temporary password
                    $tempPassword = 'AppNomu' . rand(1000, 9999) . '!';
                    $hashedPassword = password_hash($tempPassword, PASSWORD_DEFAULT);
                    
                    $stmt = $pdo->prepare("
                        INSERT INTO admin_users (username, email, password, full_name, role) 
                        VALUES (:username, :email, :password, :full_name, :role)
                    ");
                    
                    $stmt->execute([
                        ':username' => $username,
                        ':email' => $email,
                        ':password' => $hashedPassword,
                        ':full_name' => $fullName,
                        ':role' => $role
                    ]);
                    
                    // Send welcome email with temporary password
                    $subject = "Welcome to AppNomu Admin Panel";
                    $emailBody = "
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                        <div style='background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 30px; text-align: center;'>
                            <h1>Welcome to AppNomu Admin</h1>
                        </div>
                        
                        <div style='padding: 30px; background: #f8f9fa;'>
                            <h2>Hello {$fullName},</h2>
                            
                            <p>Your admin account has been created successfully!</p>
                            
                            <div style='background: #e9ecef; padding: 20px; border-radius: 5px; margin: 20px 0;'>
                                <p><strong>Login Details:</strong></p>
                                <p>Username: {$username}<br>
                                Email: {$email}<br>
                                Temporary Password: {$tempPassword}<br>
                                Role: {$role}</p>
                            </div>
                            
                            <div style='text-align: center; margin: 30px 0;'>
                                <a href='https://" . $_SERVER['HTTP_HOST'] . "/admin/login.php' style='background: #007bff; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;'>Login to Admin Panel</a>
                            </div>
                            
                            <p><strong>Important:</strong> Please change your password immediately after logging in.</p>
                        </div>
                    </div>
                    ";
                    
                    $headers = [
                        'MIME-Version: 1.0',
                        'Content-type: text/html; charset=UTF-8',
                        'From: AppNomu Admin System <noreply@appnomu.com>',
                        'Reply-To: info@appnomu.com'
                    ];
                    
                    mail($email, $subject, $emailBody, implode("\r\n", $headers));
                    
                    $successMessage = "User created successfully. Login details sent to {$email}.";
                    
                } catch (PDOException $e) {
                    if ($e->getCode() == 23000) { // Duplicate entry
                        $errorMessage = "Username or email already exists.";
                    } else {
                        $errorMessage = "Failed to create user: " . $e->getMessage();
                    }
                }
            }
        }
    }
    
    // Get all users
    $stmt = $pdo->query("
        SELECT id, username, email, full_name, role, is_active, last_login, created_at,
               (SELECT COUNT(*) FROM admin_login_logs WHERE user_id = admin_users.id AND login_successful = TRUE) as successful_logins,
               (SELECT COUNT(*) FROM admin_login_logs WHERE user_id = admin_users.id AND login_successful = FALSE AND created_at > DATE_SUB(NOW(), INTERVAL 24 HOUR)) as recent_failures
        FROM admin_users 
        ORDER BY created_at DESC
    ");
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    $errorMessage = "Database error: " . $e->getMessage();
}

$pageTitle = 'Manage Admin Users';
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
        .user-avatar { width: 40px; height: 40px; }
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
                        <i class="bi bi-people me-2 text-primary"></i>
                        Manage Admin Users
                    </h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                            <i class="bi bi-person-plus me-1"></i>Add New User
                        </button>
                    </div>
                </div>

                <?php if ($successMessage): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-2"></i>
                        <?php echo htmlspecialchars($successMessage); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <?php if ($errorMessage): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <?php echo htmlspecialchars($errorMessage); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <!-- Users Table -->
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-white">
                        <h5 class="mb-0">Admin Users</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th>User</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Last Login</th>
                                        <th>Activity</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="user-avatar bg-primary rounded-circle d-flex align-items-center justify-content-center text-white me-3">
                                                    <?php echo strtoupper(substr($user['full_name'] ?? $user['username'], 0, 1)); ?>
                                                </div>
                                                <div>
                                                    <div class="fw-bold"><?php echo htmlspecialchars($user['full_name'] ?? $user['username']); ?></div>
                                                    <small class="text-muted"><?php echo htmlspecialchars($user['email']); ?></small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-<?php 
                                                echo $user['role'] === 'admin' ? 'danger' : 
                                                    ($user['role'] === 'manager' ? 'warning' : 'info'); 
                                            ?>">
                                                <?php echo ucfirst($user['role']); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($user['is_active']): ?>
                                                <span class="badge bg-success">Active</span>
                                            <?php else: ?>
                                                <span class="badge bg-secondary">Inactive</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if ($user['last_login']): ?>
                                                <small><?php echo date('M j, Y g:i A', strtotime($user['last_login'])); ?></small>
                                            <?php else: ?>
                                                <small class="text-muted">Never</small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <small class="text-success"><?php echo $user['successful_logins']; ?> logins</small><br>
                                            <?php if ($user['recent_failures'] > 0): ?>
                                                <small class="text-danger"><?php echo $user['recent_failures']; ?> failures (24h)</small>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <!-- Toggle Status -->
                                                <form method="POST" class="d-inline">
                                                    <input type="hidden" name="action" value="toggle_status">
                                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                                    <input type="hidden" name="new_status" value="<?php echo $user['is_active'] ? '0' : '1'; ?>">
                                                    <button type="submit" class="btn btn-outline-<?php echo $user['is_active'] ? 'warning' : 'success'; ?>" 
                                                            title="<?php echo $user['is_active'] ? 'Deactivate' : 'Activate'; ?>">
                                                        <i class="bi bi-<?php echo $user['is_active'] ? 'pause' : 'play'; ?>"></i>
                                                    </button>
                                                </form>
                                                
                                                <!-- Reset Password -->
                                                <form method="POST" class="d-inline">
                                                    <input type="hidden" name="action" value="reset_password">
                                                    <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
                                                    <button type="submit" class="btn btn-outline-primary" title="Reset Password"
                                                            onclick="return confirm('Send password reset email to this user?')">
                                                        <i class="bi bi-key"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Add User Modal -->
    <div class="modal fade" id="addUserModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Admin User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="action" value="add_user">
                        
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="full_name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" id="role" name="role" required>
                                <option value="editor">Editor</option>
                                <option value="manager">Manager</option>
                                <option value="admin">Administrator</option>
                            </select>
                        </div>
                        
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            A temporary password will be generated and sent to the user's email address.
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
