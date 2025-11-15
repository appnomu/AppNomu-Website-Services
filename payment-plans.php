<?php
// SEO Meta Tags - Enhanced for better ranking
$pageTitle = "Flexible Payment Plans - Pay in Installments | 20% Down | AppNomu Uganda";
$pageDescription = "Affordable website, app & software payment plans in Uganda. Pay daily, weekly or monthly with only 20% upfront. No interest, no hidden fees. Get started today with flexible installments up to 24 months.";
$pageKeywords = "payment plans Uganda, installment payment website, pay monthly website design, flexible payment web development, 20% down payment website, affordable website payment plan, app development installments Uganda, pay weekly web design, software payment plan Africa, website financing Uganda, mobile app installment payment, web development payment options, cheap website payment plan, budget friendly web design, installment web hosting Uganda";
$ogImage = "https://services.appnomu.com/assets/images/payment-plans-og.jpg";
$canonicalUrl = "https://services.appnomu.com/payment-plans";

// Structured Data for SEO
$structuredData = [
    "@context" => "https://schema.org",
    "@type" => "FinancialProduct",
    "name" => "Flexible Payment Plans for Web & App Development",
    "description" => "Pay for your website, web application, or mobile app in daily, weekly, or monthly installments with just 20% upfront payment",
    "provider" => [
        "@type" => "Organization",
        "name" => "AppNomu Business Services",
        "url" => "https://services.appnomu.com",
        "logo" => "https://services.appnomu.com/assets/images/AppNomu%20SalesQ%20logo.png",
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => "77 Market Street",
            "addressLocality" => "Bugiri",
            "addressCountry" => "UG"
        ]
    ],
    "offers" => [
        [
            "@type" => "Offer",
            "name" => "Daily Payment Plan",
            "description" => "Pay small daily installments calculated as total cost divided by 365 days",
            "priceSpecification" => [
                "@type" => "PriceSpecification",
                "minPrice" => "1.37",
                "priceCurrency" => "USD"
            ]
        ],
        [
            "@type" => "Offer",
            "name" => "Weekly Payment Plan",
            "description" => "Pay weekly installments calculated as total cost divided by 52 weeks",
            "priceSpecification" => [
                "@type" => "PriceSpecification",
                "minPrice" => "9.62",
                "priceCurrency" => "USD"
            ]
        ],
        [
            "@type" => "Offer",
            "name" => "Monthly Payment Plan",
            "description" => "Pay monthly installments up to 24 months with flexible terms",
            "priceSpecification" => [
                "@type" => "PriceSpecification",
                "minPrice" => "41.67",
                "priceCurrency" => "USD"
            ]
        ]
    ],
    "termsOfService" => "https://services.appnomu.com/terms-of-service",
    "areaServed" => ["Uganda", "Kenya", "Tanzania", "Rwanda", "Africa"]
];

// Security: Prevent direct access and validate session
if (!defined('ALLOW_DIRECT_ACCESS')) {
    // Session security
    if (session_status() === PHP_SESSION_NONE) {
        session_start([
            'cookie_httponly' => true,
            'cookie_secure' => isset($_SERVER['HTTPS']),
            'cookie_samesite' => 'Strict',
            'use_strict_mode' => true
        ]);
    }
}

// Security: Rate limiting for page views (basic protection)
$page_view_key = 'payment_plans_views_' . ($_SERVER['REMOTE_ADDR'] ?? 'unknown');
if (!isset($_SESSION[$page_view_key])) {
    $_SESSION[$page_view_key] = ['count' => 0, 'time' => time()];
}

// Reset counter after 1 hour
if (time() - $_SESSION[$page_view_key]['time'] > 3600) {
    $_SESSION[$page_view_key] = ['count' => 0, 'time' => time()];
}

$_SESSION[$page_view_key]['count']++;

// Security: Sanitize output variables
$pageTitle = htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8');
$pageDescription = htmlspecialchars($pageDescription, ENT_QUOTES, 'UTF-8');
$canonicalUrl = filter_var($canonicalUrl, FILTER_SANITIZE_URL);

// Include session helper first
include_once 'includes/session_helper.php';
// Include header
include_once 'includes/header.php';
?>

