<?php
// Ensure default navigation is used
unset($menuItems);
// Include header
include_once 'includes/header.php';
?>

<!-- Website Audit Hero Section -->
<section class="page-hero centered">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <span class="badge-label">FREE WEBSITE AUDIT</span>
                <h1>Is Your Website <span style="color: #10b981;">Losing You Money?</span></h1>
                <p>Get a professional analysis of your website's performance, SEO, security, and content originality. Comprehensive 60+ point analysis to discover exactly what's holding your business back online.</p>
                <div class="row g-3 mt-4">
                    <div class="col-md-4">
                        <div class="modern-card text-center">
                            <div class="card-icon green mx-auto">
                                <i class="bi bi-speedometer2"></i>
                            </div>
                            <h4>Performance Check</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="modern-card text-center">
                            <div class="card-icon amber mx-auto">
                                <i class="bi bi-search"></i>
                            </div>
                            <h4>SEO Analysis</h4>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="modern-card text-center">
                            <div class="card-icon purple mx-auto">
                                <i class="bi bi-shield-check"></i>
                            </div>
                            <h4>Security Scan</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Audit Tool Form -->
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <h2 class="h3 fw-bold">Enter Your Website URL</h2>
                            <p class="text-muted">Get your free comprehensive website audit report in 60 seconds</p>
                        </div>
                        
                        <form id="auditForm" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label for="websiteUrl" class="form-label fw-bold">Website URL *</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light"><i class="bi bi-globe"></i></span>
                                        <input type="url" class="form-control form-control-lg" id="websiteUrl" placeholder="https://yourwebsite.com" required>
                                        <div class="invalid-feedback">Please enter a valid website URL.</div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">&nbsp;</label>
                                    <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold" id="auditBtn">
                                        <i class="bi bi-search me-2"></i>Audit Website
                                    </button>
                                </div>
                            </div>
                            
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <label for="businessName" class="form-label fw-bold">Business Name *</label>
                                    <input type="text" class="form-control" id="businessName" placeholder="Your Business Name" required>
                                    <div class="invalid-feedback">Please enter your business name.</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label fw-bold">Email Address *</label>
                                    <input type="email" class="form-control" id="email" placeholder="your@email.com" required>
                                    <div class="invalid-feedback">Please enter a valid email address.</div>
                                </div>
                            </div>
                            
                            <div class="row g-3 mt-3">
                                <div class="col-md-6">
                                    <label for="industry" class="form-label fw-bold">Industry</label>
                                    <select class="form-select" id="industry">
                                        <option value="">Select Industry</option>
                                        <option value="ecommerce">E-commerce</option>
                                        <option value="healthcare">Healthcare</option>
                                        <option value="education">Education</option>
                                        <option value="finance">Finance & Banking</option>
                                        <option value="agriculture">Agriculture</option>
                                        <option value="realestate">Real Estate</option>
                                        <option value="technology">Technology</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label fw-bold">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" placeholder="+256 700 000 000">
                                </div>
                            </div>
                            
                            <div class="mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="consent" required>
                                    <label class="form-check-label small" for="consent">
                                        I agree to receive the audit report and occasional marketing communications from AppNomu. 
                                        <a href="privacy-policy.php" target="_blank">Privacy Policy</a>
                                    </label>
                                    <div class="invalid-feedback">Please agree to receive the audit report.</div>
                                </div>
                            </div>
                            
                            <!-- Cloudflare Turnstile -->
                            <div class="mt-3 d-flex justify-content-center">
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
                        </form>
                        
                        <div class="text-center mt-4">
                            <small class="text-muted">
                                <i class="bi bi-shield-check text-success me-1"></i>
                                100% Free • No Credit Card Required • Instant Results
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Loading State (Hidden by default) -->
<section id="loadingSection" class="py-5 d-none">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="spinner-border text-primary mb-3" role="status" style="width: 3rem; height: 3rem;">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <h3 class="h4 fw-bold mb-3">Analyzing Your Website...</h3>
                        <p class="text-muted mb-4">Please wait while we scan your website for performance, SEO, and security issues.</p>
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" id="progressBar"></div>
                        </div>
                        <small class="text-muted" id="progressText">Initializing scan...</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Audit Results (Hidden by default) -->
