<?php
// Start session for potential flash messages
session_start();

// Load configuration
require_once 'config/config.php';

// Get email configuration and set PHP mail settings
$emailConfig = Config::getEmail();
ini_set('SMTP', $emailConfig['host']);
ini_set('smtp_port', $emailConfig['port']);
ini_set('sendmail_from', $emailConfig['from']);
define('SMTP_PASSWORD', $emailConfig['password']);

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Function to sanitize input data
    function sanitizeInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        return $data;
    }
    
    // Collect form data
    $fullName = sanitizeInput($_POST['fullName'] ?? '');
    $email = sanitizeInput($_POST['email'] ?? '');
    $phoneNumber = sanitizeInput($_POST['phoneNumber'] ?? '');
    $country = sanitizeInput($_POST['country'] ?? '');
    
    // Handle services (checkbox array)
    $services = [];
    if (isset($_POST['services']) && is_array($_POST['services'])) {
        foreach ($_POST['services'] as $service) {
            $services[] = sanitizeInput($service);
        }
    }
    
    // Handle other service if checked
    if (in_array('Other', $services) && isset($_POST['otherServiceText'])) {
        $otherService = sanitizeInput($_POST['otherServiceText']);
        // Replace 'Other' with the specific service
        $key = array_search('Other', $services);
        if ($key !== false) {
            $services[$key] = "Other: $otherService";
        }
    }
    
    // Convert services array to string for storage
    $servicesString = implode(', ', $services);
    
    // Handle budget
    $budget = sanitizeInput($_POST['budget'] ?? '');
    if ($budget === 'Other' && isset($_POST['customBudget'])) {
        $budget = "Custom: " . sanitizeInput($_POST['customBudget']);
    }
    
    $timeline = sanitizeInput($_POST['timeline'] ?? '');
    $currentProblem = sanitizeInput($_POST['currentProblem'] ?? '');
    $businessInfo = sanitizeInput($_POST['businessInfo'] ?? '');
    
    // Generate a unique ID for this quote request
    $quoteId = uniqid('QUOTE_');
    
    // Date submitted
    $dateSubmitted = date('Y-m-d H:i:s');
    
    // File handling
    $uploadedFiles = [];
    if (isset($_FILES['attachments']) && is_array($_FILES['attachments']['name'])) {
        $uploadDir = 'uploads/quotes/';
        
        // Create directory if it doesn't exist
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        // Process each uploaded file
        for ($i = 0; $i < count($_FILES['attachments']['name']); $i++) {
            if ($_FILES['attachments']['error'][$i] === 0) {
                $fileName = $_FILES['attachments']['name'][$i];
                $fileSize = $_FILES['attachments']['size'][$i];
                $fileTmp = $_FILES['attachments']['tmp_name'][$i];
                $fileType = $_FILES['attachments']['type'][$i];
                
                // Validate file size (max 5MB)
                if ($fileSize > 5 * 1024 * 1024) {
                    continue; // Skip files larger than 5MB
                }
                
                // Generate unique filename to prevent overwriting
                $newFileName = $quoteId . '_' . uniqid() . '_' . $fileName;
                $destination = $uploadDir . $newFileName;
                
                // Move the uploaded file
                if (move_uploaded_file($fileTmp, $destination)) {
                    $uploadedFiles[] = $destination;
                }
            }
        }
    }
    
    // Convert uploaded files array to string for storage
    $filesString = implode(', ', $uploadedFiles);
    
    // Initialize database connection
    try {
        $pdo = Config::getDatabaseConnection();
        
        // Prepare SQL statement
        $stmt = $pdo->prepare("
            INSERT INTO quote_requests (
                quote_id, full_name, email, phone_number, country, 
                services, budget, timeline, current_problem, business_info, 
                uploaded_files, date_submitted, status
            ) 
            VALUES (
                :quote_id, :full_name, :email, :phone_number, :country,
                :services, :budget, :timeline, :current_problem, :business_info,
                :uploaded_files, :date_submitted, 'New'
            )
        ");
        
        // Bind parameters
        $stmt->bindParam(':quote_id', $quoteId);
        $stmt->bindParam(':full_name', $fullName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone_number', $phoneNumber);
        $stmt->bindParam(':country', $country);
        $stmt->bindParam(':services', $servicesString);
        $stmt->bindParam(':budget', $budget);
        $stmt->bindParam(':timeline', $timeline);
        $stmt->bindParam(':current_problem', $currentProblem);
        $stmt->bindParam(':business_info', $businessInfo);
        $stmt->bindParam(':uploaded_files', $filesString);
        $stmt->bindParam(':date_submitted', $dateSubmitted);
        
        // Execute the statement
        $stmt->execute();
        
        // Also send an email notification
        $to = "info@appnomu.com"; // Your business email
        $subject = "New Quote Request: $quoteId";
        
        $message = "
        <html>
        <head>
            <title>New Quote Request</title>
        </head>
        <body>
            <h2>New Quote Request Received</h2>
            <p><strong>Request ID:</strong> $quoteId</p>
            <p><strong>Date:</strong> $dateSubmitted</p>
            <h3>Client Information</h3>
            <p><strong>Name:</strong> $fullName</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phoneNumber</p>
            <p><strong>Country:</strong> $country</p>
            
            <h3>Project Details</h3>
            <p><strong>Services:</strong> $servicesString</p>
            <p><strong>Budget:</strong> $budget</p>
            <p><strong>Timeline:</strong> $timeline</p>
            <p><strong>Problem Description:</strong> $currentProblem</p>
            <p><strong>Business Info:</strong> $businessInfo</p>
            
            <p>Please log in to the admin panel to view full details and any uploaded files.</p>
            
            <p style='font-size:small;color:#666;'>This is an automated message from your website.</p>
        </body>
        </html>
        ";
        
        // Use HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: AppNomu Quote System <noreply@appnomu.com>" . "\r\n";
        
        // Send the email
        mail($to, $subject, $message, $headers);
        
        // Send a professional confirmation email to the client
        $clientSubject = "Your Quote Request Confirmation - AppNomu";
        $clientMessage = "
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='utf-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Quote Request Confirmation</title>
        </head>
        <body style='font-family:Segoe UI,Helvetica,Arial,sans-serif;line-height:1.6;color:#333;background-color:#f7f7f7;margin:0;padding:0;'>
            <div style='max-width:600px;margin:0 auto;background-color:#ffffff;box-shadow:0 3px 10px rgba(0,0,0,0.1);'>
                <!-- Header (smaller, no logo) -->
                <div style='background-color:#0d6efd;color:white;padding:15px;text-align:center;'>
                    <h1 style='margin:0;font-size:20px;'>Quote Request Confirmation</h1>
                </div>
                
                <!-- Main Content -->
                <div style='padding:30px 20px;'>
                    <p style='margin-top:0;'>Dear <strong>$fullName</strong>,</p>
                    
                    <p>Thank you for submitting your quote request to AppNomu. We're excited about the opportunity to work with you on your project.</p>
                    
                    <div style='background-color:#f8f9fa;border-left:4px solid #0d6efd;padding:15px;margin:20px 0;'>
                        <p style='margin:0;'><strong>Your request has been received and is being reviewed by our team.</strong></p>
                    </div>
                    
                    <h2 style='color:#0d6efd;font-size:18px;border-bottom:1px solid #eee;padding-bottom:10px;margin-top:20px;'>Quote Request Summary</h2>
                    
                    <table style='width:100%;border-collapse:collapse;margin:15px 0;'>
                        <tr>
                            <td style='padding:8px;border-bottom:1px solid #eee;width:40%;'><strong>Reference Number:</strong></td>
                            <td style='padding:8px;border-bottom:1px solid #eee;'><span style='color:#0d6efd;'>$quoteId</span></td>
                        </tr>
                        <tr>
                            <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Date Submitted:</strong></td>
                            <td style='padding:8px;border-bottom:1px solid #eee;'>$dateSubmitted</td>
                        </tr>
                        <tr>
                            <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Budget Range:</strong></td>
                            <td style='padding:8px;border-bottom:1px solid #eee;'>$budget</td>
                        </tr>
                    </table>
                    
                    <h3 style='color:#0d6efd;font-size:16px;margin-top:15px;'>Problem to Solve:</h3>
                    <div style='background-color:#f8f9fa;padding:15px;border-radius:4px;'>
                        <p style='margin:0;'>$currentProblem</p>
                    </div>
                    
                    <div style='background-color:#e9f7fe;border-radius:4px;padding:15px;margin:25px 0;'>
                        <h3 style='color:#0077cc;margin-top:0;font-size:16px;'>What happens next?</h3>
                        <ul style='margin-bottom:0;padding-left:20px;'>
                            <li>Our team will review your requirements</li>
                            <li>We'll prepare a customized quote based on your needs</li>
                            <li>You'll receive a detailed proposal within 24-48 business hours</li>
                        </ul>
                    </div>
                    
                    <p>If you have any questions or need to provide additional information, please don't hesitate to contact us at <a href='mailto:info@appnomu.com' style='color:#0d6efd;text-decoration:none;'>info@appnomu.com</a> or call us at:</p>
                    
                    <ul style='list-style-type:none;padding-left:5px;margin:15px 0;'>
                        <li>🇺🇬 Uganda: <strong>+256 200 948420</strong></li>
                        <li>🇺🇸 USA: <strong>+1 888 652 2233</strong></li>
                    </ul>
                    
                    <p>We look forward to the opportunity of working with you.</p>
                    
                    <p>Best regards,<br>
                    <strong>The AppNomu Team</strong></p>
                </div>
                
                <!-- Footer -->
                <div style='background-color:#f8f9fa;padding:20px;text-align:center;border-top:1px solid #eee;'>
                    <p style='margin:0;color:#666;font-size:14px;'>© 2025 AppNomu Business Services. All rights reserved.</p>
                    <div style='margin-top:10px;'>
                        <a href='https://services.appnomu.com/' style='color:#0d6efd;text-decoration:none;font-size:13px;'>Home</a> | 
                        <a href='https://services.appnomu.com/services.php' style='color:#0d6efd;text-decoration:none;font-size:13px;'>Services</a> | 
                        <a href='https://services.appnomu.com/contact.php' style='color:#0d6efd;text-decoration:none;font-size:13px;'>Contact</a>
                    </div>
                </div>
            </div>
        </body>
        </html>
        ";
        
        $clientHeaders = "MIME-Version: 1.0" . "\r\n";
        $clientHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $clientHeaders .= "From: AppNomu <web@appnomu.com>" . "\r\n";
        
        // Send confirmation to client using the configured SMTP server
        mail($email, $clientSubject, $clientMessage, $clientHeaders);
        
        // Redirect with success message
        header("Location: request-quote.php?success=1");
        exit;
        
    } catch (PDOException $e) {
        // Log error (in a real environment)
        error_log("Database Error: " . $e->getMessage());
        
        // Redirect with error message
        header("Location: request-quote.php?error=1");
        exit;
    }
} else {
    // If accessed directly without form submission, redirect to the form
    header("Location: request-quote.php");
    exit;
}
?>
