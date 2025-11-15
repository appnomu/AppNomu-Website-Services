<?php
// Include header
include_once 'includes/header.php';
?>

<!-- Custom CSS for service selection -->
<link rel="stylesheet" href="assets/css/service-selection.css">

<!-- Enhanced Quote Hero Section -->
<section class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-light text-primary mb-0 px-3 py-2 fw-bold me-3">FREE QUOTE</span>
                    <span class="badge bg-success mb-0 px-3 py-2 fw-bold text-white">24H RESPONSE</span>
                </div>
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2;">
                    Get Your <span style="background: linear-gradient(45deg, #60a5fa, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">African-Made</span> Digital Solution Quote
                </h1>
                <p class="lead mb-4" style="font-size: 1.2rem; opacity: 0.9;">
                    Join 1,200+ satisfied clients across Africa and beyond. Get a detailed quote for your project with transparent pricing, clear timelines, and guaranteed quality. No hidden costs, no surprises.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <a href="#quoteForm" class="btn btn-light btn-lg fw-bold px-4 py-3 text-primary">Get Free Quote</a>
                    <a href="tel:+256200948420" class="btn btn-outline-light btn-lg px-4 py-3">Call: +256 200 948 420</a>
                </div>
            </div>
            <div class="col-lg-5 mt-4 mt-lg-0">
                <!-- Trust Stats -->
                <div class="row g-3">
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">1,200+</h3>
                            <p class="mb-0 text-white-50">Projects Delivered</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">24H</h3>
                            <p class="mb-0 text-white-50">Quote Response</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">70%</h3>
                            <p class="mb-0 text-white-50">Cost Savings</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 text-center backdrop-blur" style="backdrop-filter: blur(10px);">
                            <h3 class="fs-1 fw-bold text-white mb-0">100%</h3>
                            <p class="mb-0 text-white-50">Satisfaction Rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quote Form Section - Moved Higher -->