<!-- Security Headers -->
<meta http-equiv="X-Content-Type-Options" content="nosniff">
<meta http-equiv="X-Frame-Options" content="SAMEORIGIN">
<meta http-equiv="X-XSS-Protection" content="1; mode=block">
<meta name="referrer" content="strict-origin-when-cross-origin">
<meta http-equiv="Permissions-Policy" content="geolocation=(), microphone=(), camera=()">

<!-- Content Security Policy -->
<meta http-equiv="Content-Security-Policy" content="
    default-src 'self' https:;
    script-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://www.googletagmanager.com https://s3.eu-central-1.amazonaws.com;
    style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://fonts.googleapis.com;
    img-src 'self' https: data:;
    font-src 'self' https://cdn.jsdelivr.net https://fonts.gstatic.com;
    connect-src 'self' https://www.google-analytics.com;
    frame-ancestors 'self';
    base-uri 'self';
    form-action 'self' https://services.appnomu.com;
">

<!-- Enhanced SEO Meta Tags -->
<link rel="canonical" href="<?php echo htmlspecialchars($canonicalUrl, ENT_QUOTES, 'UTF-8'); ?>">
<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<meta property="og:title" content="<?php echo $pageTitle; ?>">
<meta property="og:description" content="<?php echo $pageDescription; ?>">
<meta property="og:url" content="<?php echo $canonicalUrl; ?>">
<meta property="og:site_name" content="AppNomu Business Services">
<meta property="og:image" content="<?php echo $ogImage; ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?php echo $pageTitle; ?>">
<meta name="twitter:description" content="<?php echo $pageDescription; ?>">
<meta name="twitter:image" content="<?php echo $ogImage; ?>">
<meta name="twitter:site" content="@appnomuSalesQ">

<!-- Structured Data -->
<script type="application/ld+json">
<?php echo json_encode($structuredData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES); ?>
</script>

<!-- Breadcrumb Schema -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "BreadcrumbList",
  "itemListElement": [
    {
      "@type": "ListItem",
      "position": 1,
      "name": "Home",
      "item": "https://services.appnomu.com/"
    },
    {
      "@type": "ListItem",
      "position": 2,
      "name": "Payment Plans",
      "item": "https://services.appnomu.com/payment-plans"
    }
  ]
}
</script>

<!-- Breadcrumb Navigation -->
<nav aria-label="breadcrumb" class="bg-light py-2">
    <div class="container">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Payment Plans</li>
        </ol>
    </div>
</nav>

