<?php
// Contact form processing script

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $name = filter_var($_POST['name'] ?? '', FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'] ?? '', FILTER_SANITIZE_STRING);
    $subject = filter_var($_POST['subject'] ?? '', FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'] ?? '', FILTER_SANITIZE_STRING);
    
    // Validate inputs
    $errors = [];
    
    if (empty($name)) {
        $errors[] = "Name is required";
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }
    
    if (empty($subject)) {
        $errors[] = "Subject is required";
    }
    
    if (empty($message)) {
        $errors[] = "Message is required";
    }
    
    // If no errors, proceed with sending email
    if (empty($errors)) {
        // Set recipient email (change this to your actual email)
        $to = "info@appnomu.com";
        
        // Set email headers
        $headers = "From: $name <$email>" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        $headers .= "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
        
        // Email content
        $email_content = "
        <html>
        <head>
            <title>New Contact Form Submission</title>
        </head>
        <body>
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong></p>
            <p>$message</p>
        </body>
        </html>
        ";
        
        // For development/testing purposes, you can log the submission instead of sending email
        $log_file = "../logs/contact_submissions.log";
        $log_dir = dirname($log_file);
        
        // Create logs directory if it doesn't exist
        if (!file_exists($log_dir)) {
            mkdir($log_dir, 0755, true);
        }
        
        // Log the submission
        $log_entry = date('Y-m-d H:i:s') . " - New submission from: $name ($email)\n";
        file_put_contents($log_file, $log_entry, FILE_APPEND);
        
        // Attempt to send email (commented out for now)
        // $mail_sent = mail($to, $subject, $email_content, $headers);
        
        // For demo purposes, we'll assume the email was sent successfully
        $mail_sent = true;
        
        // Redirect based on result
        if ($mail_sent) {
            // Store success message in session
            session_start();
            $_SESSION['contact_success'] = "Thank you for your message! We'll get back to you soon.";
            header("Location: ../index.php#contact");
            exit;
        } else {
            // Store error message in session
            session_start();
            $_SESSION['contact_error'] = "Sorry, there was an error sending your message. Please try again later.";
            header("Location: ../index.php#contact");
            exit;
        }
    } else {
        // Store errors in session
        session_start();
        $_SESSION['contact_errors'] = $errors;
        $_SESSION['contact_form_data'] = [
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message
        ];
        header("Location: ../index.php#contact");
        exit;
    }
} else {
    // If someone tries to access this file directly, redirect to home page
    header("Location: ../index.php");
    exit;
}
?>