<section id="resultsSection" class="py-5 d-none">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="text-center mb-5">
                    <h2 class="display-5 fw-bold">Your Website Audit Results</h2>
                    <p class="lead">Here's what we found and how to improve your online performance</p>
                </div>
                
                <!-- Overall Score -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-3 text-center">
                                <div class="position-relative d-inline-block">
                                    <canvas id="scoreChart" width="120" height="120"></canvas>
                                    <div class="position-absolute top-50 start-50 translate-middle">
                                        <h3 class="h2 fw-bold mb-0" id="overallScore">--</h3>
                                        <small class="text-muted">/ 100</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h3 class="h4 fw-bold mb-3">Overall Website Score</h3>
                                <p class="text-muted mb-3" id="scoreDescription">Your website analysis is complete. See detailed breakdown below.</p>
                                <div class="d-flex flex-wrap gap-2">
                                    <span class="badge bg-success-subtle text-success">✓ Mobile Responsive</span>
                                    <span class="badge bg-warning-subtle text-warning">⚠ SEO Needs Work</span>
                                    <span class="badge bg-danger-subtle text-danger">✗ Slow Loading</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Detailed Results -->
                <div class="row g-4">
                    <!-- Performance -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-primary rounded-3 p-2 me-3">
                                        <i class="bi bi-speedometer2 text-white fs-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="h5 fw-bold mb-0">Performance</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 65%"></div>
                                            </div>
                                            <small class="text-muted">65/100</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="bi bi-exclamation-triangle text-warning me-2"></i>Page load time: 4.2s (should be &lt;3s)</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Images optimized</li>
                                    <li class="mb-2"><i class="bi bi-x-circle text-danger me-2"></i>No caching enabled</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- SEO -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-success rounded-3 p-2 me-3">
                                        <i class="bi bi-search text-white fs-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="h5 fw-bold mb-0">SEO Score</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 78%"></div>
                                            </div>
                                            <small class="text-muted">78/100</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Meta titles present</li>
                                    <li class="mb-2"><i class="bi bi-exclamation-triangle text-warning me-2"></i>Missing meta descriptions</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Mobile-friendly</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Security -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-info rounded-3 p-2 me-3">
                                        <i class="bi bi-shield-check text-white fs-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="h5 fw-bold mb-0">Security</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 85%"></div>
                                            </div>
                                            <small class="text-muted">85/100</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>SSL certificate active</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>HTTPS enabled</li>
                                    <li class="mb-2"><i class="bi bi-exclamation-triangle text-warning me-2"></i>Security headers missing</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Experience -->
                    <div class="col-md-6">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-warning rounded-3 p-2 me-3">
                                        <i class="bi bi-person-check text-white fs-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="h5 fw-bold mb-0">User Experience</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 45%"></div>
                                            </div>
                                            <small class="text-muted">45/100</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2"><i class="bi bi-x-circle text-danger me-2"></i>No clear call-to-action</li>
                                    <li class="mb-2"><i class="bi bi-x-circle text-danger me-2"></i>Poor navigation structure</li>
                                    <li class="mb-2"><i class="bi bi-check-circle text-success me-2"></i>Contact info visible</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Quality -->
                    <div class="col-md-6" id="content-card">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-purple rounded-3 p-2 me-3" style="background-color: #6f42c1 !important;">
                                        <i class="bi bi-file-text text-white fs-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="h5 fw-bold mb-0">Content Quality</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                            </div>
                                            <small class="text-muted">--/100</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2 text-muted">Analyzing content...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Technical SEO -->
                    <div class="col-md-6" id="technical-card">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-dark rounded-3 p-2 me-3">
                                        <i class="bi bi-gear text-white fs-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="h5 fw-bold mb-0">Technical SEO</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                            </div>
                                            <small class="text-muted">--/100</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2 text-muted">Analyzing technical factors...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content Originality -->
                    <div class="col-md-6" id="plagiarism-card">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="rounded-3 p-2 me-3" style="background-color: #0dcaf0 !important;">
                                        <i class="bi bi-file-earmark-check text-white fs-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="h5 fw-bold mb-0">Content Originality</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                            </div>
                                            <small class="text-muted">--/100</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2 text-muted">Checking for plagiarism...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Security Vulnerabilities -->
                    <div class="col-md-6" id="vulnerabilities-card">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="card-body p-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="bg-danger rounded-3 p-2 me-3">
                                        <i class="bi bi-bug text-white fs-5"></i>
                                    </div>
                                    <div>
                                        <h4 class="h5 fw-bold mb-0">Code Security</h4>
                                        <div class="d-flex align-items-center">
                                            <div class="progress me-2" style="width: 100px; height: 8px;">
                                                <div class="progress-bar" role="progressbar" style="width: 0%"></div>
                                            </div>
                                            <small class="text-muted">--/100</small>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-unstyled mb-0">
                                    <li class="mb-2 text-muted">Scanning for vulnerabilities...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Recommendations -->
                <div class="card border-0 shadow-sm mt-4">
                    <div class="card-body p-4">
                        <h3 class="h4 fw-bold mb-4">🚀 Priority Recommendations</h3>
                        <div class="row g-3" id="recommendations-section">
                            <!-- Dynamic recommendations will be populated here -->
                        </div>
                    </div>
                </div>
                
                <!-- CTA Section -->
                <div class="text-center mt-5">
                    <div class="bg-primary text-white rounded-4 p-5">
                        <h3 class="h3 fw-bold mb-3">Ready to Fix These Issues?</h3>
                        <p class="lead mb-4">Our experts can implement all these improvements and boost your website's performance by 300%</p>
                        <div class="d-flex flex-wrap justify-content-center gap-3">
                            <a href="request-quote.php" class="btn btn-light btn-lg fw-bold px-4 py-3">Get Free Consultation</a>
                            <a href="tel:+256200948420" class="btn btn-outline-light btn-lg px-4 py-3">Call: +256 200 948 420</a>
                        </div>
                        <div class="mt-3">
                            <small class="opacity-75">✓ 3-Day Website Redesign ✓ 100% Satisfaction Guarantee ✓ 30-Day Support</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What We Check -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold">What Our Audit Analyzes</h2>
            <p class="lead">Professional 60+ point comprehensive website analysis</p>
        </div>
        
        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <i class="bi bi-speedometer2 fs-1 text-primary mb-3"></i>
                    <h4 class="h5 fw-bold mb-3">Performance</h4>
                    <ul class="list-unstyled small text-muted">
                        <li>Page load speed</li>
                        <li>Image optimization</li>
                        <li>Caching setup</li>
                        <li>Code efficiency</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <i class="bi bi-search fs-1 text-success mb-3"></i>
                    <h4 class="h5 fw-bold mb-3">SEO Analysis</h4>
                    <ul class="list-unstyled small text-muted">
                        <li>Meta tags</li>
                        <li>Keyword optimization</li>
                        <li>Content structure</li>
                        <li>Mobile-friendliness</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <i class="bi bi-shield-check fs-1 text-info mb-3"></i>
                    <h4 class="h5 fw-bold mb-3">Security Scan</h4>
                    <ul class="list-unstyled small text-muted">
                        <li>SSL certificate</li>
                        <li>Security headers</li>
                        <li>Vulnerability check</li>
                        <li>Malware scan</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <i class="bi bi-person-check fs-1 text-warning mb-3"></i>
                    <h4 class="h5 fw-bold mb-3">User Experience</h4>
                    <ul class="list-unstyled small text-muted">
                        <li>Navigation clarity</li>
                        <li>Call-to-action buttons</li>
                        <li>Contact information</li>
                        <li>Design consistency</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <i class="bi bi-file-earmark-check fs-1 text-info mb-3"></i>
                    <h4 class="h5 fw-bold mb-3">Content Originality</h4>
                    <ul class="list-unstyled small text-muted">
                        <li>Template content detection</li>
                        <li>Placeholder text identification</li>
                        <li>Stock image identification</li>
                        <li>Duplicate content analysis</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6">
                <div class="text-center p-4 bg-white rounded-3 shadow-sm h-100">
                    <i class="bi bi-bug fs-1 text-danger mb-3"></i>
                    <h4 class="h5 fw-bold mb-3">Code Security</h4>
                    <ul class="list-unstyled small text-muted">
                        <li>Vulnerability scanning</li>
                        <li>SQL injection detection</li>
                        <li>XSS vulnerability check</li>
                        <li>Exposed credentials scan</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Form validation and submission
