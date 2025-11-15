<?php
/**
 * OTP Manager for AppNomu Admin Login
 * Handles generating, storing, and verifying OTPs sent via email
 */

/**
 * Generate a random OTP code
 * 
 * @param int $length Length of the OTP code
 * @return string The generated OTP
 */
function generateOTP($length = 6) {
    // Use only digits for better user experience
    $characters = '0123456789';
    $otp = '';
    
    for ($i = 0; $i < $length; $i++) {
        $otp .= $characters[rand(0, strlen($characters) - 1)];
    }
    
    return $otp;
}

/**
 * Store OTP in the session with expiry time
 * 
 * @param string $otp The OTP to store
 * @param string $email The email associated with the OTP
 * @param int $expiryMinutes Minutes until OTP expires
 */
function storeOTP($otp, $email, $expiryMinutes = 5) {
    $_SESSION['otp'] = [
        'code' => $otp,
        'email' => $email,
        'expiry' => time() + ($expiryMinutes * 60),
        'attempts' => 0
    ];
}

/**
 * Verify if provided OTP matches the stored one and is not expired
 * 
 * @param string $inputOTP The OTP to verify
 * @return array Result with status and message
 */
function verifyOTP($inputOTP) {
    $result = [
        'valid' => false,
        'message' => ''
    ];
    
    // Check if OTP exists in session
    if (!isset($_SESSION['otp']) || !is_array($_SESSION['otp'])) {
        $result['message'] = 'No OTP verification in progress. Please restart the login process.';
        return $result;
    }
    
    // Increment attempt counter
    $_SESSION['otp']['attempts']++;
    
    // Check if too many attempts (max 3)
    if ($_SESSION['otp']['attempts'] > 3) {
        unset($_SESSION['otp']);
        $result['message'] = 'Too many incorrect attempts. Please restart the login process.';
        return $result;
    }
    
    // Check expiry
    if (time() > $_SESSION['otp']['expiry']) {
        unset($_SESSION['otp']);
        $result['message'] = 'OTP has expired. Please request a new one.';
        return $result;
    }
    
    // Check OTP value
    if ($inputOTP === $_SESSION['otp']['code']) {
        $result['valid'] = true;
        $result['message'] = 'OTP verified successfully.';
        $result['email'] = $_SESSION['otp']['email'];
        
        // Clear OTP after successful verification
        unset($_SESSION['otp']);
    } else {
        $remainingAttempts = 3 - $_SESSION['otp']['attempts'];
        $result['message'] = "Invalid OTP. You have $remainingAttempts attempts remaining.";
    }
    
    return $result;
}

/**
 * Send OTP email to admin user
 * 
 * @param string $email Email address to send OTP to
 * @param string $name Name of the recipient
 * @param string $otp The OTP code
 * @return bool Whether the email was sent successfully
 */
function sendOTPEmail($email, $name, $otp) {
    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: AppNomu Security <no-reply@appnomu.com>" . "\r\n";
    
    $subject = "AppNomu Admin Login - Your OTP Code";
    
    // Current timestamp for email
    $timestamp = date('F j, Y, g:i a');
    
    // Get IP address and user agent for security info
    $ipAddress = $_SERVER['REMOTE_ADDR'] ?? 'Unknown';
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Unknown';
    
    // Format OTP for better readability
    $formattedOTP = implode(' ', str_split($otp, 2));
    
    // Email content
    $message = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Your AppNomu Admin Login OTP</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background-color: #f9f9f9; margin: 0; padding: 0; }
            .container { max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 6px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
            .header { background-color: #0d6efd; color: white; padding: 20px; text-align: center; border-top-left-radius: 6px; border-top-right-radius: 6px; }
            .content { padding: 30px; }
            .otp-code { font-size: 32px; font-weight: bold; text-align: center; color: #0d6efd; letter-spacing: 5px; margin: 30px 0; }
            .info-box { background-color: #f8f9fa; border-left: 4px solid #0d6efd; padding: 15px; margin: 20px 0; }
            .footer { background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; color: #6c757d; border-bottom-left-radius: 6px; border-bottom-right-radius: 6px; }
            .warning { color: #dc3545; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>AppNomu Admin Login</h1>
            </div>
            
            <div class='content'>
                <p>Hello $name,</p>
                
                <p>We've received a request to log in to the AppNomu Admin Portal. For your security, please use the following One-Time Password (OTP) to complete your login:</p>
                
                <div class='otp-code'>$formattedOTP</div>
                
                <p>This code will expire in <strong>5 minutes</strong> and can only be used once.</p>
                
                <div class='info-box'>
                    <p><strong>Login Information:</strong></p>
                    <p>Time: $timestamp</p>
                    <p>IP Address: $ipAddress</p>
                    <p>Device: $userAgent</p>
                </div>
                
                <p class='warning'><strong>Important:</strong> If you did not attempt to log in to the AppNomu Admin Portal, please secure your account immediately and contact our support team.</p>
                
                <p>Thank you for helping us keep your account secure.</p>
                
                <p>Best regards,<br>
                AppNomu Security Team</p>
            </div>
            
            <div class='footer'>
                <p>&copy; " . date('Y') . " AppNomu. All rights reserved.</p>
                <p>AppNomu Headquarters: 77 Market Street, Bugiri Municipality, Uganda</p>
                <p>USA Office: 631 Ridgel St, Dover, Delaware, 19904-2772, USA</p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Send email
    $result = mail($email, $subject, $message, $headers);
    error_log("Mail function result: " . ($result ? 'true' : 'false'));
    return $result;
}

/**
 * Check if a valid OTP verification session is in progress
 * 
 * @return bool Whether OTP verification is in progress
 */
function isOTPVerificationInProgress() {
    return isset($_SESSION['otp']) && 
           is_array($_SESSION['otp']) && 
           time() <= $_SESSION['otp']['expiry'];
}

/**
 * Resend OTP to the same email if verification is in progress
 * 
 * @return array Result with status and message
 */
function resendOTP() {
    $result = [
        'success' => false,
        'message' => ''
    ];
    
    // Check if we have both OTP session and admin_temp session
    if (!isset($_SESSION['admin_temp']) || !is_array($_SESSION['admin_temp'])) {
        $result['message'] = 'Session expired. Please restart the login process.';
        return $result;
    }
    
    if (!isset($_SESSION['otp']) || !is_array($_SESSION['otp'])) {
        $result['message'] = 'No OTP session found. Please restart the login process.';
        return $result;
    }
    
    // Create a new OTP
    $email = $_SESSION['admin_temp']['email'];
    $name = $_SESSION['admin_temp']['name'] ?? 'Admin User';
    $otp = generateOTP();
    
    // Store the new OTP (this will reset attempts counter)
    storeOTP($otp, $email);
    
    // Send the new OTP
    if (sendOTPEmail($email, $name, $otp)) {
        $result['success'] = true;
        $result['message'] = "A new verification code has been sent to your email.";
    } else {
        $result['message'] = "Failed to send verification code. Please try again.";
    }
    
    return $result;
}
?>