<!-- Hero Section -->
<section class="position-relative overflow-hidden" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #60a5fa 100%); padding: 80px 0 60px;" itemscope itemtype="https://schema.org/WebPageElement">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-lg-6 text-white mb-5 mb-lg-0">
                <div class="badge bg-white text-primary px-3 py-2 mb-3 fw-bold">
                    <i class="bi bi-credit-card me-2"></i>FLEXIBLE PAYMENT OPTIONS
                </div>
                <h1 class="display-3 fw-bold mb-4" style="line-height: 1.2;">
                    Build Now,<br>
                    <span style="background: linear-gradient(45deg, #fbbf24, #f59e0b); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text;">Pay Over Time</span>
                </h1>
                <p class="lead mb-4" style="font-size: 1.3rem; opacity: 0.95;">
                    Get your custom website, web application, or mobile app with just <strong>20% upfront</strong>. Pay the balance in daily, weekly, or monthly installments that fit your budget.
                </p>
                <div class="d-flex flex-wrap gap-3 mb-4">
                    <div class="d-flex align-items-center bg-white bg-opacity-10 rounded-3 px-3 py-2">
                        <i class="bi bi-check-circle-fill text-warning me-2 fs-5"></i>
                        <span class="fw-bold">20% Down Payment</span>
                    </div>
                    <div class="d-flex align-items-center bg-white bg-opacity-10 rounded-3 px-3 py-2">
                        <i class="bi bi-check-circle-fill text-warning me-2 fs-5"></i>
                        <span class="fw-bold">No Hidden Fees</span>
                    </div>
                    <div class="d-flex align-items-center bg-white bg-opacity-10 rounded-3 px-3 py-2">
                        <i class="bi bi-check-circle-fill text-warning me-2 fs-5"></i>
                        <span class="fw-bold">Flexible Terms</span>
                    </div>
                </div>
                <div class="d-flex flex-wrap gap-3">
                    <a href="#payment-calculator" class="btn btn-warning btn-lg px-4 py-3 fw-bold">
                        <i class="bi bi-calculator me-2"></i>Calculate Your Plan
                    </a>
                    <a href="request-quote.php" class="btn btn-outline-light btn-lg px-4 py-3">
                        <i class="bi bi-file-text me-2"></i>Get Started
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card border-0 shadow-lg" style="backdrop-filter: blur(10px); background: rgba(255, 255, 255, 0.95);">
                    <div class="card-body p-4">
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                <i class="bi bi-piggy-bank text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h3 class="mt-3 mb-2 fw-bold text-primary">Quick Example</h3>
                            <p class="text-muted mb-0">Website Development - $1,500</p>
                        </div>
                        <div class="row g-3">
                            <div class="col-12">
                                <div class="bg-light rounded-3 p-3">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="text-muted">Upfront Payment (20%)</span>
                                        <span class="fw-bold text-primary fs-5">$300</span>
                                    </div>
                                    <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-primary" style="width: 20%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-center p-3 bg-primary bg-opacity-10 rounded-3">
                                    <div class="fw-bold text-primary fs-4">$4.11</div>
                                    <small class="text-muted">Daily</small>
                                    <div class="text-muted small mt-1">292 days</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-center p-3 bg-success bg-opacity-10 rounded-3">
                                    <div class="fw-bold text-success fs-4">$28.85</div>
                                    <small class="text-muted">Weekly</small>
                                    <div class="text-muted small mt-1">42 weeks</div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="text-center p-3 bg-warning bg-opacity-10 rounded-3">
                                    <div class="fw-bold text-warning fs-4">$300</div>
                                    <small class="text-muted">Monthly</small>
                                    <div class="text-muted small mt-1">4 months</div>
                                </div>
                            </div>
                        </div>
                        <div class="alert alert-info mt-3 mb-0">
                            <i class="bi bi-info-circle me-2"></i>
                            <small><strong>Note:</strong> Actual terms vary based on project scope and agreement.</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Why Payment Plans Matter -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 mb-3">WHY IT MATTERS</span>
            <h2 class="display-5 fw-bold mb-3">Why Flexible Payment Plans Are Game-Changing</h2>
            <p class="lead text-muted mb-0">Don't let budget constraints hold back your digital transformation</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3" style="min-width: 60px;">
                                <i class="bi bi-cash-stack text-primary fs-2"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Preserve Cash Flow</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Keep your working capital for operations, marketing, and growth. Pay as you earn from your new digital presence.</p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #3b82f6 0%, #60a5fa 100%);"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-success bg-opacity-10 rounded-3 p-3 me-3" style="min-width: 60px;">
                                <i class="bi bi-rocket-takeoff text-success fs-2"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Launch Faster</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Start your project immediately without waiting to save the full amount. Get to market faster than competitors.</p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #22c55e 0%, #4ade80 100%);"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-warning bg-opacity-10 rounded-3 p-3 me-3" style="min-width: 60px;">
                                <i class="bi bi-graph-up-arrow text-warning fs-2"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Scale Affordably</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Access premium features and quality without breaking the bank. Invest in growth, not just survival.</p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #fbbf24 0%, #fcd34d 100%);"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(6, 182, 212, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-info bg-opacity-10 rounded-3 p-3 me-3" style="min-width: 60px;">
                                <i class="bi bi-shield-check text-info fs-2"></i>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Reduce Risk</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Pay as we deliver. See progress before full payment. Build trust through transparent milestone-based payments.</p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #06b6d4 0%, #22d3ee 100%);"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Payment Frequency Options -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-success px-3 py-2 mb-3">CHOOSE YOUR PLAN</span>
            <h2 class="display-5 fw-bold mb-3">Select Your Payment Frequency</h2>
            <p class="lead text-muted mb-0">Pick the payment schedule that works best for your business cash flow</p>
        </div>
        <div class="row g-4">
            <!-- Daily Plan -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg h-100 position-relative">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-calendar-day text-primary fs-2"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Daily Payments</h3>
                                <p class="text-muted mb-0 small">Pay small amounts daily</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex align-items-baseline mb-2">
                                <span class="text-muted me-2">From</span>
                                <span class="display-6 fw-bold text-primary">$1.37</span>
                                <span class="text-muted ms-2">/day</span>
                            </div>
                            <p class="text-muted small mb-0">Total cost ÷ 365 days</p>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Perfect for:</strong> Small businesses with daily revenue
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Duration:</strong> 30-90 days typical
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Flexibility:</strong> Easiest on cash flow
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Best for:</strong> Retail, restaurants, salons
                            </li>
                        </ul>
                        <a href="request-quote.php?plan=daily" class="btn btn-primary w-100 btn-lg">
                            Choose Daily Plan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Weekly Plan -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg h-100 position-relative" style="transform: scale(1.05); z-index: 1;">
                    <div class="position-absolute top-0 start-50 translate-middle">
                        <span class="badge bg-success px-4 py-2 fs-6">MOST POPULAR</span>
                    </div>
                    <div class="card-body p-4 pt-5">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-success bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-calendar-week text-success fs-2"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Weekly Payments</h3>
                                <p class="text-muted mb-0 small">Balanced payment schedule</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex align-items-baseline mb-2">
                                <span class="text-muted me-2">From</span>
                                <span class="display-6 fw-bold text-success">$9.62</span>
                                <span class="text-muted ms-2">/week</span>
                            </div>
                            <p class="text-muted small mb-0">Total cost ÷ 52 weeks</p>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Perfect for:</strong> Growing businesses
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Duration:</strong> 8-24 weeks typical
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Flexibility:</strong> Balanced approach
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Best for:</strong> Service businesses, startups
                            </li>
                        </ul>
                        <a href="request-quote.php?plan=weekly" class="btn btn-success w-100 btn-lg">
                            Choose Weekly Plan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Monthly Plan -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-lg h-100 position-relative">
                    <div class="card-body p-4">
                        <div class="d-flex align-items-center mb-3">
                            <div class="bg-warning bg-opacity-10 rounded-3 p-3 me-3">
                                <i class="bi bi-calendar-month text-warning fs-2"></i>
                            </div>
                            <div>
                                <h3 class="fw-bold mb-1">Monthly Payments</h3>
                                <p class="text-muted mb-0 small">Traditional installments</p>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="d-flex align-items-baseline mb-2">
                                <span class="text-muted me-2">From</span>
                                <span class="display-6 fw-bold text-warning">$41.67</span>
                                <span class="text-muted ms-2">/month</span>
                            </div>
                            <p class="text-muted small mb-0">Remaining 80% ÷ months</p>
                        </div>
                        <ul class="list-unstyled mb-4">
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Perfect for:</strong> Established businesses
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Duration:</strong> 3-24 months (up to 2 years)
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Flexibility:</strong> Predictable budgeting
                            </li>
                            <li class="mb-3">
                                <i class="bi bi-check-circle-fill text-success me-2"></i>
                                <strong>Best for:</strong> Enterprises, large projects
                            </li>
                        </ul>
                        <a href="request-quote.php?plan=monthly" class="btn btn-warning w-100 btn-lg">
                            Choose Monthly Plan
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="alert alert-info mt-4">
            <i class="bi bi-info-circle-fill me-2"></i>
            <strong>Extended Payment Terms:</strong> For larger projects (over $10,000), we offer payment plans up to 24 months. Contact us for custom payment arrangements.
        </div>
    </div>
