<?php
// Include header
include_once 'includes/header.php';
?>

<!-- Hero Section - Modern Clean Design -->
<section class="hero-modern py-5 py-lg-6" style="background: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%); min-height: 90vh; display: flex; align-items: center;">
    <div class="container">
        <div class="row align-items-center g-5">
            <!-- Left Content -->
            <div class="col-lg-6">
                <!-- Trust Badge -->
                <div class="d-inline-flex align-items-center gap-2 mb-4 px-3 py-2 rounded-pill" style="background: #f0fdf4; border: 1px solid #bbf7d0;">
                    <span class="d-flex align-items-center justify-content-center rounded-circle" style="width: 24px; height: 24px; background: #10b981;">
                        <i class="bi bi-check2 text-white" style="font-size: 14px;"></i>
                    </span>
                    <span style="color: #166534; font-weight: 600; font-size: 0.875rem;">Trusted by 1,200+ businesses across Africa</span>
                </div>
                
                <!-- Main Headline -->
                <h1 class="display-4 fw-bold mb-4" style="color: #111827; line-height: 1.1; letter-spacing: -0.02em;">
                    Build Your Digital Presence with <span style="color: #10b981;">Expert Solutions</span>
                </h1>
                
                <!-- Subheadline -->
                <p class="lead mb-4" style="color: #4b5563; font-size: 1.25rem; line-height: 1.7; max-width: 540px;">
                    Professional websites, mobile apps, and enterprise software delivered in as little as 3 days. Affordable pricing for African businesses.
                </p>
                
                <!-- CTA Buttons -->
                <div class="d-flex flex-wrap gap-3 mb-5">
                    <a href="request-quote.php" class="btn btn-lg px-4 py-3 d-inline-flex align-items-center" style="background: #111827; color: #fff; border-radius: 10px; font-weight: 600;">
                        Get a Free Quote
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                    <a href="services.php" class="btn btn-lg px-4 py-3 d-inline-flex align-items-center" style="background: #fff; color: #374151; border: 1px solid #e5e7eb; border-radius: 10px; font-weight: 600;">
                        <i class="bi bi-play-circle me-2"></i>
                        View Our Work
                    </a>
                </div>
                
                <!-- Stats Row -->
                <div class="d-flex flex-wrap gap-4 pt-4" style="border-top: 1px solid #e5e7eb;">
                    <div>
                        <div class="fw-bold" style="font-size: 2rem; color: #111827;">1,200+</div>
                        <div style="color: #6b7280; font-size: 0.875rem;">Websites Built</div>
                    </div>
                    <div>
                        <div class="fw-bold" style="font-size: 2rem; color: #111827;">100+</div>
                        <div style="color: #6b7280; font-size: 0.875rem;">Mobile Apps</div>
                    </div>
                    <div>
                        <div class="fw-bold" style="font-size: 2rem; color: #111827;">4.8</div>
                        <div class="d-flex align-items-center gap-1">
                            <i class="bi bi-star-fill" style="color: #fbbf24; font-size: 12px;"></i>
                            <span style="color: #6b7280; font-size: 0.875rem;">Rating</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Right Content - Feature Cards -->
            <div class="col-lg-6">
                <div class="position-relative">
                    <!-- Main Card -->
                    <div class="card border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">
                        <div class="card-body p-0">
                            <!-- Browser Mockup Header -->
                            <div class="d-flex align-items-center gap-2 px-4 py-3" style="background: #1f2937;">
                                <div class="d-flex gap-2">
                                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #ef4444;"></span>
                                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #fbbf24;"></span>
                                    <span style="width: 12px; height: 12px; border-radius: 50%; background: #22c55e;"></span>
                                </div>
                                <div class="flex-grow-1 mx-3">
                                    <div class="d-flex align-items-center justify-content-center px-3 py-1 rounded-pill" style="background: #374151; max-width: 300px; margin: 0 auto;">
                                        <i class="bi bi-lock-fill me-2" style="color: #9ca3af; font-size: 10px;"></i>
                                        <span style="color: #9ca3af; font-size: 12px;">yourbusiness.com</span>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Website Preview Content -->
                            <div class="p-4" style="background: linear-gradient(135deg, #f8fafc 0%, #ffffff 100%);">
                                <div class="text-center py-4">
                                    <div class="mb-3">
                                        <span class="d-inline-block px-3 py-1 rounded-pill" style="background: #ecfdf5; color: #059669; font-size: 0.75rem; font-weight: 600;">YOUR WEBSITE</span>
                                    </div>
                                    <h3 class="fw-bold mb-2" style="color: #111827;">Welcome to Your Business</h3>
                                    <p style="color: #6b7280; font-size: 0.9rem;">Professional website ready in 3 days</p>
                                    <div class="d-flex justify-content-center gap-2 mt-3">
                                        <span class="px-3 py-2 rounded" style="background: #111827; color: #fff; font-size: 0.8rem;">Get Started</span>
                                        <span class="px-3 py-2 rounded" style="background: #f3f4f6; color: #374151; font-size: 0.8rem;">Learn More</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Badge - Timeline -->
                    <div class="position-absolute d-none d-lg-block" style="bottom: -20px; left: -30px; z-index: 10;">
                        <div class="bg-white rounded-3 shadow-lg p-3" style="min-width: 200px;">
                            <div class="d-flex align-items-center gap-3 mb-2">
                                <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 40px; height: 40px; background: #ecfdf5;">
                                    <i class="bi bi-lightning-charge-fill" style="color: #10b981;"></i>
                                </div>
                                <div>
                                    <div class="fw-bold" style="color: #111827; font-size: 0.9rem;">3-Day Delivery</div>
                                    <div style="color: #6b7280; font-size: 0.75rem;">Fast turnaround time</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Floating Badge - Rating -->
                    <div class="position-absolute d-none d-lg-block" style="top: 20px; right: -20px; z-index: 10;">
                        <div class="bg-white rounded-3 shadow-lg p-3">
                            <div class="d-flex align-items-center gap-1 mb-1">
                                <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                                <i class="bi bi-star-fill" style="color: #fbbf24;"></i>
                            </div>
                            <div style="color: #111827; font-size: 0.8rem; font-weight: 600;">4.8/5 on Trustpilot</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Clients & Logos Section -->
