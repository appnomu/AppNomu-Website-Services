<?php
// Include header
include_once 'includes/header.php';
?>

<!-- Enhanced 404 Error Page -->
<section class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 80vh;">
    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 70vh;">
            <div class="col-lg-10">
                <div class="row align-items-center">
                    <!-- Error Visual -->
                    <div class="col-lg-6 text-center mb-5 mb-lg-0">
                        <div class="error-visual">
                            <div class="display-1 fw-bold text-primary mb-3" style="font-size: 8rem; line-height: 1;">
                                4<span class="text-danger">0</span>4
                            </div>
                            <div class="position-relative">
                                <div class="bg-primary bg-opacity-10 rounded-circle mx-auto mb-4" style="width: 200px; height: 200px; display: flex; align-items: center; justify-content: center;">
                                    <i class="bi bi-exclamation-triangle-fill text-primary" style="font-size: 4rem;"></i>
                                </div>
                                <!-- Floating elements for visual appeal -->
                                <div class="position-absolute top-0 start-0">
                                    <i class="bi bi-question-circle text-warning" style="font-size: 1.5rem; animation: float 3s ease-in-out infinite;"></i>
                                </div>
                                <div class="position-absolute top-50 end-0">
                                    <i class="bi bi-search text-info" style="font-size: 1.2rem; animation: float 3s ease-in-out infinite 1s;"></i>
                                </div>
                                <div class="position-absolute bottom-0 start-50">
                                    <i class="bi bi-compass text-success" style="font-size: 1rem; animation: float 3s ease-in-out infinite 2s;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Error Content -->
                    <div class="col-lg-6">
                        <div class="error-content">
                            <h1 class="display-4 fw-bold text-dark mb-3">Oops! Page Not Found</h1>
                            <p class="lead text-muted mb-4">
                                We can't seem to find the page you're looking for. It might have been moved, deleted, or you entered the wrong URL.
                            </p>
                            
                            <!-- Quick Navigation -->
                            <div class="bg-white rounded-4 p-4 shadow-sm mb-4">
                                <h5 class="fw-bold text-dark mb-3">
                                    <i class="bi bi-compass me-2 text-primary"></i>Where would you like to go?
                                </h5>
                                <div class="row g-2">
                                    <div class="col-6">
                                        <a href="index" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center py-2">
                                            <i class="bi bi-house-door me-2"></i>
                                            <span>Home</span>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="services" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center py-2">
                                            <i class="bi bi-gear me-2"></i>
                                            <span>Services</span>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="about" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center py-2">
                                            <i class="bi bi-info-circle me-2"></i>
                                            <span>About Us</span>
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="contact" class="btn btn-outline-primary w-100 d-flex align-items-center justify-content-center py-2">
                                            <i class="bi bi-chat-dots me-2"></i>
                                            <span>Contact</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Primary Actions -->
                            <div class="d-flex flex-wrap gap-3">
                                <a href="index.php" class="btn btn-primary btn-lg px-4 py-3">
                                    <i class="bi bi-arrow-left me-2"></i>Back to Home
                                </a>
                                <a href="request-quote.php" class="btn btn-success btn-lg px-4 py-3">
                                    <i class="bi bi-rocket-takeoff me-2"></i>Get Started
                                </a>
                            </div>
                            
                            <!-- Help Section -->
                            <div class="mt-4 p-3 bg-light rounded-3">
                                <small class="text-muted">
                                    <i class="bi bi-lightbulb me-1"></i>
                                    <strong>Need help?</strong> Contact our support team at 
                                    <a href="tel:+256200948420" class="text-decoration-none">+256 200 948 420</a> or 
                                    <a href="mailto:info@appnomu.com" class="text-decoration-none">info@appnomu.com</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Add floating animation CSS -->
<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}
</style>

<?php
// Include footer
include_once 'includes/footer.php';
?>