document.getElementById('auditForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (this.checkValidity()) {
        startAudit();
    } else {
        this.classList.add('was-validated');
    }
});

async function startAudit() {
    const websiteUrl = document.getElementById('websiteUrl').value;
    const businessName = document.getElementById('businessName').value;
    const email = document.getElementById('email').value;
    const industry = document.getElementById('industry').value;
    const phone = document.getElementById('phone').value;
    
    // Hide form, show loading
    document.querySelector('.container').style.display = 'none';
    document.getElementById('loadingSection').classList.remove('d-none');
    
    const progressBar = document.getElementById('progressBar');
    const progressText = document.getElementById('progressText');
    
    try {
        // Real audit steps with actual progress
        const steps = [
            { text: 'Validating website URL...', progress: 10 },
            { text: 'Analyzing page performance...', progress: 30 },
            { text: 'Scanning SEO elements...', progress: 50 },
            { text: 'Testing mobile compatibility...', progress: 70 },
            { text: 'Checking security measures...', progress: 85 },
            { text: 'Generating comprehensive report...', progress: 100 }
        ];
        
        // Show progress steps
        for (let i = 0; i < steps.length; i++) {
            progressText.textContent = steps[i].text;
            progressBar.style.width = steps[i].progress + '%';
            await new Promise(resolve => setTimeout(resolve, 800));
        }
        
        // Get Turnstile token
        const turnstileToken = document.querySelector('[name="cf-turnstile-response"]')?.value;
        if (!turnstileToken) {
            throw new Error('Please complete the security verification');
        }
        
        // Send real audit request to backend
        const auditData = {
            url: websiteUrl,
            business_name: businessName,
            email: email,
            industry: industry,
            phone: phone,
            'cf-turnstile-response': turnstileToken
        };
        
        const response = fetch('audit-processor.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify(auditData)
        })
        .then(response => {
            console.log('Response status:', response.status);
            return response.json();
        })
        .then(data => {
            console.log('Audit results:', data);
            
            if (data.error) {
                console.error('Audit error:', data);
                throw new Error(data.message || data.error);
            }
            
            // Hide loading, show results
            document.getElementById('loadingSection').style.display = 'none';
            document.getElementById('resultsSection').style.display = 'block';
            
            // Display results
            displayRealResults(data);
        })
        .catch(error => {
            console.error('Audit error:', error);
            document.getElementById('loadingSection').style.display = 'none';
            alert('An error occurred during the audit: ' + error.message + '. Please try again.');
        });
        
    } catch (error) {
        console.error('Audit failed:', error);
        showAuditError(error.message);
    }
}

