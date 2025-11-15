<?php
// Set error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Load configuration
require_once 'config/config.php';

// Initialize response array
$response = [
    'success' => false,
    'message' => '',
    'errors' => []
];

// Process only if it's a POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Validate required fields
    $requiredFields = ['position', 'firstName', 'lastName', 'email'];
    $errors = [];
    
    foreach ($requiredFields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = ucfirst($field) . ' is required.';
        }
    }
    
    // Validate email
    if (!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Please enter a valid email address.';
    }
    
    // Resume file validation
    $resumeFile = null;
    $resumePath = '';
    
    if (!empty($_FILES['resume']['name'])) {
        $allowedExtensions = ['pdf', 'doc', 'docx'];
        $maxFileSize = 2 * 1024 * 1024; // 2MB
        
        $fileName = $_FILES['resume']['name'];
        $fileSize = $_FILES['resume']['size'];
        $fileTmp = $_FILES['resume']['tmp_name'];
        $fileType = $_FILES['resume']['type'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        // Check extension
        if (!in_array($fileExt, $allowedExtensions)) {
            $errors[] = 'Resume must be a PDF or Word document (doc/docx).';
        }
        
        // Check size
        if ($fileSize > $maxFileSize) {
            $errors[] = 'Resume file size must be less than 2MB.';
        }
        
        // If resume is valid, prepare to upload it
        if (empty($errors)) {
            // Create unique file name
            $newFileName = 'resume_' . date('YmdHis') . '_' . $fileExt;
            $uploadDir = 'uploads/resumes/';
            
            // Create directory if it doesn't exist
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $resumePath = $uploadDir . $newFileName;
            $resumeFile = [
                'name' => $fileName,
                'path' => $resumePath,
                'type' => $fileType
            ];
        }
    } else {
        $errors[] = 'Resume is required.';
    }
    
    // If there are no errors, process the application
    if (empty($errors)) {
        try {
            // Sanitize inputs
            $position = filter_var($_POST['position'], FILTER_SANITIZE_STRING);
            $firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
            $lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $phone = isset($_POST['phone']) ? filter_var($_POST['phone'], FILTER_SANITIZE_STRING) : '';
            $coverLetter = isset($_POST['coverLetter']) ? filter_var($_POST['coverLetter'], FILTER_SANITIZE_STRING) : '';
            $portfolio = isset($_POST['portfolio']) ? filter_var($_POST['portfolio'], FILTER_SANITIZE_URL) : '';
            
            // Move the uploaded file
            if ($resumeFile && move_uploaded_file($fileTmp, $resumePath)) {
                // Connect to database
                $pdo = Config::getDatabaseConnection();
                
                // Create applications table if it doesn't exist
                $pdo->exec("
                    CREATE TABLE IF NOT EXISTS applications (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        position VARCHAR(100) NOT NULL,
                        first_name VARCHAR(50) NOT NULL,
                        last_name VARCHAR(50) NOT NULL,
                        email VARCHAR(100) NOT NULL,
                        phone VARCHAR(30),
                        resume_path VARCHAR(255) NOT NULL,
                        resume_name VARCHAR(255) NOT NULL,
                        cover_letter TEXT,
                        portfolio_url VARCHAR(255),
                        application_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                    )
                ");
                
                // Insert application into database
                $stmt = $pdo->prepare("
                    INSERT INTO applications (
                        position, first_name, last_name, email, phone, 
                        resume_path, resume_name, cover_letter, portfolio_url
                    ) VALUES (
                        :position, :firstName, :lastName, :email, :phone, 
                        :resumePath, :resumeName, :coverLetter, :portfolio
                    )
                ");
                
                $stmt->execute([
                    ':position' => $position,
                    ':firstName' => $firstName,
                    ':lastName' => $lastName,
                    ':email' => $email,
                    ':phone' => $phone,
                    ':resumePath' => $resumePath,
                    ':resumeName' => $fileName,
                    ':coverLetter' => $coverLetter,
                    ':portfolio' => $portfolio
                ]);
                
                $applicationId = $pdo->lastInsertId();
                $dateSubmitted = date("F j, Y, g:i a");
                
                // Send confirmation email to applicant
                $to = $email;
                $subject = "Application Received - AppNomu";
                
                $applicantMessage = "
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Application Confirmation</title>
                </head>
                <body style='font-family:Segoe UI,Helvetica,Arial,sans-serif;line-height:1.6;color:#333;background-color:#f7f7f7;margin:0;padding:0;'>
                    <div style='max-width:600px;margin:0 auto;background-color:#ffffff;box-shadow:0 3px 10px rgba(0,0,0,0.1);'>
                        <!-- Header -->
                        <div style='background-color:#0d6efd;color:white;padding:15px;text-align:center;'>
                            <h1 style='margin:0;font-size:20px;'>Application Confirmation</h1>
                        </div>
                        
                        <!-- Main Content -->
                        <div style='padding:20px;'>
                            <div style='background-color:#e9f5ff;border-left:4px solid #0d6efd;padding:15px;margin-bottom:20px;'>
                                <p style='margin:0;'><strong>Thank you for applying to join the AppNomu team!</strong></p>
                            </div>
                            
                            <p>Dear $firstName $lastName,</p>
                            <p>We have received your application for the <strong>$position</strong> position. Our HR team will review your qualifications and get back to you soon.</p>
                            
                            <h2 style='color:#0d6efd;font-size:18px;border-bottom:1px solid #eee;padding-bottom:10px;margin-top:20px;'>Application Summary</h2>
                            
                            <table style='width:100%;border-collapse:collapse;margin:15px 0;'>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;width:40%;'><strong>Reference Number:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><span style='color:#0d6efd;'>APP-$applicationId</span></td>
                                </tr>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Date Submitted:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'>$dateSubmitted</td>
                                </tr>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Position:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'>$position</td>
                                </tr>
                            </table>
                            
                            <p>If you have any questions regarding your application, please don't hesitate to contact our HR department at <a href='mailto:hr@appnomu.com' style='color:#0d6efd;'>hr@appnomu.com</a>.</p>
                            
                            <div style='background-color:#f8f9fa;padding:15px;border-radius:4px;margin-top:20px;'>
                                <p style='margin:0;font-size:14px;'>Please note that due to the high volume of applications, the review process may take up to 2 weeks.</p>
                            </div>
                        </div>
                        
                        <!-- Footer -->
                        <div style='background-color:#f8f9fa;padding:20px;text-align:center;font-size:14px;color:#666;border-top:1px solid #eee;'>
                            <p>&copy; " . date('Y') . " AppNomu. All rights reserved.</p>
                        </div>
                    </div>
                </body>
                </html>
                ";
                
                // Send notification to HR/Admin
                $toAdmin = "hr@appnomu.com";
                $ccAdmin = "info@appnomu.com";
                $subjectAdmin = "New Job Application - $position";
                
                $adminMessage = "
                <!DOCTYPE html>
                <html>
                <head>
                    <meta charset='utf-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>New Job Application</title>
                </head>
                <body style='font-family:Segoe UI,Helvetica,Arial,sans-serif;line-height:1.6;color:#333;background-color:#f7f7f7;margin:0;padding:0;'>
                    <div style='max-width:600px;margin:0 auto;background-color:#ffffff;box-shadow:0 3px 10px rgba(0,0,0,0.1);'>
                        <!-- Header -->
                        <div style='background-color:#0d6efd;color:white;padding:15px;text-align:center;'>
                            <h1 style='margin:0;font-size:20px;'>New Job Application Received</h1>
                        </div>
                        
                        <!-- Main Content -->
                        <div style='padding:20px;'>
                            <div style='background-color:#e9f5ff;border-left:4px solid #0d6efd;padding:15px;margin-bottom:20px;'>
                                <p style='margin:0;'><strong>A new application has been submitted for the $position position.</strong></p>
                            </div>
                            
                            <h2 style='color:#0d6efd;font-size:18px;border-bottom:1px solid #eee;padding-bottom:10px;margin-top:20px;'>Applicant Details</h2>
                            
                            <table style='width:100%;border-collapse:collapse;margin:15px 0;'>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;width:40%;'><strong>Reference Number:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><span style='color:#0d6efd;'>APP-$applicationId</span></td>
                                </tr>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Date Submitted:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'>$dateSubmitted</td>
                                </tr>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Full Name:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'>$firstName $lastName</td>
                                </tr>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Email:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'>$email</td>
                                </tr>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Phone:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'>$phone</td>
                                </tr>
                                <tr>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'><strong>Position:</strong></td>
                                    <td style='padding:8px;border-bottom:1px solid #eee;'>$position</td>
                                </tr>
                            </table>
                            
                            <h3 style='color:#0d6efd;font-size:16px;margin-top:15px;'>Resume:</h3>
                            <p>The resume is attached to this email and also saved at: $resumePath</p>
                            
                            " . (!empty($coverLetter) ? "<h3 style='color:#0d6efd;font-size:16px;margin-top:15px;'>Cover Letter:</h3>
                            <div style='background-color:#f8f9fa;padding:15px;border-radius:4px;'>
                                <p style='margin:0;'>$coverLetter</p>
                            </div>" : "") . "
                            
                            " . (!empty($portfolio) ? "<h3 style='color:#0d6efd;font-size:16px;margin-top:15px;'>Portfolio:</h3>
                            <p><a href='$portfolio' target='_blank'>$portfolio</a></p>" : "") . "
                            
                            <div style='background-color:#f8f9fa;padding:15px;border-radius:4px;margin-top:20px;'>
                                <p style='margin:0;font-size:14px;'>Please review this application and respond to the candidate within 5 business days.</p>
                            </div>
                        </div>
                        
                        <!-- Footer -->
                        <div style='background-color:#f8f9fa;padding:20px;text-align:center;font-size:14px;color:#666;border-top:1px solid #eee;'>
                            <p>This is an automated message from the AppNomu HR System.</p>
                        </div>
                    </div>
                </body>
                </html>
                ";
                
                // Email headers
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: AppNomu Careers <careers@appnomu.com>" . "\r\n";
                
                $adminHeaders = "MIME-Version: 1.0" . "\r\n";
                $adminHeaders .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $adminHeaders .= "From: AppNomu HR System <hr-system@appnomu.com>" . "\r\n";
                if (!empty($ccAdmin)) {
                    $adminHeaders .= "Cc: $ccAdmin" . "\r\n";
                }
                
                // Send the emails
                mail($to, $subject, $applicantMessage, $headers);
                mail($toAdmin, $subjectAdmin, $adminMessage, $adminHeaders);
                
                // Set success response
                $response['success'] = true;
                $response['message'] = 'Your application has been successfully submitted. We will contact you shortly.';
                
                // Store success message in session
                $_SESSION['application_success'] = true;
                $_SESSION['application_message'] = $response['message'];
                
                // Redirect back to careers page
                header('Location: careers.php?application=success');
                exit;
                
            } else {
                $response['success'] = false;
                $response['message'] = 'There was an error uploading your resume. Please try again.';
                $errors[] = 'Resume upload failed.';
            }
        } catch (PDOException $e) {
            $response['success'] = false;
            $response['message'] = 'Database error occurred. Please try again later.';
            $errors[] = $e->getMessage();
        } catch (Exception $e) {
            $response['success'] = false;
            $response['message'] = 'An unexpected error occurred. Please try again later.';
            $errors[] = $e->getMessage();
        }
    } else {
        $response['success'] = false;
        $response['message'] = 'Please correct the errors in your application.';
        $response['errors'] = $errors;
    }
} else {
    // Not a POST request
    $response['success'] = false;
    $response['message'] = 'Invalid request method.';
    header('Location: careers.php');
    exit;
}

// If we reach here, there was an error
$_SESSION['application_errors'] = $errors;
header('Location: careers.php?application=error');
exit;
?>
