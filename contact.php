<?php
// Include session helper first to avoid headers already sent warning
include_once 'includes/session_helper.php';
// Include header after session has been initialized
include_once 'includes/header.php';

// Process form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // This will be handled by process_contact.php via AJAX
}
?>

<!-- Contact Hero Section -->
<section class="page-hero">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="badge-label">CONTACT US</span>
                <h1>Get <span style="color: #10b981;">Expert Support</span> from Our Team</h1>
                <p>Connect with our team across Uganda and USA. Get instant chat support, 1-hour email response guarantee, and free consultations.</p>
                <div class="d-flex flex-wrap gap-3 mt-4">
                    <a href="#contactForm" class="btn btn-cta">
                        Send Message <i class="bi bi-arrow-down ms-2"></i>
                    </a>
                    <a href="tel:+256200948420" class="btn" style="background: #f3f4f6; color: #374151; padding: 0.625rem 1.5rem; border-radius: 8px; font-weight: 600;">
                        <i class="bi bi-telephone me-2"></i> +256 200 948 420
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="modern-card text-center">
                            <div class="fw-bold" style="font-size: 2rem; color: #111827;">24/7</div>
                            <div style="color: #6b7280; font-size: 0.875rem;">Customer Support</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="modern-card text-center">
                            <div class="fw-bold" style="font-size: 2rem; color: #111827;">1H</div>
                            <div style="color: #6b7280; font-size: 0.875rem;">Email Response</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="modern-card text-center">
                            <div class="fw-bold" style="font-size: 2rem; color: #111827;">2</div>
                            <div style="color: #6b7280; font-size: 0.875rem;">Office Locations</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="modern-card text-center">
                            <div class="fw-bold" style="font-size: 2rem; color: #10b981;">FREE</div>
                            <div style="color: #6b7280; font-size: 0.875rem;">Consultation</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information -->
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <!-- Uganda Headquarters -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mx-auto mb-4">
                            <i class="bi bi-building fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h4 mb-3">Uganda Headquarters</h3>
                        <p class="mb-1">77 Market Street</p>
                        <p class="mb-1">Bugiri Municipality, Uganda</p>
                        <p class="mb-3">East Africa</p>
                        <p class="mb-1"><i class="bi bi-telephone me-2 text-primary"></i> +256 200 948420</p>
                        <p class="mb-1"><i class="bi bi-envelope me-2 text-primary"></i> info@appnomu.com</p>
                    </div>
                </div>
            </div>
            
            <!-- USA Office -->
            <div class="col-md-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-box mx-auto mb-4">
                            <i class="bi bi-building fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h4 mb-3">USA Office</h3>
                        <p class="mb-1">631 Ridgel St</p>
                        <p class="mb-1">Dover, Delaware 19904-2772</p>
                        <p class="mb-3">United States</p>
                        <p class="mb-1"><i class="bi bi-telephone me-2 text-primary"></i> +1 888 652 2233</p>
                        <p class="mb-1"><i class="bi bi-envelope me-2 text-primary"></i> usa@appnomu.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Support Quality Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Why Choose Our Support?</h2>
            <p class="lead">Experience the difference of personalized African expertise with global standards</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="bg-primary bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                            <i class="bi bi-lightning-charge-fill fs-3 text-primary"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-2">Instant Response</h4>
                        <p class="mb-0 small">Live chat replies in under 2 minutes, emails within 1 hour</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                            <i class="bi bi-globe-africa-europe fs-3 text-success"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-2">African Expertise</h4>
                        <p class="mb-0 small">Local market understanding with international quality standards</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                            <i class="bi bi-shield-check-fill fs-3 text-warning"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-2">100% Satisfaction</h4>
                        <p class="mb-0 small">Guaranteed resolution or your money back</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="card h-100 border-0 shadow-sm text-center">
                    <div class="card-body p-4">
                        <div class="bg-info bg-opacity-10 rounded-circle p-3 d-inline-flex mb-3">
                            <i class="bi bi-people-fill fs-3 text-info"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-2">Personal Touch</h4>
                        <p class="mb-0 small">Direct access to founders and senior team members</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Support Stats -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-white rounded-4 p-4 shadow-sm">
                    <h4 class="text-center mb-4">Our Support Performance</h4>
                    <div class="row text-center">
                        <div class="col-md-3">
                            <h3 class="fw-bold text-primary mb-1">98%</h3>
                            <small class="text-muted">Customer Satisfaction</small>
                        </div>
                        <div class="col-md-3">
                            <h3 class="fw-bold text-primary mb-1">< 2min</h3>
                            <small class="text-muted">Average Chat Response</small>
                        </div>
                        <div class="col-md-3">
                            <h3 class="fw-bold text-primary mb-1">1,200+</h3>
                            <small class="text-muted">Happy Clients Served</small>
                        </div>
                        <div class="col-md-3">
                            <h3 class="fw-bold text-primary mb-1">5</h3>
                            <small class="text-muted">Countries Supported</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="display-5 fw-bold mb-4">Get In Touch</h2>
                <p class="lead mb-4">Ready to transform your digital presence? Contact us today for a free consultation.</p>
                
                <div class="mb-4">
                    <h5 class="mb-3">How We Can Help You:</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Website design and development</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Mobile app development</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Custom software solutions</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Website hosting and domain registration</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Digital marketing and SEO</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-primary me-2"></i> Technical support and maintenance</li>
                    </ul>
                </div>
                
                <div class="mb-4">
                    <h5 class="mb-3">Business Hours & Support:</h5>
                    <div class="bg-success bg-opacity-10 rounded-3 p-3 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-headset text-success me-2 fs-4"></i>
                            <div>
                                <h6 class="mb-0 fw-bold text-success">24/7 Customer Support</h6>
                                <small class="text-muted">Live chat, email, and emergency support always available</small>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        <li class="mb-2"><strong>Monday - Friday:</strong> 8:00 AM - 6:00 PM (EAT)</li>
                        <li class="mb-2"><strong>Saturday:</strong> 10:00 AM - 5:00 PM (EAT)</li>
                        <li class="mb-2"><strong>Sunday:</strong> Emergency support only</li>
                        <li class="mb-2"><strong>Email Response:</strong> Within 1 hour (24/7)</li>
                    </ul>
                </div>
                
                <div class="social-links">
                    <h5 class="mb-3">Connect With Us:</h5>
                    <div class="d-flex flex-wrap">
                        <a href="https://www.facebook.com/appnomu" target="_blank" class="btn btn-outline-primary rounded-circle me-2 mb-2" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;" title="Facebook">
                            <i class="bi bi-facebook fs-5"></i>
                        </a>
                        <a href="https://x.com/appnomuSalesQ" target="_blank" class="btn btn-outline-primary rounded-circle me-2 mb-2" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;" title="Twitter">
                            <i class="bi bi-twitter fs-5"></i>
                        </a>
                        <a href="https://www.linkedin.com/company/our-appnomu" target="_blank" class="btn btn-outline-primary rounded-circle me-2 mb-2" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;" title="LinkedIn">
                            <i class="bi bi-linkedin fs-5"></i>
                        </a>
                        <a href="https://www.instagram.com/appnomu" target="_blank" class="btn btn-outline-primary rounded-circle me-2 mb-2" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;" title="Instagram">
                            <i class="bi bi-instagram fs-5"></i>
                        </a>
                        <a href="https://www.youtube.com/@AppNomusalesQ" target="_blank" class="btn btn-outline-primary rounded-circle me-2 mb-2" style="width: 48px; height: 48px; display: flex; align-items: center; justify-content: center;" title="YouTube">
                            <i class="bi bi-youtube fs-5"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="card-title h4 mb-4">Send Us a Message</h3>
                        
                        <?php
                        // Display success message if set
                        if (isset($_SESSION['contact_success'])) {
                            echo '<div class="alert alert-success">' . $_SESSION['contact_success'] . '</div>';
                            unset($_SESSION['contact_success']);
                        }
                        
                        // Display error message if set
                        if (isset($_SESSION['contact_error'])) {
                            echo '<div class="alert alert-danger">' . $_SESSION['contact_error'] . '</div>';
                            unset($_SESSION['contact_error']);
                        }
                        
                        // Display validation errors if any
                        if (isset($_SESSION['contact_errors'])) {
                            echo '<div class="alert alert-danger"><ul class="mb-0">';
                            foreach ($_SESSION['contact_errors'] as $error) {
                                echo '<li>' . $error . '</li>';
                            }
                            echo '</ul></div>';
                            unset($_SESSION['contact_errors']);
                        }
                        ?>
                        
                        <!-- Success/Error Messages -->
                        <div id="formMessages" class="d-none">
                            <div class="alert" role="alert" id="alertMessage"></div>
                        </div>
                        
                        <?php
                        // Generate CSRF token if not exists
                        if (!isset($_SESSION['csrf_token'])) {
                            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                        }
                        ?>
                        
                        <form id="contactForm" action="process_contact.php" method="POST" class="needs-validation" novalidate>
                            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                            
                            <!-- Name Field -->
                            <div class="mb-4">
                                <label for="name" class="form-label fw-medium">Full Name <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                                    <input type="text" class="form-control" id="name" name="name" 
                                           value="<?php echo htmlspecialchars($_SESSION['contact_form_data']['name'] ?? ''); ?>" 
                                           placeholder="Your full name" required
                                           minlength="2" maxlength="100">
                                </div>
                                <div class="invalid-feedback">
                                    Please enter your full name (2-100 characters).
                                </div>
                            </div>
                            
                            <!-- Email Field -->
                            <div class="mb-4">
                                <label for="email" class="form-label fw-medium">Email Address <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" 
                                           value="<?php echo htmlspecialchars($_SESSION['contact_form_data']['email'] ?? ''); ?>" 
                                           placeholder="your.email@example.com" required>
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a valid email address.
                                </div>
                            </div>
                            
                            <!-- Phone Field (Optional) -->
                            <div class="mb-4">
                                <label for="phone" class="form-label fw-medium">Phone Number <small class="text-muted">(Optional)</small></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-telephone-fill"></i></span>
                                    <input type="tel" class="form-control" id="phone" name="phone" 
                                           value="<?php echo htmlspecialchars($_SESSION['contact_form_data']['phone'] ?? ''); ?>" 
                                           placeholder="+256770557843"
                                           maxlength="40">
                                </div>
                                <div class="form-text">Include country code for international numbers. Supports +, -, (), . and spaces</div>
                                <div class="invalid-feedback">
                                    Please enter a valid phone number (7-40 characters, may include +, -, (), ., or spaces).
                                </div>
                            </div>
                            
                            <!-- Subject Field -->
                            <div class="mb-4">
                                <label for="subject" class="form-label fw-medium">Subject <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-chat-square-text-fill"></i></span>
                                    <input type="text" class="form-control" id="subject" name="subject" 
                                           value="<?php echo htmlspecialchars($_SESSION['contact_form_data']['subject'] ?? ''); ?>" 
                                           placeholder="How can we help you?" required
                                           minlength="5" maxlength="200">
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a subject (5-200 characters).
                                </div>
                            </div>
                            
                            <!-- Message Field -->
                            <div class="mb-4">
                                <label for="message" class="form-label fw-medium">Your Message <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text align-items-start pt-2"><i class="bi bi-chat-left-text-fill"></i></span>
                                    <textarea class="form-control" id="message" name="message" rows="5" 
                                              placeholder="Please provide details about your inquiry" required
                                              minlength="10" maxlength="2000"><?php echo htmlspecialchars($_SESSION['contact_form_data']['message'] ?? ''); ?></textarea>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="form-text">Minimum 10 characters</div>
                                    <div class="form-text"><span id="messageCounter">0</span>/2000</div>
                                </div>
                                <div class="invalid-feedback">
                                    Please enter a detailed message (10-2000 characters).
                                </div>
                            </div>
                            
                            <!-- Privacy Policy Checkbox -->
                            <div class="mb-4 form-check">
                                <input class="form-check-input" type="checkbox" id="privacyPolicy" name="privacyPolicy" required>
                                <label class="form-check-label" for="privacyPolicy">
                                    I agree to the <a href="privacy-policy.php" target="_blank" class="text-decoration-underline">Privacy Policy</a> and <a href="terms-of-service.php" target="_blank" class="text-decoration-underline">Terms of Service</a> <span class="text-danger">*</span>
                                </label>
                                <div class="invalid-feedback">
                                    You must agree to the privacy policy and terms of service.
                                </div>
                            </div>
                            
                            <!-- Honeypot field for spam prevention -->
                            <div class="d-none" aria-hidden="true">
                                <label for="website">Leave this field empty</label>
                                <input type="text" id="website" name="website" tabindex="-1">
                            </div>
                            
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg py-3 fw-medium">
                                    <span class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    <span class="button-text">Send Message</span>
                                </button>
                            </div>
                        </form>
                        
                        <?php
                        // Clear form data after displaying
                        if (isset($_SESSION['contact_form_data'])) {
                            unset($_SESSION['contact_form_data']);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- FAQ Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Frequently Asked Questions</h2>
            <p class="lead">Find answers to common questions about our services</p>
        </div>
        
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="accordion" id="contactFAQ">
                    <div class="accordion-item border-0 mb-3 shadow-sm">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                What is the typical timeline for website development?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                The timeline for website development varies depending on the complexity of the project. A basic website typically takes 2-4 weeks, while more complex websites with custom functionality may take 6-12 weeks. During our initial consultation, we'll provide you with a more accurate timeline based on your specific requirements.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 mb-3 shadow-sm">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                How much does a website or mobile app cost?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                The cost of a website or mobile app depends on various factors, including design complexity, functionality requirements, and the scope of the project. We offer flexible pricing options to accommodate different budgets. Contact us for a personalized quote based on your specific needs.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 mb-3 shadow-sm">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Do you provide ongoing maintenance and support?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                Yes, we offer comprehensive maintenance and support packages to ensure your website or application continues to perform optimally. Our support includes regular updates, security patches, performance optimization, and technical assistance. We also provide training to help you manage your website effectively.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 mb-3 shadow-sm">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                What is your development process?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                Our development process follows these key steps: 1) Discovery and planning, 2) Design and prototyping, 3) Development, 4) Testing and quality assurance, 5) Deployment, and 6) Post-launch support. We maintain clear communication throughout the process and provide regular updates on project progress.
                            </div>
                        </div>
                    </div>
                    
                    <div class="accordion-item border-0 shadow-sm">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                Can you help with an existing website or application?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#contactFAQ">
                            <div class="accordion-body">
                                Yes, we can help with existing websites and applications. Our services include redesign, optimization, feature enhancement, bug fixing, and migration to different platforms or technologies. We'll assess your current solution and recommend the best approach to meet your goals.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced CTA Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary bg-opacity-10 rounded-4 p-5 mx-auto" style="max-width: 900px;">
                <h2 class="h2 fw-bold mb-3">Ready to Start Your Project?</h2>
                <p class="lead mb-4" style="max-width: 700px; margin: 0 auto;">Get expert support from Africa's leading tech team. 24/7 customer support, 1-hour email response guarantee, and free consultations. Let's transform your digital presence together.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                    <a href="javascript:void(0)" class="btn btn-primary btn-lg px-5 py-3 fw-bold" onclick="document.getElementById('name').focus(); return false;">
                        <i class="bi bi-chat-dots-fill me-2"></i>Contact Us Now
                    </a>
                    <a href="tel:+256200948420" class="btn btn-outline-primary btn-lg px-5 py-3">
                        <i class="bi bi-telephone-fill me-2"></i>Call: +256 200 948 420
                    </a>
                </div>
                <div class="mt-3">
                    <small class="text-muted fw-bold">✓ 24/7 support ✓ 1-hour response ✓ Free consultation ✓ African expertise with global standards</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact Form JavaScript -->
<script src="assets/js/contact-form.js"></script>

<?php
// Include footer
include_once 'includes/footer.php';
?>
