<?php
// Start session
session_start();

// Include OTP manager
require_once 'includes/otp-manager.php';

// Check if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    // Redirect to admin dashboard
    header("Location: index.php");
    exit;
}

// Check if there's an active OTP verification in progress
if (isset($_SESSION['admin_temp']) && is_array($_SESSION['admin_temp'])) {
    // Redirect to OTP verification page
    header("Location: verify-otp.php");
    exit;
}

// Initialize variables
$errorMessage = '';
$successMessage = '';

// Check for logout message in cookie
if (isset($_COOKIE['logout_message'])) {
    $successMessage = $_COOKIE['logout_message'];
    // Clear the cookie
    setcookie('logout_message', '', time() - 3600, '/');
}

// Load configuration
require_once '../config/config.php';

// Process login form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    try {
        // Create database connection
        $pdo = Config::getDatabaseConnection();
        
        // Check if admin_users table exists
        $tableExists = false;
        $tables = $pdo->query("SHOW TABLES LIKE 'admin_users'")->fetchAll();
        if (count($tables) > 0) {
            $tableExists = true;
        }
        
        if ($tableExists) {
            // Query for user with this username/email
            $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = :username OR email = :email LIMIT 1");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $username);
            $stmt->execute();
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // If user exists and password is correct
            if ($user) {
                // Check using password_verify for hashed passwords
                if (password_verify($password, $user['password'])) {
                    // Password is valid, generate OTP and send it to the user's email
                    $otp = generateOTP();
                    $userEmail = $user['email'];
                    $userName = $user['full_name'] ?? $user['username'];
                    
                    // Store OTP in session
                    storeOTP($otp, $userEmail);
                    
                    // Store user info temporarily in session
                    $_SESSION['admin_temp'] = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'email' => $userEmail,
                        'role' => $user['role'],
                        'name' => $userName
                    ];
                    
                    // Send OTP email
                    if (sendOTPEmail($userEmail, $userName, $otp)) {
                        // Redirect to OTP verification page
                        header("Location: verify-otp.php");
                        exit;
                    } else {
                        // Email sending failed
                        $errorMessage = 'Failed to send verification code. Please try again.';
                        unset($_SESSION['admin_temp']);
                        unset($_SESSION['otp']);
                    }
                } else {
                    $errorMessage = 'Invalid password';
                }
            } else {
                // Fallback to hardcoded credentials if database record not found
                // This is for initial access, should be removed once proper users are set up
                if (($username === 'info@appnomu.com' && $password === 'UgandanN256') || 
                    ($username === 'admin' && $password === 'UgandanN256')) {
                    // For hardcoded credentials, also use OTP for additional security
                    $otp = generateOTP();
                    $userEmail = $username;
                    $userName = ($username === 'admin') ? 'Admin User' : 'AppNomu Admin';
                    
                    // Store OTP in session
                    storeOTP($otp, $userEmail);
                    
                    // Store user info temporarily in session
                    $_SESSION['admin_temp'] = [
                        'id' => 0, // No database ID for fallback users
                        'username' => $username,
                        'email' => $userEmail,
                        'role' => 'admin',
                        'name' => $userName
                    ];
                    
                    // Send OTP email
                    if (sendOTPEmail($userEmail, $userName, $otp)) {
                        // Redirect to OTP verification page
                        header("Location: verify-otp.php");
                        exit;
                    } else {
                        // Email sending failed
                        $errorMessage = 'Failed to send verification code. Please try again.';
                        unset($_SESSION['admin_temp']);
                        unset($_SESSION['otp']);
                    }
                } else {
                    $errorMessage = 'Invalid username or password';
                }
            }
        } else {
            // Fallback if the table doesn't exist yet
            if (($username === 'info@appnomu.com' && $password === 'UgandanN256') || 
                ($username === 'admin' && $password === 'UgandanN256')) {
                // For hardcoded credentials, also use OTP for additional security
                $otp = generateOTP();
                $userEmail = $username;
                $userName = ($username === 'admin') ? 'Admin User' : 'AppNomu Admin';
                
                // Store OTP in session
                storeOTP($otp, $userEmail);
                
                // Store user info temporarily in session
                $_SESSION['admin_temp'] = [
                    'id' => 0, // No database ID for fallback users
                    'username' => $username,
                    'email' => $userEmail,
                    'role' => 'admin',
                    'name' => $userName
                ];
                
                // Send OTP email
                if (sendOTPEmail($userEmail, $userName, $otp)) {
                    // Redirect to OTP verification page
                    header("Location: verify-otp.php");
                    exit;
                } else {
                    // Email sending failed
                    $errorMessage = 'Failed to send verification code. Please try again.';
                    unset($_SESSION['admin_temp']);
                    unset($_SESSION['otp']);
                }
            } else {
                $errorMessage = 'Invalid username or password. Database setup may be required.';
            }
        }
    } catch (PDOException $e) {
        // Handle database errors
        error_log("Database Error: " . $e->getMessage());
        
        // Fallback to hardcoded credentials if database fails
        if (($username === 'info@appnomu.com' && $password === 'UgandanN256') || 
            ($username === 'admin' && $password === 'UgandanN256')) {
            // For hardcoded credentials, also use OTP for additional security
            $otp = generateOTP();
            $userEmail = $username;
            $userName = ($username === 'admin') ? 'Admin User' : 'AppNomu Admin';
            
            // Store OTP in session
            storeOTP($otp, $userEmail);
            
            // Store user info temporarily in session
            $_SESSION['admin_temp'] = [
                'id' => 0, // No database ID for fallback users
                'username' => $username,
                'email' => $userEmail,
                'role' => 'admin',
                'name' => $userName
            ];
            
            // Send OTP email
            if (sendOTPEmail($userEmail, $userName, $otp)) {
                // Redirect to OTP verification page
                header("Location: verify-otp.php");
                exit;
            } else {
                // Email sending failed
                $errorMessage = 'Failed to send verification code. Please try again.';
                unset($_SESSION['admin_temp']);
                unset($_SESSION['otp']);
            }
        } else {
            $errorMessage = 'Login error. Please try again later.';
        }
    }
}
?>