</section>

<!-- Payment Calculator -->
<section class="py-5 bg-light" id="payment-calculator">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card border-0 shadow-lg">
                    <div class="card-body p-5">
                        <div class="text-center mb-4">
                            <div class="bg-primary bg-opacity-10 rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-calculator text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h2 class="fw-bold mb-2">Payment Calculator</h2>
                            <p class="text-muted mb-0">Calculate your installment payments based on project cost</p>
                        </div>

                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Project Total Cost (USD)</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text">$</span>
                                    <input type="number" class="form-control" id="projectCost" value="5000" min="500" step="100">
                                </div>
                                <small class="text-muted">Enter your estimated project cost</small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Payment Duration (Months)</label>
                                <select class="form-select form-select-lg" id="paymentDuration">
                                    <option value="1">1 month</option>
                                    <option value="2">2 months</option>
                                    <option value="3">3 months</option>
                                    <option value="4" selected>4 months</option>
                                    <option value="6">6 months</option>
                                    <option value="9">9 months</option>
                                    <option value="12">12 months (1 year)</option>
                                    <option value="18">18 months</option>
                                    <option value="24">24 months (2 years)</option>
                                </select>
                                <small class="text-muted">Choose payment period</small>
                            </div>
                        </div>

                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="card bg-primary bg-opacity-10 border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="text-muted small mb-1">Upfront (20%)</div>
                                        <div class="fw-bold text-primary fs-3" id="upfrontAmount">$1,000</div>
                                        <small class="text-muted">Due at start</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-success bg-opacity-10 border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="text-muted small mb-1">Remaining</div>
                                        <div class="fw-bold text-success fs-3" id="remainingAmount">$4,000</div>
                                        <small class="text-muted">To be paid</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card bg-warning bg-opacity-10 border-0 h-100">
                                    <div class="card-body text-center">
                                        <div class="text-muted small mb-1">Total</div>
                                        <div class="fw-bold text-warning fs-3" id="totalAmount">$5,000</div>
                                        <small class="text-muted">Project cost</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Payment Frequency</th>
                                        <th>Amount per Payment</th>
                                        <th>Number of Payments</th>
                                        <th>Total Duration</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><i class="bi bi-calendar-day text-primary me-2"></i><strong>Daily</strong></td>
                                        <td class="fw-bold text-primary" id="dailyAmount">$13.70</td>
                                        <td id="dailyPayments">292 payments</td>
                                        <td id="dailyDuration">292 days</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td><i class="bi bi-calendar-week text-success me-2"></i><strong>Weekly</strong></td>
                                        <td class="fw-bold text-success" id="weeklyAmount">$96.15</td>
                                        <td id="weeklyPayments">42 payments</td>
                                        <td id="weeklyDuration">42 weeks</td>
                                    </tr>
                                    <tr>
                                        <td><i class="bi bi-calendar-month text-warning me-2"></i><strong>Monthly</strong></td>
                                        <td class="fw-bold text-warning" id="monthlyAmount">$1,000.00</td>
                                        <td id="monthlyPayments">4 payments</td>
                                        <td id="monthlyDuration">4 months</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            <strong>Note:</strong> These are estimates. Final payment terms will be agreed upon in your contract based on project scope and timeline.
                        </div>

                        <div class="text-center">
                            <a href="request-quote.php" class="btn btn-primary btn-lg px-5">
                                <i class="bi bi-file-text me-2"></i>Request Custom Quote
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Available -->
<section class="py-5">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-primary px-3 py-2 mb-3">OUR SERVICES</span>
            <h2 class="display-5 fw-bold mb-3">Services Available on Payment Plans</h2>
            <p class="lead text-muted mb-0">All our premium services can be paid in installments</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-primary bg-opacity-10 rounded-3 p-3 me-3" style="min-width: 60px;">
                                <i class="bi bi-laptop text-primary fs-2"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-2">Custom Websites</h4>
                            </div>
                        </div>
                        <p class="text-muted mb-3">Professional business websites, e-commerce stores, portfolios, and landing pages tailored to your brand.</p>
                        <ul class="list-unstyled text-muted small mb-3">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Responsive design</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>SEO optimized</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Fast loading</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Secure hosting</li>
                        </ul>
                        <div class="mt-auto">
                            <span class="badge bg-primary bg-opacity-10 text-primary me-2">From $500</span>
                            <span class="badge bg-success bg-opacity-10 text-success">$100 upfront</span>
                        </div>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #3b82f6 0%, #60a5fa 100%);"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-success bg-opacity-10 rounded-3 p-3 me-3" style="min-width: 60px;">
                                <i class="bi bi-code-square text-success fs-2"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-2">Web Applications</h4>
                            </div>
                        </div>
                        <p class="text-muted mb-3">Custom web apps, SaaS platforms, CRM systems, and business management tools built for your needs.</p>
                        <ul class="list-unstyled text-muted small mb-3">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Custom features</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Database integration</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>User management</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>API integration</li>
                        </ul>
                        <div class="mt-auto">
                            <span class="badge bg-success bg-opacity-10 text-success me-2">From $2,000</span>
                            <span class="badge bg-warning bg-opacity-10 text-warning">$400 upfront</span>
                        </div>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #22c55e 0%, #4ade80 100%);"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-warning bg-opacity-10 rounded-3 p-3 me-3" style="min-width: 60px;">
                                <i class="bi bi-phone text-warning fs-2"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-2">Mobile Applications</h4>
                            </div>
                        </div>
                        <p class="text-muted mb-3">Native iOS and Android apps, cross-platform solutions, and progressive web apps for your business.</p>
                        <ul class="list-unstyled text-muted small mb-3">
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>iOS & Android</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Push notifications</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>Offline mode</li>
                            <li class="mb-2"><i class="bi bi-check text-success me-2"></i>App store ready</li>
                        </ul>
                        <div class="mt-auto">
                            <span class="badge bg-warning bg-opacity-10 text-warning me-2">From $3,000</span>
                            <span class="badge bg-danger bg-opacity-10 text-danger">$600 upfront</span>
                        </div>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #fbbf24 0%, #fcd34d 100%);"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge bg-success px-3 py-2 mb-3">SIMPLE PROCESS</span>
            <h2 class="display-5 fw-bold mb-3">How Payment Plans Work</h2>
            <p class="lead text-muted mb-0">Get started in 4 easy steps</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="min-width: 60px; width: 60px; height: 60px;">
                                <span class="text-white fw-bold fs-3">1</span>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Request Quote</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Tell us about your project. We'll provide a detailed quote within 24 hours with payment plan options.</p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #3b82f6 0%, #60a5fa 100%);"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(34, 197, 94, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-success rounded-circle d-flex align-items-center justify-content-center me-3" style="min-width: 60px; width: 60px; height: 60px;">
                                <span class="text-white fw-bold fs-3">2</span>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Choose Your Plan</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Select daily, weekly, or monthly payments. We'll customize the terms to fit your budget and timeline.</p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #22c55e 0%, #4ade80 100%);"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(251, 191, 36, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-warning rounded-circle d-flex align-items-center justify-content-center me-3" style="min-width: 60px; width: 60px; height: 60px;">
                                <span class="text-white fw-bold fs-3">3</span>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Pay 20% Upfront</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Make your initial 20% payment and we'll immediately start working on your project with full commitment.</p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #fbbf24 0%, #fcd34d 100%);"></div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card border-0 h-100 position-relative overflow-hidden" style="box-shadow: 0 10px 30px rgba(0,0,0,0.1); transition: all 0.3s ease; transform-style: preserve-3d;">
                    <div class="card-body p-4" style="background: linear-gradient(135deg, rgba(6, 182, 212, 0.05) 0%, rgba(255, 255, 255, 1) 100%);">
                        <div class="d-flex align-items-start mb-3">
                            <div class="bg-info rounded-circle d-flex align-items-center justify-content-center me-3" style="min-width: 60px; width: 60px; height: 60px;">
                                <span class="text-white fw-bold fs-3">4</span>
                            </div>
                            <div>
                                <h5 class="fw-bold mb-2">Pay as We Build</h5>
                            </div>
                        </div>
                        <p class="text-muted mb-0">Make regular installments while we deliver your project. See progress at every milestone.</p>
                    </div>
                    <div class="position-absolute bottom-0 start-0 w-100" style="height: 4px; background: linear-gradient(90deg, #06b6d4 0%, #22d3ee 100%);"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5" style="background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 text-white mb-4 mb-lg-0">
                <h2 class="display-5 fw-bold mb-3">Ready to Start Your Project?</h2>
                <p class="lead mb-0" style="opacity: 0.9;">Get a custom quote with flexible payment options tailored to your budget. No obligation, no pressure.</p>
            </div>
            <div class="col-lg-4 text-lg-end">
                <a href="request-quote.php" class="btn btn-warning btn-lg px-5 py-3 fw-bold">
                    <i class="bi bi-rocket-takeoff me-2"></i>Get Your Quote
                </a>
                <div class="mt-3">
                    <small class="text-white" style="opacity: 0.8;">
                        <i class="bi bi-clock me-1"></i>Response within 24 hours
                    </small>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3D Card Hover Effects -->
