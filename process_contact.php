<?php
/**
 * Process Contact Form Submission
 * 
 * This script handles the contact form submission, validates the input,
 * sends an email notification, and returns a JSON response.
 */

// Include required files
require_once 'includes/session_helper.php';

// Set content type to JSON
header('Content-Type: application/json');

// Initialize response array
$response = [
    'success' => false,
    'message' => 'An error occurred. Please try again later.',
    'errors' => [],
    'redirect' => ''
];

// Check if form was submitted via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $response['message'] = 'Invalid request method. Please submit the form.';
    http_response_code(405); // Method Not Allowed
    echo json_encode($response);
    exit;
}

// Verify CSRF token
if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'] ?? '', $_POST['csrf_token'])) {
    $response['message'] = 'Security token mismatch. Please refresh the page and try again.';
    $response['errors']['csrf_token'] = 'Security token has expired. Please refresh the page.';
    http_response_code(403); // Forbidden
    echo json_encode($response);
    exit;
}

// Rate limiting - simple implementation
$rateLimitKey = 'contact_form_' . md5($_SERVER['REMOTE_ADDR']);
$submissionCount = $_SESSION[$rateLimitKey] ?? 0;
$maxSubmissions = 5; // Maximum submissions per hour
$timeWindow = 3600; // 1 hour in seconds

if ($submissionCount >= $maxSubmissions) {
    $response['message'] = 'Too many submission attempts. Please try again later.';
    http_response_code(429); // Too Many Requests
    echo json_encode($response);
    exit;
}

// Increment submission count
$_SESSION[$rateLimitKey] = $submissionCount + 1;

// Set rate limit expiration
if (!isset($_SESSION['rate_limit_expires'])) {
    $_SESSION['rate_limit_expires'] = time() + $timeWindow;
}
    // Honeypot check
    if (!empty($_POST['website'])) {
        // This is likely a bot submission
        $response['message'] = 'Form submission successful. Thank you!';
        echo json_encode($response);
        exit;
    }

// Honeypot check - if this field is filled out, it's likely a bot
if (!empty($_POST['website'])) {
    // Log potential bot submission
    error_log('Potential bot submission detected - honeypot field was filled.');
    
    // Return success to the bot but don't process the submission
    $response['message'] = 'Thank you for your message!';
    $response['success'] = true;
    echo json_encode($response);
    exit;
}

// Get and sanitize form data
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$privacyPolicy = isset($_POST['privacyPolicy']) && $_POST['privacyPolicy'] === 'on';

// Trim all string values
$name = trim($name ?? '');
$email = trim($email ?? '');
$phone = trim($phone ?? '');
$subject = trim($subject ?? '');
$message = trim($message ?? '');

// Validate form data
$errors = [];

// Validate name (2-100 characters, letters, spaces, hyphens, and apostrophes only)
if (empty($name)) {
    $errors['name'] = 'Please enter your name';
} elseif (!preg_match('/^[\p{L}\s\'\-]{2,100}$/u', $name)) {
    $errors['name'] = 'Name must be 2-100 characters and contain only letters, spaces, hyphens, and apostrophes';
}

// Validate email
if (empty($email)) {
    $errors['email'] = 'Please enter your email address';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address';
} elseif (strlen($email) > 254) {
    $errors['email'] = 'Email address is too long';
}

// Validate phone (optional, but if provided, must be valid)
if (!empty($phone) && !preg_match('/^[0-9+\-()\s.]{7,40}$/', $phone)) {
    $errors['phone'] = 'Please enter a valid phone number (7-40 characters, may include +, -, (), ., or spaces)';
}

// Validate subject (5-200 characters)
if (empty($subject)) {
    $errors['subject'] = 'Please enter a subject';
} elseif (strlen($subject) < 5 || strlen($subject) > 200) {
    $errors['subject'] = 'Subject must be between 5 and 200 characters';
}

// Validate message (10-2000 characters)
if (empty($message)) {
    $errors['message'] = 'Please enter your message';
} elseif (strlen($message) < 10 || strlen($message) > 2000) {
    $errors['message'] = 'Message must be between 10 and 2000 characters';
} elseif (preg_match('/https?:\/\//i', $message)) {
    // Basic check for URLs to prevent spam
    $errors['message'] = 'Please do not include URLs in your message';
}

