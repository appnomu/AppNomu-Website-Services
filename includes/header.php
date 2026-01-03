<?php require_once __DIR__ . '/brand.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    // Detect if we're in the admin section
    $isAdmin = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false);
    
    // Set base URL - this helps fix relative URLs
    if ($isAdmin) {
        echo '<base href="https://services.appnomu.com/">';
    }
    ?>
    <!-- Dynamic SEO Meta Tags -->
    <?php 
    // Include SEO meta generator (safe - won't break if missing)
    if (file_exists('includes/seo-meta.php')) {
        include_once 'includes/seo-meta.php';
        SEOMeta::generateMeta();
    } else {
        // Fallback meta tags
        echo '<title>' . Brand::NAME . ' | Websites | Domains | Software Development and Custom Enterprise Software</title>';
        echo '<meta name="description" content="' . Brand::NAME . ' offers professional website design, mobile app development, unlimited SSD hosting, cheap domain registration & custom enterprise software solutions.">';
        echo '<meta name="keywords" content="website design, mobile app development, software development, web hosting, domain registration, enterprise software">';
        echo '<meta name="robots" content="index, follow">';
    }
    ?>
    
    <!-- Favicon -->
    <link rel="icon" href="<?php echo Brand::FAVICON_URL; ?>">
    <link rel="apple-touch-icon" href="<?php echo Brand::FAVICON_URL; ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts - Figtree -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <?php if (basename($_SERVER['PHP_SELF']) === 'contact.php' || basename($_SERVER['PHP_SELF']) === 'thank-you.php'): ?>
    <link rel="stylesheet" href="assets/css/contact.css">
    <?php endif; ?>
    
    <!-- Structured Data for SEO - Local Business Schema -->
    <script type="application/ld+json">
    <?php
        $schema = [
            '@context' => 'https://schema.org',
            '@type' => 'LocalBusiness',
            'name' => Brand::NAME,
            'description' => 'Africa’s digital lab for websites, mobile apps, hosting, and enterprise software.',
            'url' => Brand::WEBSITE,
            'logo' => Brand::LOGO_URL,
            'image' => Brand::LOGO_URL,
            'telephone' => '+256200948420',
            'email' => Brand::SUPPORT_EMAIL,
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => '77 Market Street',
                'addressLocality' => 'Bugiri Municipality',
                'addressRegion' => 'Bugiri',
                'addressCountry' => 'UG',
                'postalCode' => ''
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => '0.5714',
                'longitude' => '33.7419'
            ],
            'areaServed' => [
                ['@type' => 'City', 'name' => 'Bugiri'],
                ['@type' => 'City', 'name' => 'Kampala'],
                ['@type' => 'City', 'name' => 'Jinja'],
                ['@type' => 'City', 'name' => 'Mbale'],
                ['@type' => 'Country', 'name' => 'Uganda'],
            ],
            'priceRange' => 'UGX 50,000 - UGX 5,000,000',
            'openingHours' => 'Mo-Fr 08:00-18:00, Sa 09:00-13:00',
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'telephone' => '+256200948420',
                'contactType' => 'customer service',
                'availableLanguage' => ['English'],
                'areaServed' => 'UG'
            ],
            'sameAs' => [
                'https://www.facebook.com/appnomu',
                'https://www.twitter.com/appnomu',
                'https://www.linkedin.com/company/our-appnomu',
                'https://www.instagram.com/appnomu'
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Digital Services',
                'itemListElement' => [
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Website Designing Uganda',
                            'description' => 'Professional website design and development services in Uganda'
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Cheaper Website Hosting',
                            'description' => 'Affordable hosting solutions with 99.9% uptime'
                        ]
                    ],
                    [
                        '@type' => 'Offer',
                        'itemOffered' => [
                            '@type' => 'Service',
                            'name' => 'Reliable Domain Registration',
                            'description' => 'Domain registration services for .com, .ug, .co.ug domains'
                        ]
                    ],
                    [
                        '@type' => 'Service',
                        'name' => 'Mobile App Development Uganda',
                        'description' => 'Android and iOS mobile application development'
                    ],
                    [
                        '@type' => 'Service',
                        'name' => 'Affordable VPS Hosting Provider',
                        'description' => 'Virtual Private Server hosting solutions'
                    ],
                ]
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '5.0',
                'reviewCount' => '1200'
            ]
        ];
        echo json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    ?>
    </script>
    
    <!-- Google Analytics (GA4) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-81RYBYKXLC"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-81RYBYKXLC');
    </script>
    
    <!-- PeopleEvents Tracking Code -->
    <script>
    (function(e,t,n,o){e.PeopleEventsObject=o;e[o]=e[o]||{init:function(t){e[o].apiKey=t},
    setPerson:function(t,n){e[o].person=t;e[o].personTtl=n},
    forgetPerson:function(){e[o].toForgetPerson=true},
    track:function(){(e[o].q=e[o].q||[]).push(arguments)},
    updatePerson:function(t){e[o].personToUpdate={person:t}},
    appendToList:function(t,n){e[o].attributeToAppend={attributeName:t,attribute:n}}};
    var r=t.createElement("script");
    var s=t.getElementsByTagName("script")[0];r.async=1;r.src=n;s.parentNode.insertBefore(r,s)})
    (window,document,'https://s3.eu-central-1.amazonaws.com/portal-cdn-production/people-events-sdk/pe.latest-2.js','pe');

    pe.init('0311b9567403a22e39f964a2a4d54045-f9a6aac3-fd74-4334-8f93-620bb77dd6a4');
    </script>