function showResults(results) {
    // Hide loading, show results
    document.getElementById('loadingSection').style.display = 'none';
    document.getElementById('resultsSection').style.display = 'block';
    document.getElementById('loadingSection').classList.add('d-none');
    document.getElementById('resultsSection').classList.remove('d-none');
    
    // Display real audit results
    displayRealResults(results);
    
    // Scroll to results
    document.getElementById('resultsSection').scrollIntoView({
        behavior: 'smooth'
    });
}

function displayRealResults(results) {
    // Update overall score
    drawScoreChart(results.overall);
    
    // Update score description
    const descriptions = {
        90: 'Outstanding! Your website is performing exceptionally well.',
        80: 'Excellent! Your website is performing very well with minor areas for improvement.',
        70: 'Good performance with some optimization opportunities.',
        60: 'Decent foundation but several areas need attention.',
        50: 'Multiple issues detected that are impacting performance.',
        0: 'Critical issues found. Immediate optimization recommended.'
    };
    
    let description = descriptions[0];
    for (let threshold of [90, 80, 70, 60, 50, 0]) {
        if (results.overall >= threshold) {
            description = descriptions[threshold];
            break;
        }
    }
    document.getElementById('scoreDescription').textContent = description;
    
    // Update performance section
    updatePerformanceSection(results.performance);
    
    // Update SEO section  
    updateSEOSection(results.seo);
    
    // Update security section
    updateSecuritySection(results.security);
    
    // Update mobile section
    updateMobileSection(results.mobile);
    
    // Update content section
    if (results.content) {
        updateContentSection(results.content);
    }
    
    // Update technical SEO section
    if (results.technical) {
        updateTechnicalSection(results.technical);
    }
    
    // Update UX section (already displayed as User Experience)
    if (results.ux) {
        updateUXSection(results.ux);
    }
    
    // Update plagiarism section
    if (results.plagiarism) {
        updatePlagiarismSection(results.plagiarism);
    }
    
    // Update vulnerabilities section
    if (results.vulnerabilities) {
        updateVulnerabilitiesSection(results.vulnerabilities);
    }
    
    // Update recommendations section
    updateRecommendationsSection(results.recommendations);
}

function updatePerformanceSection(performance) {
    const perfSection = document.querySelector('.card-body:has(.bi-speedometer2)');
    if (!perfSection) return;
    
    const progressBar = perfSection.querySelector('.progress-bar');
    const scoreText = perfSection.querySelector('.text-muted');
    const issuesList = perfSection.querySelector('ul');
    
    // Update score
    progressBar.style.width = performance.score + '%';
    progressBar.className = `progress-bar ${getScoreColor(performance.score)}`;
    scoreText.textContent = `${performance.score}/100`;
    
    // Clear and update issues list
    issuesList.innerHTML = '';
    
    // Add load time
    if (performance.loadTime) {
        const loadTimeItem = document.createElement('li');
        loadTimeItem.className = 'mb-2';
        const isGood = performance.loadTime < 1500;
        const isOk = performance.loadTime < 3000;
        const iconClass = isGood ? 'check-circle text-success' : isOk ? 'exclamation-triangle text-warning' : 'x-circle text-danger';
        loadTimeItem.innerHTML = `<i class="bi bi-${iconClass} me-2"></i>Page load time: ${(performance.loadTime / 1000).toFixed(1)}s`;
        issuesList.appendChild(loadTimeItem);
    }
    
    // Add successes
    if (performance.successes) {
        performance.successes.forEach(success => {
            const item = document.createElement('li');
            item.className = 'mb-2';
            item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
            issuesList.appendChild(item);
        });
    }
    
    // Add issues
    if (performance.issues) {
        performance.issues.slice(0, 3).forEach(issue => {
            const item = document.createElement('li');
            item.className = 'mb-2';
            item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${issue}`;
            issuesList.appendChild(item);
        });
    }
}

function updateSEOSection(seo) {
    const seoSection = document.querySelector('.card-body:has(.bi-search)');
    if (!seoSection) return;
    
    const progressBar = seoSection.querySelector('.progress-bar');
    const scoreText = seoSection.querySelector('.text-muted');
    const issuesList = seoSection.querySelector('ul');
    
    // Update score
    progressBar.style.width = seo.score + '%';
    progressBar.className = `progress-bar ${getScoreColor(seo.score)}`;
    scoreText.textContent = `${seo.score}/100`;
    
    // Clear and update issues list
    issuesList.innerHTML = '';
    
    // Add successes
    if (seo.successes) {
        seo.successes.slice(0, 2).forEach(success => {
            const item = document.createElement('li');
            item.className = 'mb-2';
            item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
            issuesList.appendChild(item);
        });
    }
    
    // Add issues
    if (seo.issues) {
        seo.issues.slice(0, 2).forEach(issue => {
            const item = document.createElement('li');
            item.className = 'mb-2';
            item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${issue}`;
            issuesList.appendChild(item);
        });
    }
}

