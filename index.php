<?php
// Include header
include_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section position-relative d-flex align-items-center" style="min-height: 600px; background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%); overflow: hidden;">
    
    <!-- Subtle Wave Background -->
    <div class="position-absolute w-100 h-100" style="bottom: 0; left: 0; opacity: 0.1; max-width: 100%;">
        <svg viewBox="0 0 1200 320" style="width: 100%; height: 100%;">
            <path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,149.3C960,160,1056,160,1152,138.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
        </svg>
    </div>
    
    <div class="container position-relative py-5">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-light text-primary mb-0 px-3 py-2 fw-bold me-3" style="font-size: 0.85rem;">TRUSTED BY 1,200+ BUSINESSES</span>
                    <span class="badge bg-primary mb-0 px-3 py-2 fw-bold text-white" style="font-size: 0.85rem;">5-STAR RATED</span>
                </div>
                
                <h1 class="display-3 fw-bold mb-4 text-white" style="line-height: 1.2;">Professional <span style="background: linear-gradient(45deg, #60a5fa, #a78bfa); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Web & Mobile Solutions</span> Delivered in 3 Days</h1>
                
                <p class="lead mb-4 text-white" style="font-size: 1.2rem; opacity: 0.9;">Transform your business with custom websites, mobile apps, and enterprise software. Serving businesses across Africa and beyond with affordable, world-class digital solutions.</p>
                
                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="request-quote.php" class="btn btn-light btn-lg fw-bold px-4 py-3 text-primary" style="box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                        Request a Quote
                    </a>
                    <a href="services.php" class="btn btn-outline-light btn-lg px-4 py-3">Explore Services</a>
                </div>
                
                <!-- Stats Cards -->
                <div class="row g-3 mt-2">
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-primary rounded-3 p-2 me-3"><i class="bi bi-laptop text-white fs-5"></i></div>
                                <div>
                                    <h3 class="fs-2 fw-bold text-white mb-0">1,200+</h3>
                                    <p class="mb-0 text-white-50">Websites</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-success rounded-3 p-2 me-3"><i class="bi bi-phone text-white fs-5"></i></div>
                                <div>
                                    <h3 class="fs-2 fw-bold text-white mb-0">100+</h3>
                                    <p class="mb-0 text-white-50">Mobile Apps</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bg-white bg-opacity-10 rounded-3 p-3 backdrop-blur" style="backdrop-filter: blur(10px);">
                            <div class="d-flex align-items-center">
                                <div class="icon-box bg-warning rounded-3 p-2 me-3"><i class="bi bi-people text-white fs-5"></i></div>
                                <div>
                                    <h3 class="fs-2 fw-bold text-white mb-0">20+</h3>
                                    <p class="mb-0 text-white-50">Experts</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5 mt-5 mt-lg-0 d-none d-lg-block">
                <!-- Website Showcase Card -->
                <div class="card border-0 rounded-4 shadow-lg overflow-hidden" style="transform: rotate(2deg); background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);">
                    <div class="card-header bg-gradient text-white p-4" style="background: linear-gradient(135deg, #198754 0%, #20c997 100%);">
                        <div class="d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Your Website in 3 Days</h5>
                            <span class="badge bg-white text-success fw-bold">LIVE</span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <!-- Website Preview Mockup -->
                        <div class="bg-light rounded-3 p-3 mb-3" style="border: 2px solid #e9ecef;">
                            <div class="d-flex align-items-center mb-2">
                                <div class="bg-danger rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                <div class="bg-warning rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                <div class="bg-success rounded-circle me-2" style="width: 8px; height: 8px;"></div>
                                <small class="text-muted ms-2">yourwebsite.com</small>
                            </div>
                            <div class="bg-dark rounded-2 p-3 text-light" style="font-family: 'Courier New', monospace; font-size: 10px; line-height: 1.4;">
                                <div class="mb-1">
                                    <span class="text-info">&lt;title&gt;</span><span class="text-warning">Your Business - Professional Website</span><span class="text-info">&lt;/title&gt;</span>
                                </div>
                                <div class="mb-1">
                                    <span class="text-success">// Built by AppNomu in 3 days</span>
                                </div>
                                <div class="mb-1">
                                    <span class="text-info">&lt;h1&gt;</span><span class="text-white">Welcome to Your Business</span><span class="text-info">&lt;/h1&gt;</span>
                                </div>
                                <div class="mb-1">
                                    <span class="text-info">&lt;p&gt;</span><span class="text-white">Converting visitors into customers</span><span class="text-info">&lt;/p&gt;</span>
                                </div>
                                <div class="mb-1">
                                    <span class="text-danger">.mobile-responsive</span> <span class="text-white">{</span> <span class="text-warning">display: flex;</span> <span class="text-white">}</span>
                                </div>
                                <div class="mb-1">
                                    <span class="text-danger">.seo-optimized</span> <span class="text-white">{</span> <span class="text-warning">rank: #1;</span> <span class="text-white">}</span>
                                </div>
                                <div>
                                    <span class="text-info">&lt;button&gt;</span><span class="text-success">Get Started Today</span><span class="text-info">&lt;/button&gt;</span>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Process Timeline -->
                        <div class="row g-2 text-center">
                            <div class="col-4">
                                <div class="bg-primary bg-opacity-10 rounded-3 p-2">
                                    <i class="bi bi-calendar-check text-primary fs-5"></i>
                                    <small class="d-block fw-bold text-primary">Day 1</small>
                                    <small class="text-muted">Design</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bg-warning bg-opacity-10 rounded-3 p-2">
                                    <i class="bi bi-code-slash text-warning fs-5"></i>
                                    <small class="d-block fw-bold text-warning">Day 2</small>
                                    <small class="text-muted">Develop</small>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="bg-success bg-opacity-10 rounded-3 p-2">
                                    <i class="bi bi-rocket-takeoff text-success fs-5"></i>
                                    <small class="d-block fw-bold text-success">Day 3</small>
                                    <small class="text-muted">Launch</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mt-3">
                            <small class="text-success fw-bold">✓ Mobile Responsive ✓ SEO Optimized ✓ Fast Loading</small>
                        </div>
                    </div>
                </div>
                
                <!-- Testimonial Badge -->
                <a href="https://www.trustpilot.com/reviews/67efc34382bd78b8a840d44a" target="_blank" class="position-absolute bg-white rounded-4 shadow-lg p-3 text-decoration-none d-none d-lg-block" style="bottom: 30px; left: -20px; max-width: 320px; transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'">
                    <div>
                        <div class="d-flex align-items-center mb-1">
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <i class="bi bi-star-fill text-warning me-1"></i>
                            <small class="text-muted ms-1">Trustpilot.com</small>
                            <i class="bi bi-box-arrow-up-right text-primary ms-1" style="font-size: 0.7rem;" title="View on Trustpilot"></i>
                        </div>
                        <p class="mb-1 small fw-bold text-dark">"This was a very good experience. It was quick and precise. I was given a three days deadline and it was made."</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <p class="mb-0 small fw-bold text-dark">Isaac, CEO, All Times Recruits</p>
                            <small class="text-muted">April 2025</small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <!-- Scroll down indicator -->
        <div class="text-center mt-5 mb-3 d-none d-lg-block">
            <a href="#services" class="text-white text-decoration-none">
                <small class="d-block mb-2">Discover More</small>
                <i class="bi bi-chevron-double-down fs-4 animate-bounce"></i>
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold text-primary">1200+</h2>
                    <p class="lead">Websites Developed</p>
                </div>
            </div>
            <div class="col-md-4 mb-4 mb-md-0">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold text-primary">300+</h2>
                    <p class="lead">Domains Registered</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-item">
                    <h2 class="display-4 fw-bold text-primary">100+</h2>
                    <p class="lead">Mobile Apps Developed</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- APPNOMU Meaning - Condensed -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">What APPNOMU Stands For</h2>
            <p class="lead text-muted">Our name is our mission—every letter represents our commitment to your success</p>
        </div>
        
        <div class="row g-3">
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                        <span class="fs-4 fw-bold">A</span>
                    </div>
                    <h5 class="fw-bold mb-1">Automate</h5>
                    <p class="small text-muted mb-0">Streamline operations</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-success text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                        <span class="fs-4 fw-bold">P</span>
                    </div>
                    <h5 class="fw-bold mb-1">Personalize</h5>
                    <p class="small text-muted mb-0">Tailor to your brand</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-warning text-dark d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                        <span class="fs-4 fw-bold">P</span>
                    </div>
                    <h5 class="fw-bold mb-1">Perform</h5>
                    <p class="small text-muted mb-0">Deliver with impact</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-info text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                        <span class="fs-4 fw-bold">N</span>
                    </div>
                    <h5 class="fw-bold mb-1">Nurture</h5>
                    <p class="small text-muted mb-0">Foster growth</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-danger text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                        <span class="fs-4 fw-bold">O</span>
                    </div>
                    <h5 class="fw-bold mb-1">Optimize</h5>
                    <p class="small text-muted mb-0">AI-driven insights</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="text-center p-3">
                    <div class="rounded-circle text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                        <span class="fs-4 fw-bold">M</span>
                    </div>
                    <h5 class="fw-bold mb-1">Mobilize</h5>
                    <p class="small text-muted mb-0">Work anywhere</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-center p-3">
                    <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-2" style="width: 50px; height: 50px;">
                        <span class="fs-4 fw-bold">U</span>
                    </div>
                    <h5 class="fw-bold mb-1">Unify</h5>
                    <p class="small text-muted mb-0">One seamless platform for everything</p>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <a href="about.php#appnomu-meaning" class="btn btn-outline-primary">Learn More About Our Mission</a>
        </div>
    </div>
</section>

<!-- Why AppNomu Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <div class="position-relative">
                    <img src="https://services.appnomu.com/assets/images/Hero_Website.jpg" alt="Why Choose AppNomu - Professional Website Development" class="img-fluid rounded-3 shadow">
                    <div class="position-absolute bg-primary text-white p-4 rounded-3 shadow" style="bottom: -30px; right: -30px; max-width: 300px;">
                        <div class="d-flex align-items-center">
                            <div class="display-4 fw-bold me-3">20+</div>
                            <div>
                                <h4 class="mb-0">Professional Developers</h4>
                                <p class="mb-0">Across Africa, India, and USA</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 ps-lg-5 d-flex flex-column justify-content-center">
                <h6 class="text-primary fw-bold mb-3">WHY CHOOSE US</h6>
                <h2 class="display-5 fw-bold mb-4">Why Smart Businesses Choose AppNomu Over Everyone Else</h2>
                <p class="lead mb-4">While others take weeks or months, we deliver professional websites in just 3 days. Here's what makes us different:</p>
                
                <div class="row g-4 mt-2">
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="feature-icon bg-success bg-opacity-10 p-3 rounded-3 me-3">
                                <i class="bi bi-clock-fill text-success fs-4"></i>
                            </div>
                            <div>
                                <h4 class="h5 fw-bold">Lightning-Fast Delivery</h4>
                                <p class="mb-0">Get your website live in <strong>3 days, not 3 months</strong>. Start attracting customers immediately while competitors are still planning.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="feature-icon bg-primary bg-opacity-10 p-3 rounded-3 me-3">
                                <i class="bi bi-award-fill text-primary fs-4"></i>
                            </div>
                            <div>
                                <h4 class="h5 fw-bold">Guaranteed Results</h4>
                                <p class="mb-0"><strong>1,200+ websites delivered on time.</strong> 100% client satisfaction rate. Your project will be completed as promised, guaranteed.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="feature-icon bg-warning bg-opacity-10 p-3 rounded-3 me-3">
                                <i class="bi bi-graph-up-arrow text-warning fs-4"></i>
                            </div>
                            <div>
                                <h4 class="h5 fw-bold">Built to Convert</h4>
                                <p class="mb-0">Every website is designed to <strong>turn visitors into customers</strong>. More leads, more sales, guaranteed ROI on your investment.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="feature-icon bg-info bg-opacity-10 p-3 rounded-3 me-3">
                                <i class="bi bi-shield-check text-info fs-4"></i>
                            </div>
                            <div>
                                <h4 class="h5 fw-bold">Never Left Behind</h4>
                                <p class="mb-0"><strong>24/7 support even after launch.</strong> Your success is our success - we're always here to help you grow.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex">
                            <div class="feature-icon bg-warning bg-opacity-10 p-3 rounded-3 me-3">
                                <i class="bi bi-credit-card-fill text-warning fs-4"></i>
                            </div>
                            <div>
                                <h4 class="h5 fw-bold">Flexible Payment Plans</h4>
                                <p class="mb-0"><strong>Pay in installments, not upfront.</strong> Just 20% down, then pay daily, weekly, or monthly. <a href="payment-plans.php" class="text-primary fw-bold">Learn more →</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Risk Reversal & Guarantee -->
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="bg-light rounded-4 p-4 text-center">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h5 class="fw-bold mb-2">🛡️ 100% Satisfaction Guarantee</h5>
                                    <p class="mb-0 text-muted">Not happy with your website? We'll revise it until you love it, or give you a full refund. No questions asked.</p>
                                </div>
                                <div class="col-md-4 mt-3 mt-md-0">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="me-3">
                                            <small class="text-muted d-block">Trusted by</small>
                                            <strong class="text-primary">1,200+ Businesses</strong>
                                        </div>
                                        <div class="text-warning">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <small class="text-muted ms-1">5.0</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section id="services" class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 mb-3">OUR SERVICES</span>
            <h2 class="display-4 fw-bold mb-3">Website Designing Uganda | Affordable Hosting & Mobile App Development</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Professional website developers Uganda offering cheaper website hosting, reliable domain registration & mobile app development. Most affordable app developers near you.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-laptop fs-1 text-primary"></i>
                        </div>
                        <h3 class="card-title h5 mb-3">Professional Website Design Uganda</h3>
                        <p class="card-text mb-3">Custom responsive websites that convert visitors into customers. WordPress, e-commerce, and business websites designed in 3 days.</p>
                        <div>
                            <span class="badge bg-primary-subtle text-primary me-1">WordPress</span>
                            <span class="badge bg-primary-subtle text-primary me-1">E-commerce</span>
                            <span class="badge bg-primary-subtle text-primary">SEO Ready</span>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-success fw-bold">✓ 3-Day Delivery</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-phone fs-1 text-success"></i>
                        </div>
                        <h3 class="card-title h5 mb-3">Mobile App Development Kenya</h3>
                        <p class="card-text mb-3">iOS and Android mobile apps that engage users and drive business growth. Native and cross-platform development services.</p>
                        <div>
                            <span class="badge bg-success-subtle text-success me-1">iOS</span>
                            <span class="badge bg-success-subtle text-success me-1">Android</span>
                            <span class="badge bg-success-subtle text-success">React Native</span>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-success fw-bold">✓ App Store Ready</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-code-square fs-1 text-warning"></i>
                        </div>
                        <h3 class="card-title h5 mb-3">Custom Software Development</h3>
                        <p class="card-text mb-3">Enterprise software solutions, CRM systems, and business automation tools that streamline operations and boost productivity.</p>
                        <div>
                            <span class="badge bg-warning-subtle text-warning me-1">PHP</span>
                            <span class="badge bg-warning-subtle text-warning me-1">Python</span>
                            <span class="badge bg-warning-subtle text-warning">JavaScript</span>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-success fw-bold">✓ Scalable Solutions</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-hdd-network fs-1 text-info"></i>
                        </div>
                        <h3 class="card-title h5 mb-3">Fast Website Hosting Africa</h3>
                        <p class="card-text mb-3">Lightning-fast SSD hosting with 99.9% uptime guarantee. Perfect for WordPress, e-commerce, and business websites across Africa.</p>
                        <div>
                            <span class="badge bg-info-subtle text-info me-1">SSD Storage</span>
                            <span class="badge bg-info-subtle text-info me-1">SSL Free</span>
                            <span class="badge bg-info-subtle text-info">99.9% Uptime</span>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-success fw-bold">✓ Free Migration</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-globe fs-1 text-danger"></i>
                        </div>
                        <h3 class="card-title h5 mb-3">Cheap Domain Registration</h3>
                        <p class="card-text mb-3">Secure your brand with affordable domain names. .com, .co.ug, .co.ke domains with free DNS management and email forwarding.</p>
                        <div>
                            <span class="badge bg-danger-subtle text-danger me-1">.com</span>
                            <span class="badge bg-danger-subtle text-danger me-1">.co.ug</span>
                            <span class="badge bg-danger-subtle text-danger">.co.ke</span>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-success fw-bold">✓ Instant Setup</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-5px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4">
                        <div class="icon-box mb-3">
                            <i class="bi bi-search fs-1 text-secondary"></i>
                        </div>
                        <h3 class="card-title h5 mb-3">SEO & Digital Marketing Uganda</h3>
                        <p class="card-text mb-3">Google Ads, Facebook marketing, and SEO services that increase website traffic and generate more leads for your business.</p>
                        <div>
                            <span class="badge bg-secondary-subtle text-secondary me-1">Google Ads</span>
                            <span class="badge bg-secondary-subtle text-secondary me-1">Facebook Ads</span>
                            <span class="badge bg-secondary-subtle text-secondary">SEO</span>
                        </div>
                        <div class="text-center mt-3">
                            <small class="text-success fw-bold">✓ ROI Guaranteed</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Load featured projects for homepage
require_once 'config/config.php';
$featuredProjects = [];
try {
    $pdo = Config::getDatabaseConnection();
    $stmt = $pdo->prepare("SELECT * FROM projects WHERE featured = 1 AND status IN ('Live', 'Completed') ORDER BY created_at DESC LIMIT 6");
    $stmt->execute();
    $featuredProjects = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // Silently fail - projects section won't show if there's an error
}
?>

<?php if (count($featuredProjects) > 0): ?>
<!-- Featured Projects Section -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3">
                <i class="bi bi-star-fill me-1"></i> FEATURED PROJECTS
            </span>
            <h2 class="display-5 fw-bold mb-3">See Our Work in Action</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Real projects, real results. Explore some of the amazing websites and apps we've built for businesses across Africa.</p>
        </div>
        
        <div class="row g-4">
            <?php foreach (array_slice($featuredProjects, 0, 3) as $project): ?>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 border-0 shadow-sm" style="transition: transform 0.3s ease, box-shadow 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'; this.style.boxShadow='0 15px 30px rgba(0,0,0,0.15)'" onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 6px rgba(0,0,0,0.1)'">
                    <?php 
                    // Fix the logo path - remove ../ prefix if present
                    $logoPath = $project['logo_path'] ? str_replace('../', '', $project['logo_path']) : '';
                    $logoExists = $logoPath && file_exists($logoPath);
                    ?>
                    <?php if ($logoExists): ?>
                    <div class="position-relative" style="height: 200px; overflow: hidden; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
                        <img src="<?php echo htmlspecialchars($logoPath); ?>" 
                             alt="<?php echo htmlspecialchars($project['title']); ?>" 
                             class="w-100 h-100" style="object-fit: cover;">
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>
                        </div>
                    </div>
                    <?php else: ?>
                    <div class="position-relative d-flex align-items-center justify-content-center" style="height: 200px; background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);">
                        <i class="bi bi-folder text-white" style="font-size: 4rem; opacity: 0.3;"></i>
                        <div class="position-absolute top-0 end-0 m-3">
                            <span class="badge bg-warning text-dark">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <span class="badge bg-primary-subtle text-primary"><?php echo htmlspecialchars($project['project_type']); ?></span>
                            <span class="badge bg-success-subtle text-success"><?php echo htmlspecialchars($project['status']); ?></span>
                        </div>
                        <h3 class="h5 fw-bold mb-2"><?php echo htmlspecialchars($project['title']); ?></h3>
                        <?php if ($project['client_name']): ?>
                        <p class="text-muted small mb-2">
                            <i class="bi bi-building me-1"></i>
                            <?php echo htmlspecialchars($project['client_name']); ?>
                        </p>
                        <?php endif; ?>
                        <p class="card-text text-muted mb-3">
                            <?php echo htmlspecialchars(substr($project['description'], 0, 100)) . (strlen($project['description']) > 100 ? '...' : ''); ?>
                        </p>
                        
                        <?php if ($project['technologies']): ?>
                        <div class="mb-3">
                            <?php 
                            $techs = array_slice(explode(',', $project['technologies']), 0, 3);
                            foreach ($techs as $tech): 
                            ?>
                            <span class="badge bg-light text-dark me-1 mb-1"><?php echo htmlspecialchars(trim($tech)); ?></span>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        
                        <?php if ($project['url']): ?>
                        <a href="<?php echo htmlspecialchars($project['url']); ?>" target="_blank" class="btn btn-outline-primary w-100">
                            <i class="bi bi-box-arrow-up-right me-2"></i>View Project
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        
        <!-- View All Projects CTA -->
        <div class="text-center mt-5">
            <a href="portfolio" class="btn btn-primary btn-lg px-5 py-3">
                <i class="bi bi-grid-3x3-gap me-2"></i>View All Projects
            </a>
            <p class="text-muted mt-3 mb-0">
                <small>Explore our complete portfolio of 1,200+ successful projects</small>
            </p>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Simplified Pricing Overview -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-success px-3 py-2 mb-3">TRANSPARENT PRICING</span>
            <h2 class="display-4 fw-bold mb-3">Affordable Pricing for African Businesses</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Professional websites, reliable hosting, and domain registration at prices that work for your budget</p>
        </div>
        
        <div class="row g-4">
            <!-- Website Development -->
            <div class="col-md-4">
                <div class="card h-100 border shadow-sm" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-laptop fs-1 text-primary"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">Website Development</h3>
                        <div class="mb-3">
                            <span class="h2 fw-bold text-primary">Starting at $299</span>
                            <p class="text-muted mb-0">Complete website in 3 days</p>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Responsive Design</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Mobile Optimized</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>SEO Ready</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Free SSL Certificate</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>1 Year Free Hosting</span></li>
                        </ul>
                        <div class="text-center">
                            <a href="request-quote.php" class="btn btn-primary btn-lg w-100">Get Website Quote</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Web Hosting -->
            <div class="col-md-4">
                <div class="card h-100 border shadow-sm position-relative" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <span class="badge bg-primary position-absolute" style="top: 15px; right: 15px;">Popular</span>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-hdd-network fs-1 text-success"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">Web Hosting</h3>
                        <div class="mb-3">
                            <span class="h2 fw-bold text-success">From $2.08</span>
                            <p class="text-muted mb-0">per month</p>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>99.9% Uptime Guarantee</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>SSD Storage</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Free Migration</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>24/7 Support</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Free SSL & Backups</span></li>
                        </ul>
                        <div class="text-center">
                            <a href="https://clients.appnomu.com/" target="_blank" class="btn btn-success btn-lg w-100">View Hosting Plans</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Domain Registration -->
            <div class="col-md-4">
                <div class="card h-100 border shadow-sm" style="transition: transform 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <i class="bi bi-globe fs-1 text-warning"></i>
                        </div>
                        <h3 class="h5 fw-bold mb-3">Domain Registration</h3>
                        <div class="mb-3">
                            <span class="h2 fw-bold text-warning">From $12.99</span>
                            <p class="text-muted mb-0">per year</p>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>.com, .co.ug, .co.ke</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Free DNS Management</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Email Forwarding</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Domain Privacy</span></li>
                            <li class="mb-2 d-flex align-items-start"><i class="bi bi-check-circle-fill text-success me-2 mt-1"></i><span>Instant Setup</span></li>
                        </ul>
                        <div class="text-center">
                            <a href="https://clients.appnomu.com/" target="_blank" class="btn btn-warning btn-lg w-100">Register Domain</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Trust & Guarantee Section -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-white rounded-4 p-4 text-center shadow-sm">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h4 class="fw-bold mb-2">💰 30-Day Money-Back Guarantee</h4>
                            <p class="mb-0 text-muted">Not satisfied with our service? Get a full refund within 30 days. No questions asked.</p>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                            <div class="d-flex justify-content-center align-items-center gap-3">
                                <div class="text-center">
                                    <i class="bi bi-shield-check fs-2 text-success"></i>
                                    <small class="d-block text-muted">Secure</small>
                                </div>
                                <div class="text-center">
                                    <i class="bi bi-clock fs-2 text-primary"></i>
                                    <small class="d-block text-muted">Fast</small>
                                </div>
                                <div class="text-center">
                                    <i class="bi bi-headset fs-2 text-warning"></i>
                                    <small class="d-block text-muted">24/7 Support</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Industries We Serve Section -->
<section id="industries" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 mb-3">EXPERTISE ACROSS SECTORS</span>
            <h2 class="display-4 fw-bold mb-3">Industries We Serve Across Uganda, Kenya & Africa</h2>
            <p class="lead text-muted mx-auto" style="max-width: 800px;">Mobile-first digital solutions designed for African businesses with local payment integration and compliance</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <!-- E-commerce -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border shadow-sm" style="transition: all 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-8px)'; this.querySelector('.industry-icon i').style.color='#198754'" onmouseout="this.style.transform='translateY(0)'; this.querySelector('.industry-icon i').style.color='#0d6efd'">
                    <div class="card-body p-4">
                        <div class="industry-icon mb-3 text-center">
                            <i class="bi bi-cart3 fs-1 text-primary" style="transition: color 0.3s ease;"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2">E-commerce Solutions Uganda</h3>
                        <p class="card-text small mb-2">Mobile-optimized online stores with M-Pesa, MTN Mobile Money integration. Perfect for African markets.</p>
                        <small class="text-success fw-bold">✓ 150+ Online Stores Built</small>
                    </div>
                </div>
            </div>
            
            <!-- Healthcare -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border shadow-sm" style="transition: all 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-8px)'; this.querySelector('.industry-icon i').style.color='#dc3545'" onmouseout="this.style.transform='translateY(0)'; this.querySelector('.industry-icon i').style.color='#0d6efd'">
                    <div class="card-body p-4">
                        <div class="industry-icon mb-3 text-center">
                            <i class="bi bi-hospital fs-1 text-primary" style="transition: color 0.3s ease;"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2">Healthcare Software Kenya</h3>
                        <p class="card-text small mb-2">Hospital management systems, patient records, and telemedicine platforms for African healthcare providers.</p>
                        <small class="text-success fw-bold">✓ 30+ Healthcare Systems</small>
                    </div>
                </div>
            </div>
            
            <!-- Education -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border shadow-sm" style="transition: all 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-8px)'; this.querySelector('.industry-icon i').style.color='#ffc107'" onmouseout="this.style.transform='translateY(0)'; this.querySelector('.industry-icon i').style.color='#0d6efd'">
                    <div class="card-body p-4">
                        <div class="industry-icon mb-3 text-center">
                            <i class="bi bi-mortarboard fs-1 text-primary" style="transition: color 0.3s ease;"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2">Education Technology Africa</h3>
                        <p class="card-text small mb-2">School management systems, e-learning platforms, and student portals for African educational institutions.</p>
                        <small class="text-success fw-bold">✓ 80+ Schools Connected</small>
                    </div>
                </div>
            </div>
            
            <!-- Agriculture -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border shadow-sm" style="transition: all 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-8px)'; this.querySelector('.industry-icon i').style.color='#198754'" onmouseout="this.style.transform='translateY(0)'; this.querySelector('.industry-icon i').style.color='#0d6efd'">
                    <div class="card-body p-4">
                        <div class="industry-icon mb-3 text-center">
                            <i class="bi bi-tree fs-1 text-primary" style="transition: color 0.3s ease;"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2">Agriculture & Farming Uganda</h3>
                        <p class="card-text small mb-2">Farm management systems, crop monitoring, and agricultural marketplace platforms for African farmers.</p>
                        <small class="text-success fw-bold">✓ 40+ Farm Solutions</small>
                    </div>
                </div>
            </div>
            
            <!-- Finance & Banking -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border shadow-sm" style="transition: all 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-8px)'; this.querySelector('.industry-icon i').style.color='#0dcaf0'" onmouseout="this.style.transform='translateY(0)'; this.querySelector('.industry-icon i').style.color='#0d6efd'">
                    <div class="card-body p-4">
                        <div class="industry-icon mb-3 text-center">
                            <i class="bi bi-bank fs-1 text-primary" style="transition: color 0.3s ease;"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2">Microfinance & Banking Africa</h3>
                        <p class="card-text small mb-2">Secure banking portals, microfinance systems, and mobile money integration for African financial institutions.</p>
                        <small class="text-success fw-bold">✓ 25+ Financial Platforms</small>
                    </div>
                </div>
            </div>
            
            <!-- Telecommunications -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border shadow-sm" style="transition: all 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-8px)'; this.querySelector('.industry-icon i').style.color='#6f42c1'" onmouseout="this.style.transform='translateY(0)'; this.querySelector('.industry-icon i').style.color='#0d6efd'">
                    <div class="card-body p-4">
                        <div class="industry-icon mb-3 text-center">
                            <i class="bi bi-broadcast fs-1 text-primary" style="transition: color 0.3s ease;"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2">Telecommunications Kenya</h3>
                        <p class="card-text small mb-2">Telecom management systems, customer portals, and network monitoring solutions for African telecom providers.</p>
                        <small class="text-success fw-bold">✓ 15+ Telecom Solutions</small>
                    </div>
                </div>
            </div>
            
            <!-- Real Estate -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border shadow-sm" style="transition: all 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-8px)'; this.querySelector('.industry-icon i').style.color='#fd7e14'" onmouseout="this.style.transform='translateY(0)'; this.querySelector('.industry-icon i').style.color='#0d6efd'">
                    <div class="card-body p-4">
                        <div class="industry-icon mb-3 text-center">
                            <i class="bi bi-building fs-1 text-primary" style="transition: color 0.3s ease;"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2">Real Estate South Africa</h3>
                        <p class="card-text small mb-2">Property listings, virtual tours, and real estate management systems optimized for African property markets.</p>
                        <small class="text-success fw-bold">✓ 60+ Property Platforms</small>
                    </div>
                </div>
            </div>
            
            <!-- Government & NGOs -->
            <div class="col-6 col-md-4 col-lg-3">
                <div class="card h-100 border shadow-sm" style="transition: all 0.3s ease; border-color: #e0e0e0 !important;" onmouseover="this.style.transform='translateY(-8px)'; this.querySelector('.industry-icon i').style.color='#6c757d'" onmouseout="this.style.transform='translateY(0)'; this.querySelector('.industry-icon i').style.color='#0d6efd'">
                    <div class="card-body p-4">
                        <div class="industry-icon mb-3 text-center">
                            <i class="bi bi-shield-check fs-1 text-primary" style="transition: color 0.3s ease;"></i>
                        </div>
                        <h3 class="h6 fw-bold mb-2">Government & NGOs Africa</h3>
                        <p class="card-text small mb-2">Public service portals, citizen engagement platforms, and NGO management systems for African organizations.</p>
                        <small class="text-success fw-bold">✓ 20+ Public Platforms</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Flexible Payment Plans Section -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-warning text-dark px-3 py-2 mb-3 fw-bold">FLEXIBLE PAYMENT OPTIONS</span>
            <h2 class="display-5 fw-bold mb-3">Pay in Installments, Not Upfront</h2>
            <p class="lead text-muted mb-0" style="max-width: 700px; margin: 0 auto;">Get your website, app, or software with just 20% down. Pay the rest daily, weekly, or monthly. Zero interest, zero hidden fees.</p>
        </div>
        
        <div class="row g-4">
            <!-- Daily Payments Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 hover-lift" style="transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 text-center">
                        <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-calendar-day text-primary fs-3"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-3">Daily Payments</h4>
                        <div class="display-6 fw-bold text-primary mb-2">$1.37<small class="fs-6 text-muted">/day</small></div>
                        <p class="text-muted small mb-3">Starting from as low as $1.37 per day for a $500 project</p>
                        <ul class="list-unstyled text-start small text-muted">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Perfect for daily revenue businesses</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Flexible payment schedule</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>No interest charges</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Weekly Payments Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 hover-lift position-relative" style="transition: all 0.3s ease; border: 2px solid #fbbf24 !important;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="position-absolute top-0 start-50 translate-middle">
                        <span class="badge bg-warning text-dark px-3 py-1 fw-bold">MOST POPULAR</span>
                    </div>
                    <div class="card-body p-4 text-center">
                        <div class="bg-warning bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-calendar-week text-warning fs-3"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-3">Weekly Payments</h4>
                        <div class="display-6 fw-bold text-warning mb-2">$9.62<small class="fs-6 text-muted">/week</small></div>
                        <p class="text-muted small mb-3">Starting from $9.62 per week for a $500 project</p>
                        <ul class="list-unstyled text-start small text-muted">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Ideal for growing businesses</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Easy to manage payments</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Most chosen option</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Monthly Payments Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 hover-lift" style="transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 text-center">
                        <div class="bg-success bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 70px; height: 70px;">
                            <i class="bi bi-calendar-month text-success fs-3"></i>
                        </div>
                        <h4 class="h5 fw-bold mb-3">Monthly Payments</h4>
                        <div class="display-6 fw-bold text-success mb-2">$41.67<small class="fs-6 text-muted">/month</small></div>
                        <p class="text-muted small mb-3">Starting from $41.67 per month for a $500 project</p>
                        <ul class="list-unstyled text-start small text-muted">
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Up to 24 months available</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Predictable cash flow</li>
                            <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Best for established businesses</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Payment Calculator Card -->
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 shadow-sm h-100 bg-primary text-white" style="transition: all 0.3s ease;" onmouseover="this.style.transform='translateY(-10px)'" onmouseout="this.style.transform='translateY(0)'">
                    <div class="card-body p-4 d-flex flex-column justify-content-center text-center">
                        <div class="mb-3">
                            <i class="bi bi-calculator fs-1 mb-3 d-block"></i>
                            <h4 class="h5 fw-bold mb-3">Calculate Your Payments</h4>
                            <p class="mb-4 small" style="opacity: 0.9;">Use our interactive calculator to see exactly how much you'll pay</p>
                        </div>
                        <a href="payment-plans.php" class="btn btn-light btn-lg fw-bold w-100 mb-3">
                            <i class="bi bi-calculator me-2"></i>Try Calculator
                        </a>
                        <a href="request-quote.php?plan=monthly" class="btn btn-outline-light w-100">
                            Request Quote
                        </a>
                        <small class="mt-3" style="opacity: 0.8;">
                            <i class="bi bi-shield-check me-1"></i>20% down • 0% interest
                        </small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Trust Indicators -->
        <div class="row mt-5">
            <div class="col-12">
                <div class="bg-white rounded-4 p-4 shadow-sm">
                    <div class="row align-items-center text-center">
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <i class="bi bi-shield-check text-success fs-2 mb-2"></i>
                            <h6 class="fw-bold mb-1">No Hidden Fees</h6>
                            <small class="text-muted">Transparent pricing</small>
                        </div>
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <i class="bi bi-percent text-primary fs-2 mb-2"></i>
                            <h6 class="fw-bold mb-1">0% Interest</h6>
                            <small class="text-muted">Same total cost</small>
                        </div>
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <i class="bi bi-calendar-check text-warning fs-2 mb-2"></i>
                            <h6 class="fw-bold mb-1">Up to 24 Months</h6>
                            <small class="text-muted">Flexible terms</small>
                        </div>
                        <div class="col-md-3 col-6 mb-3 mb-md-0">
                            <i class="bi bi-x-circle text-danger fs-2 mb-2"></i>
                            <h6 class="fw-bold mb-1">Cancel Anytime</h6>
                            <small class="text-muted">No penalties</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced CTA Section -->
<section class="py-5">
    <div class="container">
        <div class="text-center">
            <div class="bg-primary bg-opacity-10 rounded-4 p-5 mx-auto" style="max-width: 900px;">
                <h3 class="h2 fw-bold mb-3">Your Industry Not Listed?</h3>
                <p class="lead mb-4" style="max-width: 700px; margin: 0 auto;">We've successfully delivered solutions across 50+ different business sectors in Africa. Every solution is custom-built for your specific industry needs.</p>
                <div class="d-flex flex-wrap justify-content-center gap-3 mb-4">
                    <a href="request-quote.php" class="btn btn-primary btn-lg px-5 py-3 fw-bold">Get Custom Industry Solution</a>
                    <a href="tel:+256200948420" class="btn btn-outline-primary btn-lg px-5 py-3">Call: +256 200 948 420</a>
                </div>
                <div class="mt-3">
                    <small class="text-muted fw-bold">✓ Free consultation ✓ Industry-specific demo ✓ Local payment integration</small>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Include footer
include_once 'includes/footer.php';
?>