<section class="py-5" style="background: #fff; border-top: 1px solid #f1f5f9; border-bottom: 1px solid #f1f5f9;">
    <div class="container">
        <p class="text-center mb-4" style="color: #9ca3af; font-size: 0.875rem; font-weight: 500; text-transform: uppercase; letter-spacing: 0.05em;">Trusted by businesses across Africa</p>
        <div class="row align-items-center justify-content-center g-4">
            <div class="col-6 col-md-2 text-center">
                <div class="p-3 rounded-3" style="background: #f9fafb;">
                    <span style="font-weight: 700; color: #374151; font-size: 1.1rem;">1,200+</span>
                    <span class="d-block" style="color: #9ca3af; font-size: 0.75rem;">Websites</span>
                </div>
            </div>
            <div class="col-6 col-md-2 text-center">
                <div class="p-3 rounded-3" style="background: #f9fafb;">
                    <span style="font-weight: 700; color: #374151; font-size: 1.1rem;">300+</span>
                    <span class="d-block" style="color: #9ca3af; font-size: 0.75rem;">Domains</span>
                </div>
            </div>
            <div class="col-6 col-md-2 text-center">
                <div class="p-3 rounded-3" style="background: #f9fafb;">
                    <span style="font-weight: 700; color: #374151; font-size: 1.1rem;">100+</span>
                    <span class="d-block" style="color: #9ca3af; font-size: 0.75rem;">Mobile Apps</span>
                </div>
            </div>
            <div class="col-6 col-md-2 text-center">
                <div class="p-3 rounded-3" style="background: #f9fafb;">
                    <span style="font-weight: 700; color: #374151; font-size: 1.1rem;">20+</span>
                    <span class="d-block" style="color: #9ca3af; font-size: 0.75rem;">Countries</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-5" style="background: #f9fafb;">
    <div class="container">
        <div class="text-center mb-5">
            <span class="d-inline-block px-3 py-1 rounded-pill mb-3" style="background: #ecfdf5; color: #059669; font-size: 0.8rem; font-weight: 600;">OUR SERVICES</span>
            <h2 class="fw-bold mb-3" style="color: #111827; font-size: 2.25rem;">Everything You Need to Succeed Online</h2>
            <p style="color: #6b7280; font-size: 1.1rem; max-width: 600px; margin: 0 auto;">From websites to mobile apps, we provide end-to-end digital solutions for your business.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="h-100 p-4 bg-white rounded-4" style="border: 1px solid #e5e7eb; transition: all 0.2s ease;">
                    <div class="d-flex align-items-center justify-content-center mb-3 rounded-3" style="width: 56px; height: 56px; background: #ecfdf5;">
                        <i class="bi bi-globe" style="font-size: 1.5rem; color: #10b981;"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #111827;">Website Design</h4>
                    <p style="color: #6b7280; font-size: 0.95rem;">Professional, responsive websites that convert visitors into customers. Ready in 3 days.</p>
                    <a href="services.php" class="text-decoration-none fw-semibold" style="color: #10b981;">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-100 p-4 bg-white rounded-4" style="border: 1px solid #e5e7eb; transition: all 0.2s ease;">
                    <div class="d-flex align-items-center justify-content-center mb-3 rounded-3" style="width: 56px; height: 56px; background: #fef3c7;">
                        <i class="bi bi-phone" style="font-size: 1.5rem; color: #f59e0b;"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #111827;">Mobile Apps</h4>
                    <p style="color: #6b7280; font-size: 0.95rem;">Native iOS and Android apps that engage your customers and grow your business.</p>
                    <a href="services.php" class="text-decoration-none fw-semibold" style="color: #f59e0b;">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="h-100 p-4 bg-white rounded-4" style="border: 1px solid #e5e7eb; transition: all 0.2s ease;">
                    <div class="d-flex align-items-center justify-content-center mb-3 rounded-3" style="width: 56px; height: 56px; background: #ede9fe;">
                        <i class="bi bi-server" style="font-size: 1.5rem; color: #8b5cf6;"></i>
                    </div>
                    <h4 class="fw-bold mb-2" style="color: #111827;">Web Hosting</h4>
                    <p style="color: #6b7280; font-size: 0.95rem;">Fast, secure hosting with 99.9% uptime. Free SSL certificates included.</p>
                    <a href="https://clients.appnomu.com" class="text-decoration-none fw-semibold" style="color: #8b5cf6;">Learn more <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
        
        <div class="text-center mt-5">
            <a href="services.php" class="btn px-4 py-3" style="background: #111827; color: #fff; border-radius: 10px; font-weight: 600;">
                View All Services <i class="bi bi-arrow-right ms-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="py-5" style="background: #fff;">
    <div class="container">
        <div class="row align-items-center g-5">
            <div class="col-lg-6">
                <span class="d-inline-block px-3 py-1 rounded-pill mb-3" style="background: #f0fdf4; color: #166534; font-size: 0.8rem; font-weight: 600;">WHY CHOOSE US</span>
                <h2 class="fw-bold mb-4" style="color: #111827; font-size: 2.25rem; line-height: 1.2;">Why Smart Businesses Choose AppNomu</h2>
                <p class="mb-4" style="color: #6b7280; font-size: 1.1rem; line-height: 1.7;">While others take weeks or months, we deliver professional websites in just 3 days. Here's what makes us different:</p>
                
                <div class="d-flex flex-column gap-4">
                    <div class="d-flex align-items-start gap-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-3" style="width: 48px; height: 48px; background: #ecfdf5;">
                            <i class="bi bi-lightning-charge-fill" style="color: #10b981; font-size: 1.25rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1" style="color: #111827;">3-Day Delivery</h5>
                            <p class="mb-0" style="color: #6b7280; font-size: 0.95rem;">Get your website live in 3 days, not 3 months. Start attracting customers immediately.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-3" style="width: 48px; height: 48px; background: #fef3c7;">
                            <i class="bi bi-shield-check" style="color: #f59e0b; font-size: 1.25rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1" style="color: #111827;">100% Satisfaction Guarantee</h5>
                            <p class="mb-0" style="color: #6b7280; font-size: 0.95rem;">Not happy? We'll revise it until you love it, or give you a full refund.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-3" style="width: 48px; height: 48px; background: #ede9fe;">
                            <i class="bi bi-credit-card" style="color: #8b5cf6; font-size: 1.25rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1" style="color: #111827;">Flexible Payment Plans</h5>
                            <p class="mb-0" style="color: #6b7280; font-size: 0.95rem;">Pay in installments. Just 20% down, then pay daily, weekly, or monthly.</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div class="d-flex align-items-center justify-content-center flex-shrink-0 rounded-3" style="width: 48px; height: 48px; background: #fce7f3;">
                            <i class="bi bi-headset" style="color: #ec4899; font-size: 1.25rem;"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold mb-1" style="color: #111827;">24/7 Support</h5>
                            <p class="mb-0" style="color: #6b7280; font-size: 0.95rem;">Your success is our success. We're always here to help you grow.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://services.appnomu.com/assets/images/Hero_Website.jpg" alt="Why Choose AppNomu" class="img-fluid rounded-4 shadow-lg" style="width: 100%;">
                    <!-- Floating Card -->
                    <div class="position-absolute d-none d-lg-block bg-white rounded-3 shadow-lg p-3" style="bottom: -20px; left: -20px;">
                        <div class="d-flex align-items-center gap-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle" style="width: 48px; height: 48px; background: #111827;">
                                <span class="fw-bold text-white">20+</span>
                            </div>
                            <div>
                                <div class="fw-bold" style="color: #111827; font-size: 0.9rem;">Expert Developers</div>
                                <div style="color: #6b7280; font-size: 0.75rem;">Across Africa & beyond</div>
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