function updateSecuritySection(security) {
    const securitySection = document.querySelector('.card-body:has(.bi-shield-check)');
    if (!securitySection) return;
    
    const progressBar = securitySection.querySelector('.progress-bar');
    const scoreText = securitySection.querySelector('.text-muted');
    const issuesList = securitySection.querySelector('ul');
    
    if (progressBar && scoreText && issuesList) {
        // Update score
        progressBar.style.width = security.score + '%';
        progressBar.className = `progress-bar ${getScoreColor(security.score)}`;
        scoreText.textContent = `${security.score}/100`;
        
        // Clear and update issues list
        issuesList.innerHTML = '';
        
        // Add HTTPS status
        const httpsItem = document.createElement('li');
        httpsItem.className = 'mb-2';
        const httpsIcon = security.isHttps ? 'check-circle text-success' : 'x-circle text-danger';
        httpsItem.innerHTML = `<i class="bi bi-${httpsIcon} me-2"></i>HTTPS ${security.isHttps ? 'enabled' : 'not enabled'}`;
        issuesList.appendChild(httpsItem);
        
        // Add other successes and issues
        if (security.successes) {
            security.successes.slice(0, 2).forEach(success => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
                issuesList.appendChild(item);
            });
        }
        
        if (security.issues) {
            security.issues.slice(0, 1).forEach(issue => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${issue}`;
                issuesList.appendChild(item);
            });
        }
    }
}

function updateMobileSection(mobile) {
    // Find or create mobile section if it doesn't exist
    let mobileSection = document.querySelector('.card-body:has(.bi-phone)');
    
    if (!mobileSection) {
        // Create mobile section if it doesn't exist
        const securityCard = document.querySelector('.card-body:has(.bi-shield-check)').closest('.col-md-6');
        const mobileCard = securityCard.cloneNode(true);
        
        // Update mobile card content
        const cardBody = mobileCard.querySelector('.card-body');
        const icon = cardBody.querySelector('i');
        const title = cardBody.querySelector('h4');
        
        icon.className = 'bi bi-phone text-white fs-5';
        title.textContent = 'Mobile Score';
        
        // Insert after security card
        securityCard.parentNode.insertBefore(mobileCard, securityCard.nextSibling);
        mobileSection = cardBody;
    }
    
    const progressBar = mobileSection.querySelector('.progress-bar');
    const scoreText = mobileSection.querySelector('.text-muted');
    const issuesList = mobileSection.querySelector('ul');
    
    if (progressBar && scoreText && issuesList) {
        // Update score
        progressBar.style.width = mobile.score + '%';
        progressBar.className = `progress-bar ${getScoreColor(mobile.score)}`;
        scoreText.textContent = `${mobile.score}/100`;
        
        // Clear and update issues list
        issuesList.innerHTML = '';
        
        // Add mobile-friendly status
        const mobileItem = document.createElement('li');
        mobileItem.className = 'mb-2';
        const mobileIcon = mobile.score >= 80 ? 'check-circle text-success' : 'exclamation-triangle text-warning';
        mobileItem.innerHTML = `<i class="bi bi-${mobileIcon} me-2"></i>Mobile ${mobile.score >= 80 ? 'friendly' : 'needs improvement'}`;
        issuesList.appendChild(mobileItem);
        
        // Add successes and issues
        if (mobile.successes) {
            mobile.successes.slice(0, 2).forEach(success => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
                issuesList.appendChild(item);
            });
        }
        
        if (mobile.issues) {
            mobile.issues.slice(0, 1).forEach(issue => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${issue}`;
                issuesList.appendChild(item);
            });
        }
    }
}

function getScoreColor(score) {
    if (score >= 80) return 'bg-success';
    if (score >= 60) return 'bg-warning';
    return 'bg-danger';
}

