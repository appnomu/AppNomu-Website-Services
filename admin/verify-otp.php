<?php
// Start session for admin authentication
session_start();

// Check if there's an active verification in progress
if (!isset($_SESSION['admin_temp']) || !is_array($_SESSION['admin_temp'])) {
    // Redirect to login page if no verification in progress
    header("Location: login.php");
    exit;
}

// Include OTP manager
require_once 'includes/otp-manager.php';

// Initialize variables
$errorMessage = '';
$successMessage = '';

// No flash messages needed - using direct approach

// Process OTP verification form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['verify_otp'])) {
        $inputOTP = $_POST['otp'] ?? '';
        
        // Verify OTP
        $result = verifyOTP($inputOTP);
        
        if ($result['valid']) {
            // OTP is valid, complete login
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $_SESSION['admin_temp']['username'];
            $_SESSION['admin_id'] = $_SESSION['admin_temp']['id'];
            $_SESSION['admin_role'] = $_SESSION['admin_temp']['role'];
            
            // Clear temporary admin data and OTP
            unset($_SESSION['admin_temp']);
            unset($_SESSION['otp']);
            
            // Update last login time in database if we have user ID
            if (isset($_SESSION['admin_id'])) {
                try {
                    // Load configuration
                    require_once '../config/config.php';
                    
                    // Create database connection
                    $pdo = Config::getDatabaseConnection();
                    
                    $updateStmt = $pdo->prepare("UPDATE admin_users SET last_login = NOW() WHERE id = :id");
                    $updateStmt->bindParam(':id', $_SESSION['admin_id']);
                    $updateStmt->execute();
                } catch (PDOException $e) {
                    // Log error but continue (non-critical)
                    error_log("Database Error updating last login: " . $e->getMessage());
                }
            }
            
            // Redirect to admin dashboard
            header("Location: index.php");
            exit;
        } else {
            $errorMessage = $result['message'];
        }
    } elseif (isset($_POST['cancel'])) {
        // Cancel verification and return to login
        unset($_SESSION['admin_temp']);
        unset($_SESSION['otp']);
        
        header("Location: login.php");
        exit;
    }
}

// Get masked email for display
$email = $_SESSION['admin_temp']['email'] ?? '';
$maskedEmail = '';
if (!empty($email)) {
    $atPosition = strpos($email, '@');
    if ($atPosition !== false) {
        $username = substr($email, 0, $atPosition);
        $domain = substr($email, $atPosition);
        
        $maskedUsername = substr($username, 0, min(3, strlen($username))) . str_repeat('*', max(strlen($username) - 3, 0));
        $maskedEmail = $maskedUsername . $domain;
    } else {
        $maskedEmail = $email; // Fallback if not a valid email
    }
}

// Set page title for header
$pageTitle = 'Verify OTP';