// Validate privacy policy
if (!$privacyPolicy) {
    $errors['privacyPolicy'] = 'You must agree to the privacy policy and terms of service';
}

// If there are validation errors, return them
if (!empty($errors)) {
    $response['message'] = 'Please correct the errors below';
    $response['errors'] = $errors;
    http_response_code(422); // Unprocessable Entity
    echo json_encode($response);
    exit;
}

// If we get here, validation passed
// Prepare email content
$to = 'support@appnomu.com'; // Send to support email
$email_subject = "[AppNomu Contact] " . mb_substr($subject, 0, 50) . (mb_strlen($subject) > 50 ? '...' : '');

$email_body = "NEW CONTACT FORM SUBMISSION - AppNomu Website\n" .
             "=" . str_repeat("=", 50) . "\n\n" .
             "CONTACT DETAILS:\n" .
             "Name: " . htmlspecialchars($name) . "\n" .
             "Email: " . htmlspecialchars($email) . "\n" .
             "Phone: " . (!empty($phone) ? htmlspecialchars($phone) : 'Not provided') . "\n" .
             "Subject: " . htmlspecialchars($subject) . "\n\n" .
             "MESSAGE:\n" .
             "-" . str_repeat("-", 20) . "\n" .
             htmlspecialchars($message) . "\n" .
             "-" . str_repeat("-", 20) . "\n\n" .
             "SUBMISSION INFO:\n" .
             "Website: " . $_SERVER['HTTP_HOST'] . "\n" .
             "Date/Time: " . date('Y-m-d H:i:s T') . "\n" .
             "IP Address: " . $_SERVER['REMOTE_ADDR'] . "\n" .
             "User Agent: " . ($_SERVER['HTTP_USER_AGENT'] ?? 'Not provided') . "\n\n" .
             "Please respond to this inquiry as soon as possible.\n" .
             "Reply directly to: " . htmlspecialchars($email);

// Additional headers for better email delivery
$headers = [
    'From: AppNomu Contact Form <noreply@appnomu.com>',
    'Reply-To: ' . $name . ' <' . $email . '>',
    'Return-Path: noreply@appnomu.com',
    'X-Mailer: PHP/' . phpversion(),
    'MIME-Version: 1.0',
    'Content-Type: text/plain; charset=UTF-8',
    'Content-Transfer-Encoding: 8bit',
    'X-Originating-IP: ' . $_SERVER['REMOTE_ADDR'],
    'X-Priority: 3',
    'Message-ID: <' . time() . '.' . md5($email . time()) . '@appnomu.com>'
];

// Send email using PHP's mail() function
$mail_sent = mail(
    $to,
    '=?UTF-8?B?' . base64_encode($email_subject) . '?=', // Encode subject for UTF-8
    $email_body,
    implode("\r\n", $headers)
);

// Additional logging for debugging
if (!$mail_sent) {
    $error_details = error_get_last();
    error_log('Mail function failed. Last error: ' . ($error_details['message'] ?? 'Unknown error'));
    error_log('Attempted to send email to: ' . $to . ' from: ' . $email);
}

if ($mail_sent) {
    // Log successful submission
    error_log('Contact form submitted successfully: ' . $email);

    // Clear rate limiting if form was submitted successfully
    unset($_SESSION[$rateLimitKey]);

    $response['success'] = true;
    $response['message'] = 'Thank you for your message! We\'ll get back to you as soon as possible.';
    $response['redirect'] = 'thank-you.php';

    // Store success message in session for the thank you page
    set_flash_message('contact_success', 'Thank you for contacting us! We will get back to you soon.', 'success');
} else {
    // Log the error
    error_log('Failed to send contact form email from: ' . $email);

    $response['message'] = 'Sorry, there was a problem sending your message. Please try again later or contact us directly at support@appnomu.com.';
    http_response_code(500); // Internal Server Error
}

// Ensure no output before this point
if (ob_get_level() > 0) {
    ob_end_clean();
}

// Output the JSON response
echo json_encode($response, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
?>