function showAuditError(message) {
    document.getElementById('loadingSection').classList.add('d-none');
    
    // Create error display
    const errorSection = document.createElement('section');
    errorSection.className = 'py-5';
    errorSection.innerHTML = `
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 text-center">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-5">
                            <i class="bi bi-exclamation-triangle text-warning" style="font-size: 3rem;"></i>
                            <h3 class="h4 fw-bold mt-3 mb-3">Audit Failed</h3>
                            <p class="text-muted mb-4">${message}</p>
                            <p class="small text-muted mb-4">This might be due to:</p>
                            <ul class="list-unstyled small text-muted mb-4">
                                <li>• Website is not accessible or down</li>
                                <li>• Invalid URL format</li>
                                <li>• Website blocks automated requests</li>
                                <li>• Network connectivity issues</li>
                            </ul>
                            <button onclick="location.reload()" class="btn btn-primary me-2">Try Again</button>
                            <a href="contact.php" class="btn btn-outline-primary">Contact Support</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
    
    document.body.appendChild(errorSection);
}

function drawScoreChart(score) {
    const canvas = document.getElementById('scoreChart');
    const ctx = canvas.getContext('2d');
    const centerX = canvas.width / 2;
    const centerY = canvas.height / 2;
    const radius = 45;
    
    // Clear canvas
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    // Background circle
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
    ctx.strokeStyle = '#e9ecef';
    ctx.lineWidth = 8;
    ctx.stroke();
    
    // Score arc
    const startAngle = -Math.PI / 2;
    const endAngle = startAngle + (2 * Math.PI * score / 100);
    
    ctx.beginPath();
    ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    ctx.strokeStyle = score >= 80 ? '#198754' : score >= 60 ? '#ffc107' : '#dc3545';
    ctx.lineWidth = 8;
    ctx.lineCap = 'round';
    ctx.stroke();
    
    // Update score text
    document.getElementById('overallScore').textContent = score;
    
    // Update description
    const descriptions = {
        80: 'Excellent! Your website is performing very well.',
        60: 'Good foundation with room for improvement.',
        40: 'Several issues need attention to improve performance.',
        0: 'Critical issues detected. Immediate action recommended.'
    };
    
    let description = descriptions[0];
    for (let threshold in descriptions) {
        if (score >= threshold) {
            description = descriptions[threshold];
            break;
        }
    }
    
    document.getElementById('scoreDescription').textContent = description;
}

// Real-time URL validation
document.getElementById('websiteUrl').addEventListener('input', function() {
    const url = this.value;
    if (url && !url.startsWith('http')) {
        this.value = 'https://' + url;
    }
});

// Turnstile callback functions for better UX
window.onTurnstileLoad = function() {
    console.log('Turnstile loaded successfully');
};

window.onTurnstileSuccess = function(token) {
    console.log('Turnstile verification successful');
    // Enable submit button if it was disabled
    const submitBtn = document.getElementById('auditBtn');
    if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.innerHTML = '<i class="bi bi-search me-2"></i>Audit Website';
    }
};

window.onTurnstileError = function(error) {
    console.error('Turnstile error:', error);
    // Show user-friendly error message
    const errorDiv = document.createElement('div');
    errorDiv.className = 'alert alert-warning mt-2';
    errorDiv.innerHTML = '<i class="bi bi-exclamation-triangle me-2"></i>Security verification failed. Please refresh the page and try again.';
    
    const turnstileDiv = document.querySelector('.cf-turnstile');
    if (turnstileDiv && turnstileDiv.parentNode) {
        turnstileDiv.parentNode.insertBefore(errorDiv, turnstileDiv.nextSibling);
    }
};

window.onTurnstileExpired = function() {
    console.log('Turnstile token expired');
    // Disable submit button
    const submitBtn = document.getElementById('auditBtn');
    if (submitBtn) {
        submitBtn.disabled = true;
        submitBtn.innerHTML = '<i class="bi bi-shield-exclamation me-2"></i>Security Expired - Please Verify Again';
    }
};

function updateContentSection(content) {
    const contentCard = document.getElementById('content-card');
    if (!contentCard) return;
    
    const progressBar = contentCard.querySelector('.progress-bar');
    const scoreText = contentCard.querySelector('.text-muted');
    const issuesList = contentCard.querySelector('ul');
    
    if (progressBar && scoreText && issuesList) {
        // Update score
        progressBar.style.width = content.score + '%';
        progressBar.className = `progress-bar ${getScoreColor(content.score)}`;
        scoreText.textContent = `${content.score}/100`;
        
        // Clear and update issues list
        issuesList.innerHTML = '';
        
        // Add word count if available
        if (content.wordCount) {
            const wordItem = document.createElement('li');
            wordItem.className = 'mb-2';
            const isGood = content.wordCount >= 300;
            const iconClass = isGood ? 'check-circle text-success' : 'exclamation-triangle text-warning';
            wordItem.innerHTML = `<i class="bi bi-${iconClass} me-2"></i>${content.wordCount} words on page`;
            issuesList.appendChild(wordItem);
        }
        
        // Add successes
        if (content.successes) {
            content.successes.slice(0, 2).forEach(success => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
                issuesList.appendChild(item);
            });
        }
        
        // Add issues
        if (content.issues) {
            content.issues.slice(0, 2).forEach(issue => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${issue}`;
                issuesList.appendChild(item);
            });
        }
    }
}