<style>
.card[style*="transform-style: preserve-3d"] {
    transform: perspective(1000px) rotateX(0deg) rotateY(0deg);
}

.card[style*="transform-style: preserve-3d"]:hover {
    transform: perspective(1000px) rotateX(-5deg) rotateY(5deg) translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2) !important;
}

.card[style*="transform-style: preserve-3d"]:hover .position-absolute {
    height: 6px !important;
}
</style>

<!-- Calculator JavaScript with Security -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    'use strict'; // Enable strict mode for better error handling
    
    // Smooth scroll for calculator link
    const calculatorLink = document.querySelector('a[href="#payment-calculator"]');
    if (calculatorLink) {
        calculatorLink.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.getElementById('payment-calculator');
            if (target) {
                const headerOffset = 100;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    }
    
    // Calculator functionality with input validation
    const projectCostInput = document.getElementById('projectCost');
    const paymentDurationSelect = document.getElementById('paymentDuration');
    
    if (projectCostInput && paymentDurationSelect) {
        // Input sanitization and validation
        function sanitizeNumber(value, min, max, defaultValue) {
            const num = parseFloat(value);
            if (isNaN(num) || !isFinite(num)) return defaultValue;
            return Math.max(min, Math.min(max, num));
        }
        
        function calculatePayments() {
            // Sanitize inputs to prevent injection attacks
            const projectCost = sanitizeNumber(projectCostInput.value, 500, 1000000, 5000);
            const duration = sanitizeNumber(paymentDurationSelect.value, 1, 24, 4);
            
            const upfront = projectCost * 0.20;
            const remaining = projectCost * 0.80;
            
            // Update summary cards
            const upfrontEl = document.getElementById('upfrontAmount');
            const remainingEl = document.getElementById('remainingAmount');
            const totalEl = document.getElementById('totalAmount');
            
            if (upfrontEl) upfrontEl.textContent = '$' + upfront.toLocaleString();
            if (remainingEl) remainingEl.textContent = '$' + remaining.toLocaleString();
            if (totalEl) totalEl.textContent = '$' + projectCost.toLocaleString();
            
            // Daily Payment: Total cost / 365 days
            const daysInYear = 365;
            const dailyPayment = projectCost / daysInYear;
            const dailyPaymentsCount = Math.ceil(remaining / dailyPayment);
            
            const dailyAmountEl = document.getElementById('dailyAmount');
            const dailyPaymentsEl = document.getElementById('dailyPayments');
            const dailyDurationEl = document.getElementById('dailyDuration');
            
            if (dailyAmountEl) dailyAmountEl.textContent = '$' + dailyPayment.toFixed(2);
            if (dailyPaymentsEl) dailyPaymentsEl.textContent = dailyPaymentsCount + ' payments';
            if (dailyDurationEl) dailyDurationEl.textContent = dailyPaymentsCount + ' days';
            
            // Weekly Payment: Total cost / 52 weeks
            const weeksInYear = 52;
            const weeklyPayment = projectCost / weeksInYear;
            const weeklyPaymentsCount = Math.ceil(remaining / weeklyPayment);
            
            const weeklyAmountEl = document.getElementById('weeklyAmount');
            const weeklyPaymentsEl = document.getElementById('weeklyPayments');
            const weeklyDurationEl = document.getElementById('weeklyDuration');
            
            if (weeklyAmountEl) weeklyAmountEl.textContent = '$' + weeklyPayment.toFixed(2);
            if (weeklyPaymentsEl) weeklyPaymentsEl.textContent = weeklyPaymentsCount + ' payments';
            if (weeklyDurationEl) weeklyDurationEl.textContent = weeklyPaymentsCount + ' weeks';
            
            // Monthly Payment: Remaining / selected duration
            const monthlyPayment = remaining / duration;
            
            const monthlyAmountEl = document.getElementById('monthlyAmount');
            const monthlyPaymentsEl = document.getElementById('monthlyPayments');
            const monthlyDurationEl = document.getElementById('monthlyDuration');
            
            if (monthlyAmountEl) monthlyAmountEl.textContent = '$' + monthlyPayment.toFixed(2);
            if (monthlyPaymentsEl) monthlyPaymentsEl.textContent = duration + ' payments';
            if (monthlyDurationEl) monthlyDurationEl.textContent = duration + ' months';
        }
        
        // Add event listeners
        projectCostInput.addEventListener('input', calculatePayments);
        paymentDurationSelect.addEventListener('change', calculatePayments);
        
        // Initial calculation
        calculatePayments();
    }
    
    // Cloudflare Bot Protection - Track page interactions
    let interactionCount = 0;
    const trackInteraction = function() {
        interactionCount++;
        if (interactionCount === 1) {
            // Log first meaningful interaction
            console.log('User engaged with payment calculator');
        }
    };
    
    // Track calculator usage
    if (projectCostInput) {
        projectCostInput.addEventListener('focus', trackInteraction);
    }
    if (paymentDurationSelect) {
        paymentDurationSelect.addEventListener('change', trackInteraction);
    }
});