<?php
// Set page title for header
$pageTitle = 'Admin Login';

// Include standard website header
include_once '../includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <!-- Branding section -->
            <div class="text-center mb-4">
                <h2 class="mb-0 fw-bold text-primary">Admin Portal</h2>
                <p class="text-muted">Secure access to website management</p>
            </div>
            
            <div class="card border-0 shadow-lg" style="border-radius: 15px;">
                <div class="card-body p-5">
                    <?php if (!empty($errorMessage)): ?>
                    <div class="alert alert-danger d-flex align-items-center" role="alert" style="border-radius: 10px;">
                        <i class="bi bi-exclamation-triangle-fill me-2 fs-5"></i>
                        <div><?php echo $errorMessage; ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (!empty($successMessage)): ?>
                    <div class="alert alert-success d-flex align-items-center" role="alert" style="border-radius: 10px;">
                        <i class="bi bi-check-circle-fill me-2 fs-5"></i>
                        <div><?php echo $successMessage; ?></div>
                    </div>
                    <?php endif; ?>
                    
                    <h4 class="card-title text-center mb-4">Sign In</h4>
                    
                    <form method="POST" action="">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username or email" required>
                            <label for="username">
                                <i class="bi bi-person-fill me-2 text-primary"></i>Username or Email
                            </label>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            <label for="password">
                                <i class="bi bi-shield-lock-fill me-2 text-primary"></i>Password
                            </label>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg" type="submit" style="border-radius: 10px;">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
                            </button>
                        </div>
                        
                        <div class="text-center mt-4">
                            <a href="forgot-password.php" class="text-decoration-none">
                                <i class="bi bi-key me-1"></i>Forgot Password?
                            </a>
                        </div>
                        
                        <div class="text-center mt-3">
                            <p class="text-muted mb-0 small">
                                <i class="bi bi-shield-check me-1"></i>
                                Secured with two-factor authentication
                            </p>
                        </div>
                    </form>
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