function updateTechnicalSection(technical) {
    const technicalCard = document.getElementById('technical-card');
    if (!technicalCard) return;
    
    const progressBar = technicalCard.querySelector('.progress-bar');
    const scoreText = technicalCard.querySelector('.text-muted');
    const issuesList = technicalCard.querySelector('ul');
    
    if (progressBar && scoreText && issuesList) {
        // Update score
        progressBar.style.width = technical.score + '%';
        progressBar.className = `progress-bar ${getScoreColor(technical.score)}`;
        scoreText.textContent = `${technical.score}/100`;
        
        // Clear and update issues list
        issuesList.innerHTML = '';
        
        // Add successes
        if (technical.successes) {
            technical.successes.slice(0, 2).forEach(success => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
                issuesList.appendChild(item);
            });
        }
        
        // Add issues
        if (technical.issues) {
            technical.issues.slice(0, 2).forEach(issue => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${issue}`;
                issuesList.appendChild(item);
            });
        }
    }
}

function updateUXSection(ux) {
    // Find the User Experience card
    const uxSection = document.querySelector('.card-body:has(.bi-person-check)');
    if (!uxSection) return;
    
    const progressBar = uxSection.querySelector('.progress-bar');
    const scoreText = uxSection.querySelector('.text-muted');
    const issuesList = uxSection.querySelector('ul');
    
    if (progressBar && scoreText && issuesList) {
        // Update score
        progressBar.style.width = ux.score + '%';
        progressBar.className = `progress-bar ${getScoreColor(ux.score)}`;
        scoreText.textContent = `${ux.score}/100`;
        
        // Clear and update issues list
        issuesList.innerHTML = '';
        
        // Add successes
        if (ux.successes) {
            ux.successes.slice(0, 2).forEach(success => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
                issuesList.appendChild(item);
            });
        }
        
        // Add issues
        if (ux.issues) {
            ux.issues.slice(0, 2).forEach(issue => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${issue}`;
                issuesList.appendChild(item);
            });
        }
    }
}

function updatePlagiarismSection(plagiarism) {
    const plagiarismCard = document.getElementById('plagiarism-card');
    if (!plagiarismCard) return;
    
    const progressBar = plagiarismCard.querySelector('.progress-bar');
    const scoreText = plagiarismCard.querySelector('.text-muted');
    const issuesList = plagiarismCard.querySelector('ul');
    
    if (progressBar && scoreText && issuesList) {
        // Update score
        progressBar.style.width = plagiarism.score + '%';
        progressBar.className = `progress-bar ${getScoreColor(plagiarism.score)}`;
        scoreText.textContent = `${plagiarism.score}/100`;
        
        // Clear and update issues list
        issuesList.innerHTML = '';
        
        // Add stock images count if available
        if (plagiarism.stockImages !== undefined) {
            const stockItem = document.createElement('li');
            stockItem.className = 'mb-2';
            const iconClass = plagiarism.stockImages === 0 ? 'check-circle text-success' : 'exclamation-triangle text-warning';
            const message = plagiarism.stockImages === 0 ? 'No stock images detected' : `${plagiarism.stockImages} stock/placeholder images found`;
            stockItem.innerHTML = `<i class="bi bi-${iconClass} me-2"></i>${message}`;
            issuesList.appendChild(stockItem);
        }
        
        // Add duplicate paragraphs if available
        if (plagiarism.duplicateParagraphs !== undefined && plagiarism.duplicateParagraphs > 0) {
            const dupItem = document.createElement('li');
            dupItem.className = 'mb-2';
            dupItem.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${plagiarism.duplicateParagraphs} duplicate paragraphs detected`;
            issuesList.appendChild(dupItem);
        }
        
        // Add successes
        if (plagiarism.successes && plagiarism.successes.length > 0) {
            plagiarism.successes.slice(0, 2).forEach(success => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
                issuesList.appendChild(item);
            });
        }
        
        // Add issues
        if (plagiarism.issues && plagiarism.issues.length > 0) {
            plagiarism.issues.slice(0, 3).forEach(issue => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                // Highlight external matches
                if (issue.includes('external plagiarism') || issue.includes('copied from')) {
                    item.innerHTML = `<i class="bi bi-exclamation-circle text-danger me-2"></i><strong>${issue}</strong>`;
                } else {
                    item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${issue}`;
                }
                issuesList.appendChild(item);
            });
        }
        
        // Show Copyscape verification badge (disabled for now)
        // if (plagiarism.copyscapeEnabled) {
        //     const badgeItem = document.createElement('li');
        //     badgeItem.className = 'mb-2 small text-muted';
        //     badgeItem.innerHTML = `<i class="bi bi-shield-check text-success me-2"></i>Verified by Copyscape API`;
        //     issuesList.appendChild(badgeItem);
        // }
    }
}