// Include standard website header
include_once '../includes/header.php';
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <!-- Branding section -->
            <div class="text-center mb-4">
                <h2 class="mb-0 fw-bold text-primary">Verification Required</h2>
                <p class="text-muted">Complete the two-factor authentication</p>
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
                    
                    <div class="text-center mb-4">
                        <div class="d-inline-flex align-items-center justify-content-center p-3 rounded-circle bg-primary bg-opacity-10 mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-shield-lock-fill fs-1 text-primary"></i>
                        </div>
                        <h4 class="fw-bold">Security Verification</h4>
                        <p class="text-muted">Enter the 6-digit code sent to:<br><strong><?php echo $maskedEmail; ?></strong></p>
                    </div>
                    
                    <form method="POST" action="">
                        <!-- Hidden field to store the complete OTP -->
                        <input type="hidden" id="otp" name="otp" value="">
                        
                        <!-- Six separate boxes for OTP input -->
                        <div class="mb-4">
                            <label class="form-label text-center w-100">Enter Verification Code</label>
                            <div class="d-flex justify-content-between gap-2 mb-3">
                                <input type="text" class="form-control form-control-lg text-center fw-bold otp-input" 
                                    maxlength="1" pattern="[0-9]" inputmode="numeric" autocomplete="one-time-code"
                                    style="width: 60px; height: 60px; font-size: 24px;" required autofocus>
                                <input type="text" class="form-control form-control-lg text-center fw-bold otp-input" 
                                    maxlength="1" pattern="[0-9]" inputmode="numeric"
                                    style="width: 60px; height: 60px; font-size: 24px;" required>
                                <input type="text" class="form-control form-control-lg text-center fw-bold otp-input" 
                                    maxlength="1" pattern="[0-9]" inputmode="numeric"
                                    style="width: 60px; height: 60px; font-size: 24px;" required>
                                <input type="text" class="form-control form-control-lg text-center fw-bold otp-input" 
                                    maxlength="1" pattern="[0-9]" inputmode="numeric"
                                    style="width: 60px; height: 60px; font-size: 24px;" required>
                                <input type="text" class="form-control form-control-lg text-center fw-bold otp-input" 
                                    maxlength="1" pattern="[0-9]" inputmode="numeric"
                                    style="width: 60px; height: 60px; font-size: 24px;" required>
                                <input type="text" class="form-control form-control-lg text-center fw-bold otp-input" 
                                    maxlength="1" pattern="[0-9]" inputmode="numeric"
                                    style="width: 60px; height: 60px; font-size: 24px;" required>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2 mt-4">
                            <button type="submit" name="verify_otp" id="verify-btn" class="btn btn-primary btn-lg" style="border-radius: 10px;">
                                <i class="bi bi-shield-check me-2"></i> Verify & Continue
                            </button>
                        </form>
                        
                        <!-- Separate form for cancel to avoid conflicts -->
                        <form method="POST" action="" class="mt-2">
                            <button type="submit" name="cancel" class="btn btn-link text-muted w-100">
                                <i class="bi bi-arrow-left me-1"></i> Back to Login
                            </button>
                        </form>
                        </div>
                </div>
                <div class="card-footer text-center py-3" style="background-color: #f8f9fa; border-radius: 0 0 15px 15px;">
                    <div class="d-flex align-items-center justify-content-center">
                        <i class="bi bi-clock text-warning me-2"></i>
                        <p class="mb-0 text-muted">Code expires in <span class="fw-bold">5 minutes</span></p>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-muted small">
                    &copy; <?php echo date('Y'); ?> AppNomu Business Services<br>
                    <span class="opacity-75">Secured Authentication System</span>
                </p>
            </div>
        </div>
    </div>
</div>

<script>
// JavaScript to handle the OTP input boxes
document.addEventListener('DOMContentLoaded', function() {
    const otpInputs = document.querySelectorAll('.otp-input');
    const hiddenInput = document.getElementById('otp');
    const form = document.querySelector('form');
    const verifyButton = document.getElementById('verify-btn');
    
    // Function to update the hidden input with all values
    function updateHiddenInput() {
        let otpValue = '';
        otpInputs.forEach(input => {
            otpValue += input.value;
        });
        hiddenInput.value = otpValue;
    }
    
    // Add event listeners to each input box
    otpInputs.forEach((input, index) => {
        // Auto-focus next input when a digit is entered
        input.addEventListener('input', function(e) {
            const value = e.target.value;
            
            // Only allow digits
            if (/^\d*$/.test(value)) {
                if (value && index < otpInputs.length - 1) {
                    otpInputs[index + 1].focus();
                }
                updateHiddenInput();
            } else {
                e.target.value = '';
            }
        });
        
        // Handle backspace to go to previous input
        input.addEventListener('keydown', function(e) {
            if (e.key === 'Backspace' && !e.target.value && index > 0) {
                otpInputs[index - 1].focus();
            }
        });
        
        // Handle paste event for the entire code
        input.addEventListener('paste', function(e) {
            e.preventDefault();
            const pasteData = e.clipboardData.getData('text');
            if (/^\d+$/.test(pasteData)) {
                // Fill in all inputs with the pasted digits
                for (let i = 0; i < Math.min(pasteData.length, otpInputs.length); i++) {
                    otpInputs[i].value = pasteData[i];
                }
                // Focus the next empty input or the last one
                const nextEmptyIndex = Math.min(pasteData.length, otpInputs.length - 1);
                otpInputs[nextEmptyIndex].focus();
                updateHiddenInput();
            }
        });
    });
    
    // Ensure the form doesn't submit if OTP is incomplete
    form.addEventListener('submit', function(e) {
        if (e.submitter && e.submitter.name === 'verify_otp') {
            updateHiddenInput();
            if (hiddenInput.value.length !== 6) {
                e.preventDefault();
                alert('Please enter all 6 digits of the verification code.');
                return false;
            }
        }
    });
});
</script>

<?php
// Include footer
include_once '../includes/footer.php';
?>
