<?php
// Include session helper first to avoid headers already sent warning
include_once 'includes/session_helper.php';

// Check if user came from the contact form or has a success flash message
$referer = $_SERVER['HTTP_REFERER'] ?? '';
$hasSuccessMessage = has_flash_message('contact_success');

// Allow access if coming from contact form or has success message
if (strpos($referer, 'contact.php') === false && !$hasSuccessMessage) {
    // If not from contact form and no success message, redirect to contact page
    header('Location: contact.php');
    exit;
}

// Include header after session check
include_once 'includes/header.php';

// Clear any existing form data
if (isset($_SESSION['contact_form_data'])) {
    unset($_SESSION['contact_form_data']);
}
?>

<!-- Thank You Section -->
<section class="py-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <div class="icon-box icon-box-lg mx-auto mb-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                </div>
                <h1 class="display-4 fw-bold mb-4">Thank You!</h1>
                <p class="lead mb-4">Your message has been sent successfully. We'll get back to you as soon as possible.</p>
                <p class="text-muted mb-5">We typically respond within 1 hour. If you need immediate assistance, please call us at <a href="tel:+256200948420" class="text-primary">+256 200 948420</a>.</p>
                <div class="d-flex justify-content-center gap-3">
                    <a href="index.php" class="btn btn-primary btn-lg px-4">
                        <i class="bi bi-house-door me-2"></i> Return Home
                    </a>
                    <a href="contact.php" class="btn btn-outline-primary btn-lg px-4">
                        <i class="bi bi-envelope me-2"></i> Send Another Message
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include_once 'includes/footer.php';
?>
