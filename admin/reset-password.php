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
$token = $_GET['token'] ?? '';
$validToken = false;
$userEmail = '';

// Validate token
if (!empty($token)) {
    try {
        $pdo = Config::getDatabaseConnection();
        
        // Check if token exists and is valid
        $stmt = $pdo->prepare("
            SELECT email, expires_at, used 
            FROM password_resets 
            WHERE token = :token 
            AND expires_at > NOW() 
            AND used = FALSE
            LIMIT 1
        ");
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        
        $resetData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($resetData) {
            $validToken = true;
            $userEmail = $resetData['email'];
        } else {
            $errorMessage = 'Invalid or expired reset token. Please request a new password reset.';
        }
        
    } catch (PDOException $e) {
        error_log("Token validation error: " . $e->getMessage());
        $errorMessage = 'System error. Please try again later.';
    }
} else {
    $errorMessage = 'No reset token provided.';
}

// Process password reset
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $validToken) {
    $newPassword = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    
    // Validate passwords
    if (empty($newPassword)) {
        $errorMessage = 'Please enter a new password.';
    } elseif (strlen($newPassword) < 8) {
        $errorMessage = 'Password must be at least 8 characters long.';
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]/', $newPassword)) {
        $errorMessage = 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.';
    } elseif ($newPassword !== $confirmPassword) {
        $errorMessage = 'Passwords do not match.';
    } else {
        try {
            $pdo = Config::getDatabaseConnection();
            
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
            
            // Check if user exists in admin_users table
            $stmt = $pdo->prepare("SELECT id FROM admin_users WHERE email = :email LIMIT 1");
            $stmt->bindParam(':email', $userEmail);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($user) {
                // Update existing user password
                $stmt = $pdo->prepare("
                    UPDATE admin_users 
                    SET password = :password, updated_at = NOW() 
                    WHERE email = :email
                ");
                $stmt->execute([
                    ':password' => $hashedPassword,
                    ':email' => $userEmail
                ]);
            } else {
                // Create admin_users table if it doesn't exist
                $pdo->exec("
                    CREATE TABLE IF NOT EXISTS admin_users (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        username VARCHAR(50) UNIQUE NOT NULL,
                        email VARCHAR(100) UNIQUE NOT NULL,
                        password VARCHAR(255) NOT NULL,
                        full_name VARCHAR(100) NULL,
                        role ENUM('admin', 'manager', 'editor') DEFAULT 'admin',
                        is_active BOOLEAN DEFAULT TRUE,
                        last_login DATETIME NULL,
                        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                        updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                        
                        INDEX idx_username (username),
                        INDEX idx_email (email),
                        INDEX idx_active (is_active)
                    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
                ");
                
                // Insert new user record for hardcoded admins
                $username = $userEmail === 'info@appnomu.com' ? 'appnomu_admin' : 'admin';
                $fullName = $userEmail === 'info@appnomu.com' ? 'AppNomu Admin' : 'Admin User';
                
                $stmt = $pdo->prepare("
                    INSERT INTO admin_users (username, email, password, full_name, role) 
                    VALUES (:username, :email, :password, :full_name, 'admin')
                    ON DUPLICATE KEY UPDATE password = :password, updated_at = NOW()
                ");
                $stmt->execute([
                    ':username' => $username,
                    ':email' => $userEmail,
                    ':password' => $hashedPassword,
                    ':full_name' => $fullName
                ]);
            }
            
            // Mark token as used
            $stmt = $pdo->prepare("
                UPDATE password_resets 
                SET used = TRUE 
                WHERE token = :token
            ");
            $stmt->bindParam(':token', $token);
            $stmt->execute();
            
            // Send confirmation email
            $subject = "Password Reset Successful - AppNomu Admin";
            $emailBody = "
            <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                <div style='background: linear-gradient(135deg, #28a745 0%, #20c997 100%); color: white; padding: 30px; text-align: center;'>
                    <h1>Password Reset Successful</h1>
                    <p>AppNomu Admin Portal</p>
                </div>
                
                <div style='padding: 30px; background: #f8f9fa;'>
                    <h2>Password Updated Successfully</h2>
                    
                    <p>Your admin password has been successfully reset. You can now log in with your new password.</p>
                    
                    <div style='text-align: center; margin: 30px 0;'>
                        <a href='https://" . $_SERVER['HTTP_HOST'] . "/admin/login.php' style='background: #007bff; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold; display: inline-block;'>Login to Admin Panel</a>
                    </div>
                    
                    <p><strong>Security Reminder:</strong></p>
                    <ul>
                        <li>Keep your password secure and don't share it</li>
                        <li>Use two-factor authentication when prompted</li>
                        <li>Log out when finished using the admin panel</li>
                    </ul>
                    
                    <p>If you didn't reset your password, please contact your system administrator immediately.</p>
                    
                    <hr style='margin: 30px 0; border: none; border-top: 1px solid #dee2e6;'>
                    
                    <p style='color: #666; font-size: 14px;'>
                        This is an automated message from AppNomu Admin System. 
                        Reset completed on " . date('Y-m-d H:i:s') . "
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
            
            mail($userEmail, $subject, $emailBody, implode("\r\n", $headers));
            
            $successMessage = 'Password reset successful! You can now log in with your new password.';
            $validToken = false; // Hide the form
            
        } catch (PDOException $e) {
            error_log("Password reset error: " . $e->getMessage());
            $errorMessage = 'Failed to reset password. Please try again.';
        }
    }
}

$pageTitle = 'Reset Password - Admin';

// Include standard website header
include_once '../includes/header.php';
?>

<style>
    .password-strength {
        height: 5px;
        border-radius: 3px;
        transition: all 0.3s ease;
    }
    .strength-weak { background-color: #dc3545; }
    .strength-medium { background-color: #ffc107; }
    .strength-strong { background-color: #28a745; }
</style>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-5">
                <!-- Branding section -->
                <div class="text-center mb-4">
                    <h2 class="mb-0 fw-bold text-primary">Reset Password</h2>
                    <p class="text-muted">Set your new admin password</p>
                </div>
                
                <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                    <div class="card-body p-5">
                        <?php if (!empty($errorMessage)): ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 10px;">
                            <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                            <div><?php echo htmlspecialchars($errorMessage); ?></div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="forgot-password.php" class="btn btn-outline-primary">
                                <i class="bi bi-arrow-left me-2"></i>Request New Reset
                            </a>
                        </div>
                        
                        <?php elseif (!empty($successMessage)): ?>
                        <div class="alert alert-success d-flex align-items-center" role="alert" style="border-radius: 10px;">
                            <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                            <div><?php echo htmlspecialchars($successMessage); ?></div>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="login.php" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Login Now
                            </a>
                        </div>
                        
                        <?php elseif ($validToken): ?>
                        
                        <div class="text-center mb-4">
                            <i class="bi bi-shield-lock-fill text-success" style="font-size: 3rem;"></i>
                        </div>
                        
                        <h4 class="card-title text-center mb-4">Set New Password</h4>
                        
                        <p class="text-muted text-center mb-4">
                            Enter your new password below. Make sure it's strong and secure.
                        </p>
                        
                        <form method="POST" id="resetForm">
                            <div class="form-floating mb-3">
                                <input type="password" class="form-control" id="password" name="password" 
                                       placeholder="Enter new password" required minlength="8">
                                <label for="password">
                                    <i class="bi bi-lock-fill me-2 text-primary"></i>New Password
                                </label>
                            </div>
                            
                            <!-- Password strength indicator -->
                            <div class="mb-3">
                                <div class="password-strength" id="strengthBar"></div>
                                <small class="text-muted" id="strengthText">Password strength: <span id="strengthLevel">-</span></small>
                            </div>
                            
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" 
                                       placeholder="Confirm new password" required>
                                <label for="confirm_password">
                                    <i class="bi bi-lock-fill me-2 text-primary"></i>Confirm Password
                                </label>
                            </div>
                            
                            <!-- Password requirements -->
                            <div class="mb-4">
                                <small class="text-muted">Password requirements:</small>
                                <ul class="small text-muted mt-1">
                                    <li id="req-length">At least 8 characters</li>
                                    <li id="req-upper">One uppercase letter</li>
                                    <li id="req-lower">One lowercase letter</li>
                                    <li id="req-number">One number</li>
                                    <li id="req-special">One special character (@$!%*?&)</li>
                                </ul>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button class="btn btn-success btn-lg" type="submit" style="border-radius: 10px;" id="submitBtn" disabled>
                                    <i class="bi bi-check-circle me-2"></i>Reset Password
                                </button>
                            </div>
                        </form>
                        
                        <?php endif; ?>
                        
                        <div class="text-center mt-4">
                            <a href="login.php" class="text-decoration-none">
                                <i class="bi bi-arrow-left me-1"></i>Back to Login
                            </a>
                        </div>
                        
                        <div class="text-center mt-3">
                            <p class="text-muted mb-0 small">
                                <i class="bi bi-shield-check me-1"></i>
                                Secure password reset system
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
    
    <?php if ($validToken): ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('confirm_password');
        const strengthBar = document.getElementById('strengthBar');
        const strengthLevel = document.getElementById('strengthLevel');
        const submitBtn = document.getElementById('submitBtn');
        
        // Password strength checker
        function checkPasswordStrength(password) {
            let score = 0;
            const requirements = {
                length: password.length >= 8,
                upper: /[A-Z]/.test(password),
                lower: /[a-z]/.test(password),
                number: /\d/.test(password),
                special: /[@$!%*?&]/.test(password)
            };
            
            // Update requirement indicators
            Object.keys(requirements).forEach(req => {
                const element = document.getElementById('req-' + req);
                if (requirements[req]) {
                    element.style.color = '#28a745';
                    element.innerHTML = '✓ ' + element.textContent.replace('✓ ', '').replace('✗ ', '');
                    score++;
                } else {
                    element.style.color = '#dc3545';
                    element.innerHTML = '✗ ' + element.textContent.replace('✓ ', '').replace('✗ ', '');
                }
            });
            
            // Update strength bar
            if (score < 3) {
                strengthBar.className = 'password-strength strength-weak';
                strengthBar.style.width = '33%';
                strengthLevel.textContent = 'Weak';
                strengthLevel.style.color = '#dc3545';
            } else if (score < 5) {
                strengthBar.className = 'password-strength strength-medium';
                strengthBar.style.width = '66%';
                strengthLevel.textContent = 'Medium';
                strengthLevel.style.color = '#ffc107';
            } else {
                strengthBar.className = 'password-strength strength-strong';
                strengthBar.style.width = '100%';
                strengthLevel.textContent = 'Strong';
                strengthLevel.style.color = '#28a745';
            }
            
            return score === 5;
        }
        
        // Validate form
        function validateForm() {
            const password = passwordInput.value;
            const confirmPassword = confirmInput.value;
            const isStrong = checkPasswordStrength(password);
            const passwordsMatch = password === confirmPassword && password.length > 0;
            
            // Update confirm password field styling
            if (confirmPassword.length > 0) {
                if (passwordsMatch) {
                    confirmInput.classList.remove('is-invalid');
                    confirmInput.classList.add('is-valid');
                } else {
                    confirmInput.classList.remove('is-valid');
                    confirmInput.classList.add('is-invalid');
                }
            } else {
                confirmInput.classList.remove('is-valid', 'is-invalid');
            }
            
            // Enable/disable submit button
            submitBtn.disabled = !(isStrong && passwordsMatch);
        }
        
        // Event listeners
        passwordInput.addEventListener('input', validateForm);
        confirmInput.addEventListener('input', validateForm);
        
        // Form submission
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            if (submitBtn.disabled) {
                e.preventDefault();
                return false;
            }
        });
    });
    </script>
    <?php endif; ?>

<!-- Include standard website footer -->
<?php include_once '../includes/footer.php'; ?>