</head>
<body>

    <!-- Professional Header -->
    <header class="site-header" role="banner" style="background: #ffffff !important;">
        <nav class="navbar navbar-expand-lg py-3" role="navigation" aria-label="Main navigation" style="background: #ffffff !important; border-bottom: 1px solid #e5e7eb;">
            <div class="container">
                <!-- Logo -->
                <a class="navbar-brand d-flex align-items-center" href="<?php echo isset($baseUrl) ? $baseUrl . 'index' : 'index'; ?>" aria-label="<?php echo Brand::NAME; ?> - Go to homepage">
                    <img src="<?php echo Brand::LOGO_URL; ?>" alt="<?php echo Brand::NAME; ?>" height="40">
                </a>
                
                <!-- Mobile Toggle -->
                <button class="navbar-toggler border-0 p-2" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-4" style="color: #111827;"></i>
                </button>
                
                <!-- Navigation -->
                <div class="collapse navbar-collapse" id="mainNav">
                    <ul class="navbar-nav ms-4 gap-1">
                        <?php if (isset($menuItems) && is_array($menuItems)): ?>
                            <?php foreach ($menuItems as $item): ?>
                                <li class="nav-item">
                                    <a class="nav-link px-3 py-2" style="color: #1f2937 !important; font-weight: 600;" href="<?php echo $item['url']; ?>"><?php echo $item['label']; ?></a>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link px-3 py-2" style="color: #1f2937 !important; font-weight: 600;" href="<?php echo isset($baseUrl) ? $baseUrl . 'index' : 'index'; ?>">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3 py-2" style="color: #1f2937 !important; font-weight: 600;" href="<?php echo isset($baseUrl) ? $baseUrl . 'services' : 'services'; ?>">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3 py-2" style="color: #1f2937 !important; font-weight: 600;" href="<?php echo isset($baseUrl) ? $baseUrl . 'portfolio' : 'portfolio'; ?>">Portfolio</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3 py-2" style="color: #1f2937 !important; font-weight: 600;" href="<?php echo isset($baseUrl) ? $baseUrl . 'about' : 'about'; ?>">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3 py-2" style="color: #1f2937 !important; font-weight: 600;" href="<?php echo isset($baseUrl) ? $baseUrl . 'products' : 'products'; ?>">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link px-3 py-2" style="color: #1f2937 !important; font-weight: 600;" href="<?php echo isset($baseUrl) ? $baseUrl . 'contact' : 'contact'; ?>">Contact</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                    
                    <!-- CTA Button -->
                    <a class="btn btn-cta" href="<?php echo isset($baseUrl) ? $baseUrl . 'request-quote' : 'request-quote'; ?>">
                        Get a Quote
                        <i class="bi bi-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Main Content -->