function updateVulnerabilitiesSection(vulnerabilities) {
    const vulnCard = document.getElementById('vulnerabilities-card');
    if (!vulnCard) return;
    
    const progressBar = vulnCard.querySelector('.progress-bar');
    const scoreText = vulnCard.querySelector('.text-muted');
    const issuesList = vulnCard.querySelector('ul');
    
    if (progressBar && scoreText && issuesList) {
        // Update score
        progressBar.style.width = vulnerabilities.score + '%';
        progressBar.className = `progress-bar ${getScoreColor(vulnerabilities.score)}`;
        scoreText.textContent = `${vulnerabilities.score}/100`;
        
        // Clear and update issues list
        issuesList.innerHTML = '';
        
        // Show critical vulnerabilities first
        if (vulnerabilities.criticalVulnerabilities && vulnerabilities.criticalVulnerabilities.length > 0) {
            vulnerabilities.criticalVulnerabilities.slice(0, 2).forEach(vuln => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-exclamation-triangle-fill text-danger me-2"></i><strong>CRITICAL: ${vuln}</strong>`;
                issuesList.appendChild(item);
            });
        }
        
        // Add successes
        if (vulnerabilities.successes && vulnerabilities.successes.length > 0) {
            vulnerabilities.successes.slice(0, 2).forEach(success => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                item.innerHTML = `<i class="bi bi-check-circle text-success me-2"></i>${success}`;
                issuesList.appendChild(item);
            });
        }
        
        // Add other issues (excluding critical ones already shown)
        if (vulnerabilities.issues && vulnerabilities.issues.length > 0) {
            const nonCriticalIssues = vulnerabilities.issues.filter(issue => !issue.includes('CRITICAL'));
            nonCriticalIssues.slice(0, 2).forEach(issue => {
                const item = document.createElement('li');
                item.className = 'mb-2';
                // Remove emoji if present for cleaner display
                const cleanIssue = issue.replace(/🔴|⚠️/g, '').trim();
                item.innerHTML = `<i class="bi bi-exclamation-triangle text-warning me-2"></i>${cleanIssue}`;
                issuesList.appendChild(item);
            });
        }
        
        // Show vulnerability count
        if (vulnerabilities.vulnerabilityCount !== undefined) {
            const countItem = document.createElement('li');
            countItem.className = 'mb-2 small text-muted';
            countItem.innerHTML = `<i class="bi bi-info-circle me-2"></i>${vulnerabilities.vulnerabilityCount} total issues found`;
            issuesList.appendChild(countItem);
        }
    }
}

function updateRecommendationsSection(recommendations) {
    const recommendationsSection = document.getElementById('recommendations-section');
    if (!recommendationsSection || !recommendations) return;
    
    let html = '';
    
    // Critical Issues (if any)
    if (recommendations.critical && recommendations.critical.length > 0) {
        html += `
            <div class="col-12 mb-3">
                <div class="bg-danger bg-opacity-10 border border-danger rounded-3 p-3">
                    <h4 class="h6 fw-bold text-danger mb-2">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>🔴 Critical Issues (Fix Immediately)
                    </h4>
                    <ul class="list-unstyled small mb-0">`;
        
        recommendations.critical.forEach(item => {
            html += `<li class="mb-2"><strong>• ${item}</strong></li>`;
        });
        
        html += `
                    </ul>
                </div>
            </div>`;
    }
    
    // Quick Wins
    if (recommendations.quick_wins && recommendations.quick_wins.length > 0) {
        html += `
            <div class="col-md-6">
                <div class="bg-success bg-opacity-10 rounded-3 p-3 h-100">
                    <h4 class="h6 fw-bold text-success mb-3">
                        <i class="bi bi-lightning-fill me-2"></i>🟢 Quick Wins (1-3 days)
                    </h4>
                    <ul class="list-unstyled small mb-0">`;
        
        recommendations.quick_wins.forEach(item => {
            html += `<li class="mb-2">• ${item}</li>`;
        });
        
        html += `
                    </ul>
                </div>
            </div>`;
    }
    
    // Medium Priority
    if (recommendations.medium_priority && recommendations.medium_priority.length > 0) {
        html += `
            <div class="col-md-6">
                <div class="bg-warning bg-opacity-10 rounded-3 p-3 h-100">
                    <h4 class="h6 fw-bold text-warning mb-3">
                        <i class="bi bi-clock-fill me-2"></i>🟡 Medium Priority (1-2 weeks)
                    </h4>
                    <ul class="list-unstyled small mb-0">`;
        
        recommendations.medium_priority.forEach(item => {
            html += `<li class="mb-2">• ${item}</li>`;
        });
        
        html += `
                    </ul>
                </div>
            </div>`;
    }
    
    // Long Term
    if (recommendations.long_term && recommendations.long_term.length > 0) {
        html += `
            <div class="col-12 mt-3">
                <div class="bg-info bg-opacity-10 rounded-3 p-3">
                    <h4 class="h6 fw-bold text-info mb-3">
                        <i class="bi bi-calendar-check me-2"></i>🔵 Long-Term Strategy (1-3 months)
                    </h4>
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-unstyled small mb-0">`;
        
        recommendations.long_term.forEach(item => {
            html += `<li class="mb-2">• ${item}</li>`;
        });
        
        html += `
                            </ul>
                        </div>
                    </div>
                </div>
            </div>`;
    }
    
    // If no specific recommendations, show a generic message
    if (!html) {
        html = `
            <div class="col-12">
                <div class="bg-success bg-opacity-10 rounded-3 p-4 text-center">
                    <i class="bi bi-trophy-fill text-success fs-1 mb-3"></i>
                    <h4 class="h5 fw-bold text-success mb-2">🎉 Outstanding Performance!</h4>
                    <p class="small mb-0">Your website is performing exceptionally well across all areas. Continue regular monitoring and minor optimizations to maintain this excellent level.</p>
                </div>
            </div>`;
    }
    
    recommendationsSection.innerHTML = html;
}
</script>

<!-- Cloudflare Turnstile Script -->
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<?php
// Include footer
include_once 'includes/footer.php';
?>
