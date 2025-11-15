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
        echo '<title>AppNomu | Websites | Domains | Software Development and Custom Enterprise Software</title>';
        echo '<meta name="description" content="AppNomu offers professional website design, mobile app development, unlimited SSD hosting, cheap domain registration & custom enterprise software solutions.">';
        echo '<meta name="keywords" content="website design, mobile app development, software development, web hosting, domain registration, enterprise software">';
        echo '<meta name="robots" content="index, follow">';
    }
    ?>
    
    <!-- Favicon -->
    <link rel="icon" href="https://services.appnomu.com/assets/images/AppNomu%20SalesQ%20logo.png">
    <link rel="apple-touch-icon" href="https://services.appnomu.com/assets/images/AppNomu%20SalesQ%20logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <?php if (basename($_SERVER['PHP_SELF']) === 'contact.php' || basename($_SERVER['PHP_SELF']) === 'thank-you.php'): ?>
    <link rel="stylesheet" href="assets/css/contact.css">
    <?php endif; ?>
    
    <!-- Structured Data for SEO - Local Business Schema -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "AppNomu Business Services",
      "description": "Best website designer Uganda offering affordable hosting, reliable domain registration & mobile app development. Most affordable app developers near you in Bugiri.",
      "url": "https://services.appnomu.com",
      "logo": "https://services.appnomu.com/assets/images/AppNomu%20SalesQ%20logo.png",
      "image": "https://services.appnomu.com/assets/images/AppNomu%20SalesQ%20logo.png",
      "telephone": "+256200948420",
      "email": "info@appnomu.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "77 Market Street",
        "addressLocality": "Bugiri Municipality",
        "addressRegion": "Bugiri",
        "addressCountry": "UG",
        "postalCode": ""
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": "0.5714",
        "longitude": "33.7419"
      },
      "areaServed": [
        {
          "@type": "City",
          "name": "Bugiri"
        },
        {
          "@type": "City",
          "name": "Kampala"
        },
        {
          "@type": "City",
          "name": "Jinja"
        },
        {
          "@type": "City",
          "name": "Mbale"
        },
        {
          "@type": "Country",
          "name": "Uganda"
        }
      ],
      "priceRange": "UGX 50,000 - UGX 5,000,000",
      "openingHours": "Mo-Fr 08:00-18:00, Sa 09:00-13:00",
      "contactPoint": {
        "@type": "ContactPoint",
        "telephone": "+256200948420",
        "contactType": "customer service",
        "availableLanguage": ["English"],
        "areaServed": "UG"
      },
      "sameAs": [
        "https://www.facebook.com/appnomu",
        "https://www.twitter.com/appnomu",
        "https://www.linkedin.com/company/our-appnomu",
        "https://www.instagram.com/appnomu"
      ],
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Digital Services",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Website Designing Uganda",
              "description": "Professional website design and development services in Uganda"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Cheaper Website Hosting",
              "description": "Affordable hosting solutions with 99.9% uptime"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Reliable Domain Registration",
              "description": "Domain registration services for .com, .ug, .co.ug domains"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Mobile App Development Uganda",
              "description": "Android and iOS mobile application development"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Affordable VPS Hosting Provider",
              "description": "Virtual Private Server hosting solutions"
            }
          }
        ]
      },
      "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "5.0",
        "reviewCount": "1200"
      }
    }
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

    <!-- Header -->
    <header class="sticky-top" role="banner">
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm" role="navigation" aria-label="Main navigation">
            <div class="container">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand me-3" href="<?php echo isset($baseUrl) ? $baseUrl . 'index' : 'index'; ?>" aria-label="AppNomu - Go to homepage">
                        <img src="https://services.appnomu.com/assets/images/AppNomu%20SalesQ%20logo.png" alt="AppNomu Business Services Logo" height="45">
                    </a>
                    <a href="tel:+256200948420" class="d-none d-lg-block btn btn-danger ms-2 px-3 py-2 call-now-btn" aria-label="Call AppNomu at +256 200 948 420">
                        <i class="bi bi-telephone-fill me-2" aria-hidden="true"></i>
                        <span><strong>Call Now:</strong> +256 200 948 420</span>
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php if (isset($menuItems) && is_array($menuItems)): ?>
                            <?php foreach ($menuItems as $item): ?>
                                <li class="nav-item">
                                    <a class="<?php echo isset($item['class']) ? $item['class'] : 'nav-link'; ?>" href="<?php echo $item['url']; ?>"><?php echo $item['label']; ?></a>
                                </li>
                            <?php endforeach; ?>
                            <li class="nav-item">
                                <a class="btn btn-primary ms-lg-3" href="<?php echo isset($baseUrl) ? $baseUrl . 'request-quote' : 'request-quote'; ?>">Get a Quote</a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo isset($baseUrl) ? $baseUrl . 'index' : 'index'; ?>">Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Services
                                </a>
                                <ul class="dropdown-menu shadow border-0">
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'services' : 'services'; ?>"><i class="bi bi-grid me-2 text-primary"></i>All Services</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'website-design-uganda' : 'website-design-uganda'; ?>"><i class="bi bi-geo-alt-fill me-2 text-success"></i>🇺🇬 Website Design Uganda</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo isset($baseUrl) ? $baseUrl . 'portfolio' : 'portfolio'; ?>">Portfolio</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Company
                                </a>
                                <ul class="dropdown-menu shadow border-0">
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'about' : 'about'; ?>"><i class="bi bi-building me-2 text-primary"></i>About Us</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'products' : 'products'; ?>"><i class="bi bi-box-seam me-2 text-info"></i>Products</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'team' : 'team'; ?>"><i class="bi bi-people me-2 text-success"></i>Our Team</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'our-impact' : 'our-impact'; ?>"><i class="bi bi-graph-up-arrow me-2 text-info"></i>Our Impact</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'contact' : 'contact'; ?>"><i class="bi bi-envelope me-2 text-primary"></i>Contact Us</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'faq' : 'faq'; ?>"><i class="bi bi-question-circle me-2 text-warning"></i>FAQ</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Resources
                                </a>
                                <ul class="dropdown-menu shadow border-0">
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'payment-plans' : 'payment-plans'; ?>"><i class="bi bi-credit-card me-2 text-warning"></i>Payment Plans</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'website-audit' : 'website-audit'; ?>"><i class="bi bi-search me-2 text-primary"></i>Free Website Audit</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'roi-calculator' : 'roi-calculator'; ?>"><i class="bi bi-calculator me-2 text-success"></i>ROI Calculator</a></li>
                                    <li><a class="dropdown-item py-2" href="<?php echo isset($baseUrl) ? $baseUrl . 'security' : 'security'; ?>"><i class="bi bi-shield-check me-2 text-info"></i>Security</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item py-2" href="https://clients.appnomu.com/" target="_blank"><i class="bi bi-cloud me-2 text-info"></i>Web Hosting <i class="bi bi-box-arrow-up-right ms-1 small"></i></a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-warning text-dark ms-lg-2 px-3" href="<?php echo isset($baseUrl) ? $baseUrl . 'hire-expert' : 'hire-expert'; ?>"><i class="bi bi-person-check-fill me-1"></i> Hire Expert</a>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-primary ms-lg-2 px-3" href="<?php echo isset($baseUrl) ? $baseUrl . 'request-quote' : 'request-quote'; ?>">Get a Quote</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Main Content -->