<section class="py-5" id="quoteForm">
    <div class="container">
        <div class="row">
            <!-- Form Column -->
            <div class="col-lg-8 col-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <h2 class="h3 text-primary fw-bold">Get Your Detailed Quote</h2>
                            <p class="text-muted mb-3">Fill out the form below and we'll respond within 24 hours</p>
                        </div>
                        
                        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                            <div class="alert alert-success">
                                <i class="bi bi-check-circle-fill me-2"></i> Thank you for submitting your quote request! We'll get back to you within 24 hours.
                            </div>
                        <?php endif; ?>
                        
                        <form id="quoteForm" action="process-quote.php" method="post" enctype="multipart/form-data">
                            <!-- Personal Information -->
                            <div class="mb-4">
                                <h5 class="text-primary border-bottom pb-2">Personal Information</h5>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="fullName" class="form-label">Full Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="fullName" name="fullName" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="phoneNumber" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                                        <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="country" class="form-label">Country <span class="text-danger">*</span></label>
                                        <select class="form-select" id="country" name="country" required>
                                            <option value="" selected disabled>Select your country</option>
                                            <?php include_once 'includes/countries-list.php'; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Service Requirements -->
                            <div class="mb-4">
                                <h5 class="text-primary border-bottom pb-2">Service Requirements</h5>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Services Required <span class="text-danger">*</span></label>
                                        <div class="row g-3">
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_webDevelopment">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Website Development" id="webDevelopment">
                                                        <label class="form-check-label" for="webDevelopment">
                                                            Website Development
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_webDesign">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Website Design" id="webDesign">
                                                        <label class="form-check-label" for="webDesign">
                                                            Website Design
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_mobileApp">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Mobile Application Development" id="mobileApp">
                                                        <label class="form-check-label" for="mobileApp">
                                                            Mobile Application Development
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_softwareDev">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Custom Software Development" id="softwareDev">
                                                        <label class="form-check-label" for="softwareDev">
                                                            Custom Software Development
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_digitalMarketing">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Digital Marketing" id="digitalMarketing">
                                                        <label class="form-check-label" for="digitalMarketing">
                                                            Digital Marketing
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_radioAds">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Radio Ads" id="radioAds">
                                                        <label class="form-check-label" for="radioAds">
                                                            Radio Ads
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_googleAds">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Google Ads Campaign Management" id="googleAds">
                                                        <label class="form-check-label" for="googleAds">
                                                            Google Ads Campaign Management
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_marketingMaterial">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Marketing Material Development" id="marketingMaterial">
                                                        <label class="form-check-label" for="marketingMaterial">
                                                            Marketing Material Development
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_seoOptimization">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="SEO Optimization" id="seoOptimization">
                                                        <label class="form-check-label" for="seoOptimization">
                                                            SEO Optimization
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <div class="service-card" id="serviceCard_otherService">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="services[]" value="Other" id="otherService">
                                                        <label class="form-check-label" for="otherService">
                                                            Other
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 other-service-input" style="display: none;">
                                                <input type="text" class="form-control" name="otherServiceText" id="otherServiceText" placeholder="Please specify">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="budget" class="form-label">Budget Range <span class="text-danger">*</span></label>
                                        <select class="form-select" id="budget" name="budget" required>
                                            <option value="" selected disabled>Select your budget</option>
                                            <option value="Less than $1,000">Less than $1,000</option>
                                            <option value="$1,000 - $5,000">$1,000 - $5,000</option>
                                            <option value="$5,000 - $10,000">$5,000 - $10,000</option>
                                            <option value="$10,000 - $25,000">$10,000 - $25,000</option>
                                            <option value="$25,000+">$25,000+</option>
                                            <option value="Other">Other (specify)</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 custom-budget" style="display: none;">
                                        <label for="customBudget" class="form-label">Custom Budget</label>
                                        <input type="text" class="form-control" id="customBudget" name="customBudget" placeholder="Enter your budget">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label for="timeline" class="form-label">When do you need this completed? <span class="text-danger">*</span></label>
                                        <select class="form-select" id="timeline" name="timeline" required>
                                            <option value="" selected disabled>Select timeline</option>
                                            <option value="As soon as possible">As soon as possible</option>
                                            <option value="Within 1 month">Within 1 month</option>
                                            <option value="1-3 months">1-3 months</option>
                                            <option value="3-6 months">3-6 months</option>
                                            <option value="More than 6 months">More than 6 months</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Project Details -->
                            <div class="mb-4">
                                <h5 class="text-primary border-bottom pb-2">Project Details</h5>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="currentProblem" class="form-label">What problem are you trying to solve? <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="currentProblem" name="currentProblem" rows="3" required></textarea>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="businessInfo" class="form-label">Tell us about your business</label>
                                        <textarea class="form-control" id="businessInfo" name="businessInfo" rows="3"></textarea>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="attachments" class="form-label">Upload Files (optional)</label>
                                        <input class="form-control" type="file" id="attachments" name="attachments[]" multiple>
                                        <div class="form-text">You can upload relevant documents, images, or specifications (Max 5MB per file)</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Terms and Submit -->
                            <div class="mb-4">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" id="termsCheck" name="termsCheck" required>
                                    <label class="form-check-label" for="termsCheck">
                                        I agree to the <a href="privacy-policy.php" target="_blank">privacy policy</a> and <a href="terms-of-service.php" target="_blank">terms of service</a>
                                    </label>
                                </div>
                                
                                <div class="bg-primary bg-opacity-10 rounded-3 p-4 mb-4 text-center">
                                    <h5 class="fw-bold text-primary mb-2">🚀 What Happens Next?</h5>
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <small class="fw-bold d-block">1. Instant Confirmation</small>
                                            <small class="text-muted">You'll receive an email immediately</small>
                                        </div>
                                        <div class="col-md-4">
                                            <small class="fw-bold d-block">2. Expert Review</small>
                                            <small class="text-muted">Our team analyzes your requirements</small>
                                        </div>
                                        <div class="col-md-4">
                                            <small class="fw-bold d-block">3. Detailed Quote</small>
                                            <small class="text-muted">Comprehensive proposal within 24H</small>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="text-center">
                                    <!-- Cloudflare Turnstile -->
                                    <div class="mb-3 d-flex justify-content-center">
                                        <div class="cf-turnstile" 
                                             data-sitekey="<?php 
                                                require_once 'config/config.php';
                                                $turnstile = Config::getTurnstile();
                                                echo htmlspecialchars($turnstile['site_key']); 
                                             ?>"
                                             data-callback="onTurnstileSuccess"
                                             data-error-callback="onTurnstileError"
                                             data-expired-callback="onTurnstileExpired"
                                             data-theme="light"
                                             data-size="normal">
                                        </div>
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-lg px-5 py-3 fw-bold">
                                        <i class="bi bi-send-fill me-2"></i>Get My Free Quote Now
                                    </button>
                                    <p class="small text-muted mt-2 mb-0">
                                        <i class="bi bi-shield-check text-success me-1"></i>
                                        No spam, no sales calls. Just a professional quote tailored to your needs.
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar Column - Hidden on Mobile -->
            <div class="col-lg-4 d-none d-lg-block">
                <div class="sticky-top" style="top: 20px;">
                <!-- Why Choose Us Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-4">Why Choose AppNomu?</h5>
                        <ul class="list-unstyled">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>24-Hour Response</strong><br>
                                <small class="text-muted">Get your detailed quote within 24 hours</small>
                            </li>
                            <li class="mb-3 bg-warning bg-opacity-10 p-2 rounded">
                                <i class="bi bi-credit-card-fill text-warning me-2"></i>
                                <strong>Flexible Payment Plans</strong><br>
                                <small class="text-muted">Pay in installments - Daily, Weekly, or Monthly up to 24 months</small>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>No Hidden Costs</strong><br>
                                <small class="text-muted">Transparent pricing with no surprises</small>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>1,200+ Projects Delivered</strong><br>
                                <small class="text-muted">Proven track record across Africa</small>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Expert Team</strong><br>
                                <small class="text-muted">20+ developers across 3 continents</small>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Money-Back Guarantee</strong><br>
                                <small class="text-muted">100% satisfaction or full refund</small>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Free Revisions</strong><br>
                                <small class="text-muted">Unlimited revisions until you're satisfied</small>
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Secure & Confidential</strong><br>
                                <small class="text-muted">Your data is protected with SSL encryption</small>
                            </li>
                        </ul>
                        <a href="payment-plans" class="btn btn-outline-warning btn-sm w-100 mt-2">
                            <i class="bi bi-calculator me-2"></i>View Payment Plans
                        </a>
                    </div>
                </div>
                
                <!-- Testimonial Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="me-2">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                            </div>
                            <small class="text-muted">5.0 Rating</small>
                        </div>
                        <p class="mb-3 fst-italic">"Quick and precise. I was given a three days deadline and it was made."</p>
                        <div class="d-flex align-items-center">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-2" style="width: 35px; height: 35px;">
                                <span class="text-white fw-bold small">I</span>
                            </div>
                            <div>
                                <strong class="d-block small">Isaac</strong>
                                <small class="text-muted">CEO, All Times Recruits</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Pricing Preview Card -->
                <div class="card border-0 shadow-sm mb-4 bg-light">
                    <div class="card-body p-4">
                        <h6 class="fw-bold mb-3">Starting Prices</h6>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted">Website Development</span>
                                <strong class="text-primary">$299</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted">Mobile App</span>
                                <strong class="text-primary">$1,999</strong>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="text-muted">Expert Hire</span>
                                <strong class="text-primary">$15/hr</strong>
                            </div>
                        </div>
                        <p class="small text-muted mb-0">
                            <i class="bi bi-info-circle me-1"></i>Final pricing based on your requirements
                        </p>
                    </div>
                </div>
                
                <!-- Contact Card -->
                <div class="card border-0 shadow-sm bg-primary text-white">
                    <div class="card-body p-4">
                        <h5 class="fw-bold mb-3">Need Help?</h5>
                        <p class="mb-3">Speak with our team directly</p>
                        <div class="d-grid gap-2">
                            <a href="tel:+256200948420" class="btn btn-light btn-lg">
                                <i class="bi bi-telephone-fill me-2"></i>Call Us
                            </a>
                            <a href="mailto:info@appnomu.com" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-envelope-fill me-2"></i>Email Us
                            </a>
                        </div>
                        <p class="small mt-3 mb-0 text-center">
                            <i class="bi bi-clock me-1"></i>Available 24/7
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">Why Choose AppNomu?</h2>
            <p class="lead">We deliver high-quality solutions tailored to your specific needs</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-opacity-10 p-3 rounded-circle mx-auto mb-4" style="width: 80px; height: 80px;">
                            <i class="bi bi-trophy fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 mb-3">Expertise</h3>
                        <p class="mb-0">Our team of professionals brings years of experience across various industries and technologies.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-opacity-10 p-3 rounded-circle mx-auto mb-4" style="width: 80px; height: 80px;">
                            <i class="bi bi-graph-up-arrow fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 mb-3">Results-Driven</h3>
                        <p class="mb-0">We focus on delivering solutions that drive real business results and help you achieve your goals.</p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon bg-primary bg-opacity-10 p-3 rounded-circle mx-auto mb-4" style="width: 80px; height: 80px;">
                            <i class="bi bi-headset fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 mb-3">Dedicated Support</h3>
                        <p class="mb-0">From initial consultation to post-launch support, we're with you every step of the way.</p>
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
                <h2 class="h2 fw-bold mb-3">Ready to Transform Your Business?</h2>
                <p class="lead mb-4" style="max-width: 700px; margin: 0 auto;">Join 1,200+ successful businesses who chose AppNomu for fast, professional digital solutions. Get your detailed quote today and start your project tomorrow.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                    <a href="#quoteForm" class="btn btn-primary btn-lg px-5 py-3 fw-bold">
                        <i class="bi bi-send-fill me-2"></i>Get My Quote
                    </a>
                    <a href="tel:+256200948420" class="btn btn-outline-primary btn-lg px-5 py-3">
                        <i class="bi bi-telephone-fill me-2"></i>Call: +256 200 948 420
                    </a>
                </div>
                <div class="mt-3">
                    <small class="text-muted fw-bold">✓ 24H response guarantee ✓ No hidden costs ✓ Free consultation ✓ Money-back guarantee</small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Script for form interactions -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Enhanced service selection with visual feedback
    const serviceCheckboxes = document.querySelectorAll('input[name="services[]"');
    serviceCheckboxes.forEach(checkbox => {
        // Initialize based on any pre-checked boxes
        if (checkbox.checked) {
            document.getElementById('serviceCard_' + checkbox.id).classList.add('selected');
        }
        
        // Add click handler for the entire card
        const card = document.getElementById('serviceCard_' + checkbox.id);
        if (card) {
            card.addEventListener('click', function() {
                checkbox.checked = !checkbox.checked;
                this.classList.toggle('selected', checkbox.checked);
            });
        }
        
        // Also handle direct checkbox clicks
        checkbox.addEventListener('change', function() {
            document.getElementById('serviceCard_' + this.id).classList.toggle('selected', this.checked);
        });
    });
    
    // For Other Service option
    document.getElementById('otherService').addEventListener('change', function() {
        const otherServiceInput = document.querySelector('.other-service-input');
        otherServiceInput.style.display = this.checked ? 'block' : 'none';
        document.getElementById('otherServiceText').required = this.checked;
    });
    
    // For Custom Budget option
    document.getElementById('budget').addEventListener('change', function() {
        const customBudgetDiv = document.querySelector('.custom-budget');
        customBudgetDiv.style.display = this.value === 'Other' ? 'block' : 'none';
        document.getElementById('customBudget').required = this.value === 'Other';
    });
    
    // Form validation
    document.getElementById('quoteForm').addEventListener('submit', function(event) {
        let valid = true;
        const services = document.querySelectorAll('input[name="services[]"]:checked');
        
        if (services.length === 0) {
            valid = false;
            alert('Please select at least one service');
        }
        
        // Check Turnstile verification
        const turnstileToken = document.querySelector('[name="cf-turnstile-response"]')?.value;
        if (!turnstileToken) {
            valid = false;
            alert('Please complete the security verification');
        }
        
        if (!valid) {
            event.preventDefault();
        }
    });
});

// Turnstile callback functions
window.onTurnstileSuccess = function(token) {
    console.log('Turnstile verification successful');
};

window.onTurnstileError = function(error) {
    console.error('Turnstile error:', error);
    alert('Security verification failed. Please refresh the page and try again.');
};

window.onTurnstileExpired = function() {
    console.log('Turnstile token expired');
    alert('Security verification expired. Please verify again.');
};
</script>

<!-- Cloudflare Turnstile Script -->
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<?php
// Include footer
include_once 'includes/footer.php';
?>
