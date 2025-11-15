<?php
// Start session
session_start();

// Check if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: index.php");
    exit;
}

// Load configuration
require_once '../config/config.php';

// Initialize variables
$errorMessage = '';
$successMessage = '';
$step = $_GET['step'] ?? 'request';

// Process password reset request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $step === 'request') {
    $email = trim($_POST['email'] ?? '');
    
    if (empty($email)) {
        $errorMessage = 'Please enter your email address.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessage = 'Please enter a valid email address.';
    } else {
        try {
            // Create database connection
            $pdo = Config::getDatabaseConnection();
            
            // Check if admin_users table exists
            $tableExists = false;
            $tables = $pdo->query("SHOW TABLES LIKE 'admin_users'")->fetchAll();
            if (count($tables) > 0) {
                $tableExists = true;
            }
            
            $userFound = false;
            
            if ($tableExists) {
                // Check if user exists in database
                $stmt = $pdo->prepare("SELECT id, username, email, full_name FROM admin_users WHERE email = :email LIMIT 1");
                $stmt->bindParam(':email', $email);
                $stmt->execute();
                
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($user) {
                    $userFound = true;
                }
            }
            
            // Check hardcoded admin emails
            if (!$userFound && ($email === 'info@appnomu.com' || $email === 'admin')) {
                $userFound = true;
                $user = [
                    'id' => 0,
                    'username' => $email,
                    'email' => $email,
                    'full_name' => $email === 'admin' ? 'Admin User' : 'AppNomu Admin'
                ];
            }
            
            if ($userFound) {
                // Generate secure reset token
                $resetToken = bin2hex(random_bytes(32));
                $resetExpiry = date('Y-m-d H:i:s', strtotime('+1 hour'));
                
                // Create password_resets table if it doesn't exist
                $pdo->exec("
                    CREATE TABLE IF NOT EXISTS password_resets (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        email VARCHAR(255) NOT NULL,
                        token VARCHAR(64) NOT NULL,
                        expires_at DATETIME NOT NULL,
                        used BOOLEAN DEFAULT FALSE,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        INDEX idx_token (token),
                        INDEX idx_email (email),
                        INDEX idx_expires (expires_at)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
                ");
                
                // Store reset token
                $stmt = $pdo->prepare("
                    INSERT INTO password_resets (email, token, expires_at) 
                    VALUES (:email, :token, :expires_at)
                ");
                $stmt->execute([
                    ':email' => $email,
                    ':token' => $resetToken,
                    ':expires_at' => $resetExpiry
                ]);
                
                // Send reset email
                $resetLink = "https://" . $_SERVER['HTTP_HOST'] . "/admin/reset-password.php?token=" . $resetToken;
                $userName = $user['full_name'] ?? $user['username'];
                
                $subject = "Password Reset Request - AppNomu Admin";
                $emailBody = "
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                    <div style='background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 30px; text-align: center;'>
                        <h1>Password Reset Request</h1>
                        <p>AppNomu Admin Portal</p>
                    </div>
                    
                    <div style='padding: 30px; background: #f8f9fa;'>
                        <h2>Hello {$userName},</h2>
                        
                        <p>We received a request to reset your admin password. If you made this request, click the button below to reset your password:</p>
                        
                        <div style='text-align: center; margin: 30px 0;'>
                            <a href='{$resetLink}' style='background: #dc3545; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;'>Reset Password</a>
                        </div>
                        
                        <p><strong>Important Security Information:</strong></p>
                        <ul>
                            <li>This link will expire in 1 hour</li>
                            <li>If you didn't request this reset, please ignore this email</li>
                            <li>For security, this link can only be used once</li>
                        </ul>
                        
                        <p>If the button doesn't work, copy and paste this link into your browser:</p>
                        <p style='word-break: break-all; background: #e9ecef; padding: 10px; border-radius: 5px;'>{$resetLink}</p>
                        
                        <hr style='margin: 30px 0; border: none; border-top: 1px solid #dee2e6;'>
                        
                        <p style='color: #666; font-size: 14px;'>
                            This is an automated message from AppNomu Admin System. 
                            If you have any concerns, contact your system administrator.
                        </p>
                    </div>
                </div>
                ";
                
                $headers = [
                    'MIME-Version: 1.0',
                    'Content-type: text/html; charset=UTF-8',
                    'From: AppNomu Admin System <noreply@appnomu.com>',
                    'Reply-To: info@appnomu.com'
                ];
                
                if (mail($email, $subject, $emailBody, implode("\r\n", $headers))) {
                    $successMessage = "Password reset instructions have been sent to your email address.";
                } else {
                    $errorMessage = "Failed to send reset email. Please try again or contact support.";
                }
            } else {
                // For security, don't reveal if email exists or not
                $successMessage = "If an account with that email exists, password reset instructions have been sent.";
            }
            
        } catch (PDOException $e) {
            error_log("Password reset error: " . $e->getMessage());
            $errorMessage = "System error. Please try again later.";
        }
    }
}

$pageTitle = 'Forgot Password - Admin';

// Include standard website header
include_once '../includes/header.php';
?>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <!-- Branding section -->
                <div class="text-center mb-4">
                    <h2 class="mb-0 fw-bold text-primary">Password Reset</h2>
                    <p class="text-muted">Secure admin account recovery</p>
                </div>
                
                <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <?php if (!empty($errorMessage)): ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 10px;">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                            <div><?php echo htmlspecialchars($errorMessage); ?></div>
                        </div>
                        <?php endif; ?>
                        
                        <?php if (!empty($successMessage)): ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert" style="border-radius: 10px;">
                            <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                            <div><?php echo htmlspecialchars($successMessage); ?></div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="login.php" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-2"></i>Back to Login
                            </a>
                        </div>
                        
                        <?php else: ?>
                        
                        <div class="text-center mb-4">
                            <i class="bi bi-key-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                        
                        <h4 class="card-title text-center mb-4">Reset Your Password</h4>
                        
                        <p class="text-muted text-center mb-4">
                            Enter your email address and we'll send you instructions to reset your password.
                        </p>
                        
                        <form method="POST" action="?step=request">
                            <div class="form-floating mb-4">
                                <input type="email" class="form-control" id="email" name="email" 
                                       placeholder="Enter your email address" required>
                                <label for="email">
                                    <i class="bi bi-envelope-fill me-2 text-primary"></i>Email Address
                                </label>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary btn-lg" type="submit" style="border-radius: 10px;">
                                    <i class="bi bi-send me-2"></i>Send Reset Instructions
                                </button>
                            </div>
                        </form>
                        
                        <div class="text-center mt-4">
                            <a href="login.php" class="text-decoration-none">
                                <i class="bi bi-arrow-left me-1"></i>Back to Login
                            </a>
                        </div>
                        
                        <?php endif; ?>
                        
                        <div class="text-center mt-4">
                            <p class="text-muted mb-0 small">
                                <i class="bi bi-shield-check me-1"></i>
                                Secure password recovery system
                            </p>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-4">
                    <p class="text-muted small">
                        &copy; <?php echo date('Y'); ?> AppNomu Business Services<br>
                        <span class="opacity-75">Admin System v1.0</span>
                    </p>
                </div>
            </div>
        </div>
    </div>

<!-- Include standard website footer -->
<?php include_once '../includes/footer.php'; ?>
