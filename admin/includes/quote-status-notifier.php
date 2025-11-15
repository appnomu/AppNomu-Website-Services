<?php
/**
 * Quote Status Notification System
 * Sends email notifications to clients when their quote status changes
 */

/**
 * Send an email notification to a client about a quote status change
 * 
 * @param array $quote The quote data array
 * @param string $oldStatus Previous status
 * @param string $newStatus New status
 * @return bool Whether the email was sent successfully
 */
function sendQuoteStatusNotification($quote, $oldStatus, $newStatus) {
    if (empty($quote['email'])) {
        return false;
    }
    
    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: AppNomu <quotes@appnomu.com>" . "\r\n";
    $headers .= "Reply-To: info@appnomu.com" . "\r\n";
    
    // Client details
    $clientName = $quote['full_name'];
    $clientEmail = $quote['email'];
    $quoteId = $quote['quote_id'];
    $services = $quote['services'];
    $dateSubmitted = date('F j, Y', strtotime($quote['date_submitted']));
    $dateUpdated = date('F j, Y, g:i a');
    
    // Subject line based on status
    $subject = "AppNomu Quote #$quoteId - ";
    
    // Email content and subject based on new status
    switch($newStatus) {
        case 'In Progress':
            $subject .= "We're Working On Your Quote";
            $statusMessage = "
                <p>We wanted to let you know that we've started working on your quote request. Our team is currently reviewing your requirements to prepare a detailed quote for you.</p>
                <p>We'll get back to you soon with pricing information and further details about your project.</p>
            ";
            $statusColor = "#ffbe0b"; // yellow
            $statusText = "In Progress";
            $nextSteps = "
                <p>What's next:</p>
                <ul>
                    <li>Our team is analyzing your requirements</li>
                    <li>We may reach out for additional information if needed</li>
                    <li>We'll prepare a detailed quote based on your needs</li>
                </ul>
            ";
            break;
            
        case 'Quoted':
            $subject .= "Your Quote is Ready";
            $statusMessage = "
                <p>Great news! We've completed the review of your project requirements and prepared a quote for you.</p>
                <p>One of our representatives will be in touch with you shortly to discuss the details of the quote and answer any questions you might have.</p>
            ";
            $statusColor = "#3a86ff"; // blue
            $statusText = "Quoted";
            $nextSteps = "
                <p>What's next:</p>
                <ul>
                    <li>Review the quote details when you receive them</li>
                    <li>Let us know if you have any questions or need clarification</li>
                    <li>Inform us of your decision to proceed or not</li>
                </ul>
            ";
            break;
            
        case 'Accepted':
            $subject .= "Quote Accepted - Next Steps";
            $statusMessage = "
                <p>Thank you for accepting our quote! We're excited to work with you on this project.</p>
                <p>Our team has been notified and will begin the necessary preparations to start work on your project.</p>
            ";
            $statusColor = "#38b000"; // green
            $statusText = "Accepted";
            $nextSteps = "
                <p>What's next:</p>
                <ul>
                    <li>Our project manager will contact you to discuss project timeline</li>
                    <li>We'll set up an initial meeting to gather any additional information</li>
                    <li>Work will begin according to the agreed schedule</li>
                </ul>
            ";
            break;
            
        case 'Completed':
            $subject .= "Project Completed";
            $statusMessage = "
                <p>We're pleased to inform you that your project has been marked as completed in our system.</p>
                <p>Thank you for choosing AppNomu for your digital needs. We hope you're satisfied with the results.</p>
            ";
            $statusColor = "#6c757d"; // gray
            $statusText = "Completed";
            $nextSteps = "
                <p>What's next:</p>
                <ul>
                    <li>Please provide feedback on your experience working with us</li>
                    <li>Contact us if you need any further assistance or have questions</li>
                    <li>Consider AppNomu for your future digital projects</li>
                </ul>
            ";
            break;
            
        case 'Rejected':
            $subject .= "Quote Status Update";
            $statusMessage = "
                <p>Thank you for considering AppNomu for your project needs.</p>
                <p>We noticed that you've decided not to proceed with the quote at this time. We understand that timing and circumstances can change.</p>
            ";
            $statusColor = "#d90429"; // red
            $statusText = "Not Proceeding";
            $nextSteps = "
                <p>What's next:</p>
                <ul>
                    <li>Your information will remain in our system should you wish to revisit the project</li>
                    <li>Feel free to contact us if your requirements change</li>
                    <li>We're always here to help with your future digital needs</li>
                </ul>
            ";
            break;
            
        case 'New':
        default:
            $subject .= "Quote Request Received";
            $statusMessage = "
                <p>Thank you for submitting your quote request. We've received your information and will begin reviewing it shortly.</p>
                <p>We appreciate your interest in AppNomu's services.</p>
            ";
            $statusColor = "#4361ee"; // blue
            $statusText = "Received";
            $nextSteps = "
                <p>What's next:</p>
                <ul>
                    <li>Our team will review your requirements</li>
                    <li>We'll prepare a tailored quote based on your needs</li>
                    <li>Expect to hear from us within 1-2 business days</li>
                </ul>
            ";
            break;
    }
    
    // Build email content
    $message = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>$subject</title>
        <style>
            body { font-family: Arial, sans-serif; line-height: 1.6; color: #444; }
            .container { max-width: 600px; margin: 0 auto; }
            .header { background-color: #0d6efd; color: white; padding: 20px; text-align: center; }
            .content { padding: 20px; background-color: #fff; }
            .footer { background-color: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; color: #6c757d; }
            .status-badge { display: inline-block; padding: 8px 15px; background-color: $statusColor; color: white; border-radius: 4px; font-weight: bold; margin-bottom: 20px; }
            .details-table { width: 100%; border-collapse: collapse; margin: 20px 0; }
            .details-table td { padding: 10px; border-bottom: 1px solid #eee; }
            .details-table tr:last-child td { border-bottom: none; }
            .button { display: inline-block; padding: 10px 20px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 4px; }
        </style>
    </head>
    <body>
        <div class='container'>
            <div class='header'>
                <h1>Quote Status Update</h1>
            </div>
            
            <div class='content'>
                <p>Hello $clientName,</p>
                
                <div class='status-badge'>
                    Status: $statusText
                </div>
                
                $statusMessage
                
                <h3>Quote Details</h3>
                <table class='details-table'>
                    <tr>
                        <td><strong>Quote Reference:</strong></td>
                        <td>#$quoteId</td>
                    </tr>
                    <tr>
                        <td><strong>Services Requested:</strong></td>
                        <td>$services</td>
                    </tr>
                    <tr>
                        <td><strong>Date Submitted:</strong></td>
                        <td>$dateSubmitted</td>
                    </tr>
                    <tr>
                        <td><strong>Last Updated:</strong></td>
                        <td>$dateUpdated</td>
                    </tr>
                </table>
                
                $nextSteps
                
                <p>If you have any questions or need further assistance, please don't hesitate to contact us at <a href='mailto:info@appnomu.com'>info@appnomu.com</a> or call us at +256 200 948420.</p>
                
                <p>Thank you for choosing AppNomu for your digital needs.</p>
                
                <p>Best regards,<br>
                The AppNomu Team</p>
            </div>
            
            <div class='footer'>
                <p>&copy; " . date('Y') . " AppNomu. All rights reserved.</p>
                <p>77 Market Street, Bugiri Municipality, Uganda</p>
                <p>
                    <a href='https://appnomu.com'>Website</a> | 
                    <a href='https://appnomu.com/contact.php'>Contact Us</a> | 
                    <a href='https://appnomu.com/privacy-policy.php'>Privacy Policy</a>
                </p>
            </div>
        </div>
    </body>
    </html>
    ";
    
    // Send email
    $mailSent = mail($clientEmail, $subject, $message, $headers);
    
    // Log notification in the database if needed
    // You could add code here to log the notification in a database table
    
    return $mailSent;
}
?>