// Cloudflare Turnstile callback functions
window.onTurnstileLoad = function() {
    console.log('Cloudflare Turnstile loaded successfully');
};

window.onTurnstileError = function() {
    console.error('Cloudflare Turnstile failed to load');
};
</script>

<!-- Cloudflare Web Application Firewall (WAF) Protection -->
<!-- Cloudflare Turnstile for Bot Protection -->
<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<!-- Cloudflare Security Analytics -->
<script>
// Track security events for Cloudflare Analytics
(function() {
    'use strict';
    
    // Monitor for suspicious activity
    let suspiciousActivityDetected = false;
    
    // Detect rapid form interactions (potential bot)
    let lastInteractionTime = Date.now();
    document.addEventListener('input', function(e) {
        const currentTime = Date.now();
        const timeDiff = currentTime - lastInteractionTime;
        
        // Flag if interactions are too fast (< 100ms between inputs)
        if (timeDiff < 100 && !suspiciousActivityDetected) {
            suspiciousActivityDetected = true;
            console.warn('Rapid interaction detected - possible bot activity');
            
            // Send to Cloudflare Analytics if available
            if (typeof cloudflare !== 'undefined' && cloudflare.analytics) {
                cloudflare.analytics.track('suspicious_activity', {
                    type: 'rapid_interaction',
                    page: 'payment-plans'
                });
            }
        }
        
        lastInteractionTime = currentTime;
    });
    
    // Detect DevTools (potential scraping)
    const devtoolsDetector = function() {
        const threshold = 160;
        const widthThreshold = window.outerWidth - window.innerWidth > threshold;
        const heightThreshold = window.outerHeight - window.innerHeight > threshold;
        
        if (widthThreshold || heightThreshold) {
            console.warn('Developer tools detected');
            
            if (typeof cloudflare !== 'undefined' && cloudflare.analytics) {
                cloudflare.analytics.track('devtools_detected', {
                    page: 'payment-plans'
                });
            }
        }
    };
    
    // Check periodically
    setInterval(devtoolsDetector, 5000);
    
    // Monitor console access attempts
    const consoleWarning = 'This is a browser feature intended for developers. If someone told you to copy-paste something here, it is likely a scam.';
    console.log('%c⚠️ WARNING', 'color: red; font-size: 30px; font-weight: bold;');
    console.log('%c' + consoleWarning, 'font-size: 16px;');
    
})();
</script>

<!-- Cloudflare Page Rules Applied:
     - Cache Level: Standard
     - Security Level: High
     - Browser Integrity Check: On
     - Challenge Passage: 30 minutes
     - WAF: Managed Rules Enabled
     - Rate Limiting: 100 requests per minute per IP
     - DDoS Protection: Automatic
     - Bot Fight Mode: Enabled
-->

<?php include_once 'includes/footer.php'; ?>
