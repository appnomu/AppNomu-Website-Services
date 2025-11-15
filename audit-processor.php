<?php
// Increase execution time for comprehensive audit
set_time_limit(60); // 60 seconds max
ini_set('max_execution_time', 60);

// Suppress warnings/notices that could break JSON output
error_reporting(E_ERROR | E_PARSE);
ini_set('display_errors', '0');

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);

if (!$input || !isset($input['url'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

$websiteUrl = filter_var($input['url'], FILTER_VALIDATE_URL);
if (!$websiteUrl) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid URL']);
    exit;
}

// Real website audit functionality
function performRealAudit($url) {
    $results = [
        'url' => $url,
        'timestamp' => date('c'),
        'performance' => analyzePerformance($url),
        'seo' => analyzeSEO($url),
        'mobile' => analyzeMobile($url),
        'security' => analyzeSecurity($url),
        'accessibility' => analyzeAccessibility($url),
        'content' => analyzeContent($url),
        'technical' => analyzeTechnicalSEO($url),
        'ux' => analyzeUserExperience($url),
        'plagiarism' => analyzePlagiarism($url),
        'vulnerabilities' => analyzeVulnerabilities($url)
    ];
    
    $results['overall'] = calculateOverallScore($results);
    $results['recommendations'] = generateRecommendations($results);
    
    return $results;
}

function analyzePerformance($url) {
    $startTime = microtime(true);
    
    // Set up cURL with realistic browser headers
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (compatible; AppNomu-Audit/1.0)',
        CURLOPT_HEADER => true,
        CURLOPT_NOBODY => false,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $totalTime = curl_getinfo($ch, CURLINFO_TOTAL_TIME);
    $downloadSize = curl_getinfo($ch, CURLINFO_SIZE_DOWNLOAD);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    
    curl_close($ch);
    
    if ($response === false || $httpCode >= 400) {
        return [
            'score' => 0,
            'error' => 'Website not accessible',
            'loadTime' => 0,
            'issues' => ['Website is not accessible or returns error']
        ];
    }
    
    $loadTimeMs = $totalTime * 1000;
    $body = substr($response, $headerSize);
    
    // Calculate performance score
    $performanceScore = 100;
    if ($loadTimeMs > 3000) {
        $performanceScore = max(20, 100 - (($loadTimeMs - 3000) / 100));
    } elseif ($loadTimeMs > 1500) {
        $performanceScore = max(60, 100 - (($loadTimeMs - 1500) / 50));
    }
    
    // Analyze page size
    $pageSizeKB = $downloadSize / 1024;
    if ($pageSizeKB > 2000) {
        $performanceScore -= 20;
    } elseif ($pageSizeKB > 1000) {
        $performanceScore -= 10;
    }
    
    $issues = [];
    $successes = [];
    
    if ($loadTimeMs > 3000) {
        $issues[] = "Page load time is slow (" . round($loadTimeMs) . "ms)";
    } else {
        $successes[] = "Good page load time (" . round($loadTimeMs) . "ms)";
    }
    
    if ($pageSizeKB > 1000) {
        $issues[] = "Large page size (" . round($pageSizeKB) . "KB)";
    }
    
    // Check for common performance indicators
    if (strpos($body, 'defer') !== false || strpos($body, 'async') !== false) {
        $successes[] = "JavaScript loading optimization detected";
        $performanceScore += 5;
    }
    
    if (strpos($body, '.webp') !== false) {
        $successes[] = "Modern image formats (WebP) detected";
        $performanceScore += 5;
    }
    
    return [
        'score' => min(100, max(0, round($performanceScore))),
        'loadTime' => round($loadTimeMs),
        'pageSize' => round($pageSizeKB),
        'issues' => $issues,
        'successes' => $successes
    ];
}

function analyzeSEO($url) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 20,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (compatible; AppNomu-SEO-Audit/1.0)',
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $html = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($html === false || $httpCode >= 400) {
        return [
            'score' => 0,
            'error' => 'Could not analyze SEO',
            'issues' => ['Website not accessible for SEO analysis']
        ];
    }
    
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    
    $seoScore = 0;
    $issues = [];
    $successes = [];
    
    // Title tag analysis
    $titleNodes = $xpath->query('//title');
    if ($titleNodes->length > 0) {
        $title = trim($titleNodes->item(0)->textContent);
        $titleLength = strlen($title);
        
        if ($titleLength >= 30 && $titleLength <= 60) {
            $seoScore += 20;
            $successes[] = "Title tag length is optimal ($titleLength chars)";
        } elseif ($titleLength > 0) {
            $seoScore += 10;
            $issues[] = "Title tag length should be 30-60 characters (current: $titleLength)";
        }
    } else {
        $issues[] = "Missing title tag";
    }
    
    // Meta description
    $metaDesc = $xpath->query('//meta[@name="description"]');
    if ($metaDesc->length > 0) {
        $description = trim($metaDesc->item(0)->getAttribute('content'));
        $descLength = strlen($description);
        
        if ($descLength >= 120 && $descLength <= 160) {
            $seoScore += 20;
            $successes[] = "Meta description length is optimal ($descLength chars)";
        } elseif ($descLength > 0) {
            $seoScore += 10;
            $issues[] = "Meta description should be 120-160 characters (current: $descLength)";
        }
    } else {
        $issues[] = "Missing meta description";
    }
    
    // H1 tags
    $h1Tags = $xpath->query('//h1');
    if ($h1Tags->length === 1) {
        $seoScore += 15;
        $successes[] = "Proper H1 tag usage (1 found)";
    } elseif ($h1Tags->length === 0) {
        $issues[] = "Missing H1 tag";
    } else {
        $issues[] = "Multiple H1 tags found ({$h1Tags->length}), should be only one";
    }
    
    // Image alt tags
    $images = $xpath->query('//img');
    $imagesWithoutAlt = 0;
    foreach ($images as $img) {
        if (!$img->hasAttribute('alt') || trim($img->getAttribute('alt')) === '') {
            $imagesWithoutAlt++;
        }
    }
    
    if ($images->length > 0) {
        if ($imagesWithoutAlt === 0) {
            $seoScore += 15;
            $successes[] = "All images have alt tags";
        } else {
            $issues[] = "$imagesWithoutAlt out of {$images->length} images missing alt tags";
        }
    }
    
    // Meta viewport for mobile
    $viewport = $xpath->query('//meta[@name="viewport"]');
    if ($viewport->length > 0) {
        $seoScore += 10;
        $successes[] = "Mobile viewport meta tag present";
    } else {
        $issues[] = "Missing viewport meta tag for mobile optimization";
    }
    
    // Check for structured data
    if (strpos($html, 'application/ld+json') !== false || strpos($html, 'schema.org') !== false) {
        $seoScore += 10;
        $successes[] = "Structured data detected";
    }
    
    // Open Graph tags
    $ogTags = $xpath->query('//meta[starts-with(@property, "og:")]');
    if ($ogTags->length >= 3) {
        $seoScore += 10;
        $successes[] = "Open Graph tags for social media present";
    }
    
    return [
        'score' => min(100, $seoScore),
        'issues' => $issues,
        'successes' => $successes
    ];
}

function analyzeMobile($url) {
    // Check viewport and mobile-friendly indicators
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_USERAGENT => 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X) AppleWebKit/605.1.15',
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $html = curl_exec($ch);
    curl_close($ch);
    
    if ($html === false) {
        return [
            'score' => 0,
            'error' => 'Could not analyze mobile compatibility'
        ];
    }
    
    $mobileScore = 50; // Base score
    $issues = [];
    $successes = [];
    
    // Check viewport meta tag
    if (strpos($html, 'name="viewport"') !== false) {
        $mobileScore += 25;
        $successes[] = "Viewport meta tag present";
    } else {
        $issues[] = "Missing viewport meta tag";
    }
    
    // Check for responsive CSS
    if (strpos($html, '@media') !== false || strpos($html, 'responsive') !== false) {
        $mobileScore += 15;
        $successes[] = "Responsive CSS detected";
    }
    
    // Check for mobile-friendly frameworks
    if (strpos($html, 'bootstrap') !== false || strpos($html, 'foundation') !== false) {
        $mobileScore += 10;
        $successes[] = "Mobile-friendly framework detected";
    }
    
    return [
        'score' => min(100, $mobileScore),
        'issues' => $issues,
        'successes' => $successes
    ];
}

function analyzeSecurity($url) {
    $isHttps = strpos($url, 'https://') === 0;
    $securityScore = $isHttps ? 50 : 0;
    $issues = [];
    $successes = [];
    
    if ($isHttps) {
        $successes[] = "HTTPS encryption enabled";
    } else {
        $issues[] = "Website not using HTTPS encryption";
    }
    
    // Check security headers
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_NOBODY => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $headers = curl_exec($ch);
    curl_close($ch);
    
    if ($headers) {
        $headerLines = explode("\n", $headers);
        $securityHeaders = [
            'X-Frame-Options' => 'Clickjacking protection',
            'X-Content-Type-Options' => 'MIME type sniffing protection',
            'X-XSS-Protection' => 'XSS protection',
            'Strict-Transport-Security' => 'HTTPS enforcement'
        ];
        
        foreach ($securityHeaders as $header => $description) {
            $found = false;
            foreach ($headerLines as $line) {
                if (stripos($line, $header) !== false) {
                    $found = true;
                    break;
                }
            }
            
            if ($found) {
                $securityScore += 10;
                $successes[] = "$description header present";
            } else {
                $issues[] = "Missing $description ($header header)";
            }
        }
    }
    
    return [
        'score' => min(100, $securityScore),
        'isHttps' => $isHttps,
        'issues' => $issues,
        'successes' => $successes
    ];
}

function analyzeAccessibility($url) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $html = curl_exec($ch);
    curl_close($ch);
    
    if ($html === false) {
        return ['score' => 0, 'error' => 'Could not analyze accessibility'];
    }
    
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    
    $accessibilityScore = 0;
    $issues = [];
    $successes = [];
    
    // Check for alt tags on images
    $images = $xpath->query('//img');
    $imagesWithAlt = 0;
    foreach ($images as $img) {
        if ($img->hasAttribute('alt')) {
            $imagesWithAlt++;
        }
    }
    
    if ($images->length > 0) {
        $altPercentage = ($imagesWithAlt / $images->length) * 100;
        if ($altPercentage >= 90) {
            $accessibilityScore += 25;
            $successes[] = "Most images have alt text ({$imagesWithAlt}/{$images->length})";
        } elseif ($altPercentage >= 50) {
            $accessibilityScore += 15;
            $issues[] = "Some images missing alt text ({$imagesWithAlt}/{$images->length})";
        } else {
            $issues[] = "Many images missing alt text ({$imagesWithAlt}/{$images->length})";
        }
    }
    
    // Check for proper heading structure
    $headings = $xpath->query('//h1 | //h2 | //h3 | //h4 | //h5 | //h6');
    if ($headings->length > 0) {
        $accessibilityScore += 20;
        $successes[] = "Heading structure present";
    } else {
        $issues[] = "No heading structure found";
    }
    
    // Check for form labels
    $inputs = $xpath->query('//input[@type!="hidden"] | //textarea | //select');
    $inputsWithLabels = 0;
    foreach ($inputs as $input) {
        $id = $input->getAttribute('id');
        if ($id && $xpath->query("//label[@for='$id']")->length > 0) {
            $inputsWithLabels++;
        }
    }
    
    if ($inputs->length > 0) {
        $labelPercentage = ($inputsWithLabels / $inputs->length) * 100;
        if ($labelPercentage >= 80) {
            $accessibilityScore += 25;
            $successes[] = "Most form inputs have labels";
        } elseif ($labelPercentage >= 50) {
            $accessibilityScore += 15;
            $issues[] = "Some form inputs missing labels";
        } else {
            $issues[] = "Many form inputs missing labels";
        }
    }
    
    // Check for skip links
    if (strpos($html, 'skip') !== false && strpos($html, 'content') !== false) {
        $accessibilityScore += 15;
        $successes[] = "Skip navigation links detected";
    }
    
    // Check for ARIA attributes
    if (strpos($html, 'aria-') !== false || strpos($html, 'role=') !== false) {
        $accessibilityScore += 15;
        $successes[] = "ARIA attributes for screen readers detected";
    }
    
    return [
        'score' => min(100, $accessibilityScore),
        'issues' => $issues,
        'successes' => $successes
    ];
}

function analyzeContent($url) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $html = curl_exec($ch);
    curl_close($ch);
    
    if ($html === false) {
        return ['score' => 0, 'error' => 'Could not analyze content'];
    }
    
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    
    $contentScore = 0;
    $issues = [];
    $successes = [];
    
    // Word count analysis
    $textContent = strip_tags($html);
    $wordCount = str_word_count($textContent);
    
    if ($wordCount >= 300) {
        $contentScore += 25;
        $successes[] = "Good content length ($wordCount words)";
    } else {
        $issues[] = "Thin content detected ($wordCount words, recommended: 300+)";
    }
    
    // Check for multimedia
    $images = $xpath->query('//img');
    $videos = $xpath->query('//video | //iframe[contains(@src, "youtube") or contains(@src, "vimeo")]');
    
    if ($images->length > 0) {
        $contentScore += 15;
        $successes[] = "Images present ({$images->length} found)";
    }
    
    if ($videos->length > 0) {
        $contentScore += 10;
        $successes[] = "Video content detected";
    }
    
    // Check for calls-to-action
    $ctaKeywords = ['contact', 'buy', 'get started', 'sign up', 'learn more', 'request', 'download'];
    $ctaFound = 0;
    foreach ($ctaKeywords as $keyword) {
        if (stripos($html, $keyword) !== false) {
            $ctaFound++;
        }
    }
    
    if ($ctaFound >= 2) {
        $contentScore += 20;
        $successes[] = "Multiple calls-to-action detected";
    } elseif ($ctaFound > 0) {
        $contentScore += 10;
        $issues[] = "Limited calls-to-action (add more conversion points)";
    } else {
        $issues[] = "No clear calls-to-action found";
    }
    
    // Check for contact information
    $hasPhone = preg_match('/\+?\d{1,4}[\s\-]?\(?\d{1,4}\)?[\s\-]?\d{1,4}[\s\-]?\d{1,9}/', $html);
    $hasEmail = preg_match('/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/', $html);
    
    if ($hasPhone && $hasEmail) {
        $contentScore += 15;
        $successes[] = "Contact information visible";
    } elseif ($hasPhone || $hasEmail) {
        $contentScore += 8;
        $issues[] = "Incomplete contact information";
    } else {
        $issues[] = "No contact information found";
    }
    
    // Check for social proof
    $socialProofKeywords = ['testimonial', 'review', 'customer', 'client', 'trusted by'];
    $socialProofFound = false;
    foreach ($socialProofKeywords as $keyword) {
        if (stripos($html, $keyword) !== false) {
            $socialProofFound = true;
            break;
        }
    }
    
    if ($socialProofFound) {
        $contentScore += 15;
        $successes[] = "Social proof elements detected";
    } else {
        $issues[] = "No testimonials or social proof found";
    }
    
    return [
        'score' => min(100, $contentScore),
        'wordCount' => $wordCount,
        'imageCount' => $images->length,
        'issues' => $issues,
        'successes' => $successes
    ];
}

function analyzeTechnicalSEO($url) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $response = curl_exec($ch);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    curl_close($ch);
    
    if ($response === false) {
        return ['score' => 0, 'error' => 'Could not analyze technical SEO'];
    }
    
    $headers = substr($response, 0, $headerSize);
    $html = substr($response, $headerSize);
    
    $techScore = 0;
    $issues = [];
    $successes = [];
    
    // Check robots.txt
    $robotsUrl = preg_replace('/^(https?:\/\/[^\/]+).*$/', '$1/robots.txt', $url);
    $robotsCh = curl_init($robotsUrl);
    curl_setopt($robotsCh, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($robotsCh, CURLOPT_TIMEOUT, 5);
    curl_setopt($robotsCh, CURLOPT_SSL_VERIFYPEER, false);
    $robotsContent = curl_exec($robotsCh);
    $robotsCode = curl_getinfo($robotsCh, CURLINFO_HTTP_CODE);
    curl_close($robotsCh);
    
    if ($robotsCode == 200 && $robotsContent) {
        $techScore += 20;
        $successes[] = "Robots.txt file present";
    } else {
        $issues[] = "Missing robots.txt file";
    }
    
    // Check sitemap
    if (stripos($html, 'sitemap') !== false || stripos($robotsContent, 'sitemap') !== false) {
        $techScore += 20;
        $successes[] = "XML sitemap detected";
    } else {
        $issues[] = "No XML sitemap found";
    }
    
    // Check canonical URL
    if (stripos($html, 'rel="canonical"') !== false) {
        $techScore += 15;
        $successes[] = "Canonical URL tags present";
    } else {
        $issues[] = "Missing canonical URL tags";
    }
    
    // Check for 404 page
    $notFoundUrl = rtrim($url, '/') . '/this-page-does-not-exist-' . rand(1000, 9999);
    $notFoundCh = curl_init($notFoundUrl);
    curl_setopt($notFoundCh, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($notFoundCh, CURLOPT_TIMEOUT, 5);
    curl_setopt($notFoundCh, CURLOPT_SSL_VERIFYPEER, false);
    curl_exec($notFoundCh);
    $notFoundCode = curl_getinfo($notFoundCh, CURLINFO_HTTP_CODE);
    curl_close($notFoundCh);
    
    if ($notFoundCode == 404) {
        $techScore += 15;
        $successes[] = "Proper 404 error handling";
    } else {
        $issues[] = "404 error page not configured properly";
    }
    
    // Check for compression
    if (stripos($headers, 'Content-Encoding: gzip') !== false || stripos($headers, 'Content-Encoding: br') !== false) {
        $techScore += 15;
        $successes[] = "GZIP/Brotli compression enabled";
    } else {
        $issues[] = "No compression enabled (GZIP/Brotli)";
    }
    
    // Check for caching headers
    if (stripos($headers, 'Cache-Control') !== false || stripos($headers, 'Expires') !== false) {
        $techScore += 15;
        $successes[] = "Browser caching headers present";
    } else {
        $issues[] = "No browser caching headers found";
    }
    
    return [
        'score' => min(100, $techScore),
        'issues' => $issues,
        'successes' => $successes
    ];
}

function analyzeUserExperience($url) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $html = curl_exec($ch);
    curl_close($ch);
    
    if ($html === false) {
        return ['score' => 0, 'error' => 'Could not analyze user experience'];
    }
    
    $dom = new DOMDocument();
    @$dom->loadHTML($html);
    $xpath = new DOMXPath($dom);
    
    $uxScore = 0;
    $issues = [];
    $successes = [];
    
    // Check for navigation menu
    $navElements = $xpath->query('//nav | //ul[contains(@class, "nav")] | //div[contains(@class, "nav")]');
    if ($navElements->length > 0) {
        $uxScore += 20;
        $successes[] = "Navigation menu present";
    } else {
        $issues[] = "No clear navigation structure found";
    }
    
    // Check for search functionality
    $searchInputs = $xpath->query('//input[@type="search"] | //input[contains(@placeholder, "search")]');
    if ($searchInputs->length > 0) {
        $uxScore += 15;
        $successes[] = "Search functionality available";
    } else {
        $issues[] = "No search functionality detected";
    }
    
    // Check for footer
    $footers = $xpath->query('//footer');
    if ($footers->length > 0) {
        $uxScore += 15;
        $successes[] = "Footer with additional information present";
    } else {
        $issues[] = "No footer section found";
    }
    
    // Check for breadcrumbs
    if (stripos($html, 'breadcrumb') !== false) {
        $uxScore += 10;
        $successes[] = "Breadcrumb navigation detected";
    }
    
    // Check for forms
    $forms = $xpath->query('//form');
    if ($forms->length > 0) {
        $uxScore += 15;
        $successes[] = "Interactive forms present";
    } else {
        $issues[] = "No forms for user interaction";
    }
    
    // Check for buttons/CTAs
    $buttons = $xpath->query('//button | //a[contains(@class, "btn")] | //input[@type="submit"]');
    if ($buttons->length >= 3) {
        $uxScore += 15;
        $successes[] = "Multiple action buttons present";
    } elseif ($buttons->length > 0) {
        $uxScore += 8;
        $issues[] = "Limited action buttons (add more CTAs)";
    } else {
        $issues[] = "No clear action buttons found";
    }
    
    // Check for readable font size
    if (stripos($html, 'font-size') !== false) {
        $uxScore += 10;
        $successes[] = "Custom typography styling";
    }
    
    return [
        'score' => min(100, $uxScore),
        'issues' => $issues,
        'successes' => $successes
    ];
}

function analyzePlagiarism($url) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    
    $html = curl_exec($ch);
    curl_close($ch);
    
    if ($html === false || empty($html)) {
        return [
            'score' => 100, 
            'error' => 'Could not analyze content', 
            'issues' => [], 
            'successes' => [],
            'stockImages' => 0,
            'duplicateParagraphs' => 0,
            'externalMatches' => [],
            'copyscapeEnabled' => false
        ];
    }
    
    $dom = new DOMDocument();
    $loaded = @$dom->loadHTML($html);
    
    if (!$loaded) {
        return [
            'score' => 100, 
            'error' => 'Could not parse HTML', 
            'issues' => [], 
            'successes' => [],
            'stockImages' => 0,
            'duplicateParagraphs' => 0,
            'externalMatches' => [],
            'copyscapeEnabled' => false
        ];
    }
    
    $xpath = new DOMXPath($dom);
    
    $plagiarismScore = 100; // Start with perfect score
    $issues = [];
    $successes = [];
    $suspiciousContent = [];
    $externalMatches = [];
    
    // Extract main text content
    $textContent = strip_tags($html);
    $textContent = preg_replace('/\s+/', ' ', $textContent);
    $textContent = trim($textContent);
    
    // Check for common plagiarism indicators
    $plagiarismIndicators = [
        'lorem ipsum' => 'Placeholder text detected',
        'sample text' => 'Sample/template text found',
        'example content' => 'Example content not replaced',
        'your company name' => 'Template placeholder not customized',
        'your business' => 'Generic template text',
        'insert text here' => 'Placeholder text present',
        'add content here' => 'Template content not filled'
    ];
    
    foreach ($plagiarismIndicators as $indicator => $message) {
        if (stripos($textContent, $indicator) !== false) {
            $plagiarismScore -= 15;
            $issues[] = $message;
            $suspiciousContent[] = $indicator;
        }
    }
    
    // Check for duplicate meta descriptions (common in copied sites)
    $metaDesc = $xpath->query('//meta[@name="description"]');
    if ($metaDesc->length > 0) {
        $description = trim($metaDesc->item(0)->getAttribute('content'));
        
        // Check for generic descriptions
        $genericDescriptions = ['welcome to our website', 'home page', 'main page', 'default description'];
        foreach ($genericDescriptions as $generic) {
            if (stripos($description, $generic) !== false) {
                $plagiarismScore -= 10;
                $issues[] = "Generic meta description detected";
                break;
            }
        }
    }
    
    // Check for copyright notices
    $currentYear = date('Y');
    $lastYear = date('Y') - 1;
    
    if (preg_match('/copyright\s+©?\s*(\d{4})/i', $html, $matches)) {
        $copyrightYear = $matches[1];
        if ($copyrightYear == $currentYear || $copyrightYear == $lastYear) {
            $successes[] = "Copyright notice is up to date ($copyrightYear)";
        } else {
            $plagiarismScore -= 5;
            $issues[] = "Outdated copyright year ($copyrightYear) - may indicate copied content";
        }
    } else {
        $issues[] = "No copyright notice found";
        $plagiarismScore -= 5;
    }
    
    // Check for unique branding
    $title = $xpath->query('//title');
    if ($title->length > 0) {
        $titleText = trim($title->item(0)->textContent);
        $genericTitles = ['home', 'welcome', 'main page', 'untitled', 'new site'];
        
        $isGeneric = false;
        foreach ($genericTitles as $generic) {
            if (stripos($titleText, $generic) !== false && strlen($titleText) < 20) {
                $isGeneric = true;
                break;
            }
        }
        
        if ($isGeneric) {
            $plagiarismScore -= 10;
            $issues[] = "Generic page title suggests template content";
        } else {
            $successes[] = "Unique page title present";
        }
    }
    
    // Check for stock images (common indicators)
    $images = $xpath->query('//img');
    $stockImageIndicators = ['shutterstock', 'istockphoto', 'gettyimages', 'stockphoto', 'placeholder', 'sample-image'];
    $stockImagesFound = 0;
    
    foreach ($images as $img) {
        $src = $img->getAttribute('src');
        $alt = $img->getAttribute('alt');
        
        foreach ($stockImageIndicators as $indicator) {
            if (stripos($src, $indicator) !== false || stripos($alt, $indicator) !== false) {
                $stockImagesFound++;
                break;
            }
        }
    }
    
    if ($stockImagesFound > 0) {
        $plagiarismScore -= ($stockImagesFound * 5);
        $issues[] = "$stockImagesFound stock/placeholder images detected";
    } else if ($images->length > 0) {
        $successes[] = "No obvious stock image watermarks detected";
    }
    
    // Check for duplicate content patterns (repeated paragraphs)
    $paragraphs = $xpath->query('//p');
    $paragraphTexts = [];
    $duplicates = 0;
    
    foreach ($paragraphs as $p) {
        $text = trim($p->textContent);
        if (strlen($text) > 50) {
            if (in_array($text, $paragraphTexts)) {
                $duplicates++;
            } else {
                $paragraphTexts[] = $text;
            }
        }
    }
    
    if ($duplicates > 0) {
        $plagiarismScore -= ($duplicates * 10);
        $issues[] = "$duplicates duplicate paragraphs found on page";
    } else if (count($paragraphTexts) > 3) {
        $successes[] = "No duplicate paragraphs detected";
    }
    
    // Copyscape API Integration - TEMPORARILY DISABLED
    // Uncomment when ready to use external plagiarism checking
    /*
    try {
        $copyscapeResults = checkCopyscapeAPI($url, $textContent);
        if ($copyscapeResults && isset($copyscapeResults['matches'])) {
            $matchCount = count($copyscapeResults['matches']);
            
            if ($matchCount > 0) {
                $deduction = min(40, $matchCount * 10);
                $plagiarismScore -= $deduction;
                $issues[] = "$matchCount external plagiarism matches found on the web";
                $externalMatches = $copyscapeResults['matches'];
                
                foreach ($copyscapeResults['matches'] as $index => $match) {
                    if ($index < 2) {
                        $issues[] = "Content copied from: " . parse_url($match['url'], PHP_URL_HOST);
                    }
                }
            } else {
                $successes[] = "No external plagiarism detected (Copyscape verified)";
            }
        }
    } catch (Exception $e) {
        error_log("Copyscape check failed: " . $e->getMessage());
    }
    */
    
    // Final score adjustment
    $plagiarismScore = max(0, min(100, $plagiarismScore));
    
    return [
        'score' => round($plagiarismScore),
        'issues' => $issues,
        'successes' => $successes,
        'suspiciousContent' => $suspiciousContent,
        'stockImages' => $stockImagesFound,
        'duplicateParagraphs' => $duplicates,
        'externalMatches' => $externalMatches,
        'copyscapeEnabled' => false // Disabled for now
    ];
}

/**
 * Check content against Copyscape API for external plagiarism
 */
function checkCopyscapeAPI($url, $textContent) {
    require_once __DIR__ . '/config/config.php';
    $apis = Config::getPlagiarismAPIs();
    
    // Check if Copyscape is enabled
    if (!$apis['copyscape']['enabled']) {
        return null;
    }
    
    $username = $apis['copyscape']['username'];
    $apiKey = $apis['copyscape']['api_key'];
    
    // Copyscape API endpoint
    $apiUrl = 'https://www.copyscape.com/api/';
    
    // Prepare API request - Check URL for plagiarism
    $params = [
        'u' => $username,
        'k' => $apiKey,
        'o' => 'csearch',
        'f' => 'json',
        'q' => $url,
        'c' => 10 // Number of results to return
    ];
    
    $requestUrl = $apiUrl . '?' . http_build_query($params);
    
    try {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $requestUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 5, // Reduced to 5 seconds to prevent hanging
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_USERAGENT => 'AppNomu-Audit/1.0'
        ]);
        
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        if ($httpCode !== 200 || !$response) {
            error_log("Copyscape API error: HTTP $httpCode");
            return null;
        }
        
        $data = json_decode($response, true);
        
        // Check for API errors
        if (isset($data['error'])) {
            error_log("Copyscape API error: " . $data['error']);
            return null;
        }
        
        // Parse results
        $matches = [];
        if (isset($data['result']) && is_array($data['result'])) {
            foreach ($data['result'] as $result) {
                $matches[] = [
                    'url' => $result['url'] ?? '',
                    'title' => $result['title'] ?? 'Untitled',
                    'percentmatched' => $result['percentmatched'] ?? 0,
                    'htmlsnippet' => $result['htmlsnippet'] ?? ''
                ];
            }
        }
        
        return [
            'matches' => $matches,
            'count' => count($matches),
            'querywords' => $data['querywords'] ?? 0,
            'allpercentmatched' => $data['allpercentmatched'] ?? 0
        ];
        
    } catch (Exception $e) {
        error_log("Copyscape API exception: " . $e->getMessage());
        return null;
    }
}

function analyzeVulnerabilities($url) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HEADER => true,
        CURLOPT_TIMEOUT => 15,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_FOLLOWLOCATION => false
    ]);
    
    $response = curl_exec($ch);
    $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($response === false || empty($response)) {
        return [
            'score' => 100, 
            'error' => 'Could not analyze vulnerabilities', 
            'issues' => [], 
            'successes' => [],
            'criticalVulnerabilities' => [],
            'vulnerabilityCount' => 0,
            'criticalCount' => 0
        ];
    }
    
    $headers = substr($response, 0, $headerSize);
    $html = substr($response, $headerSize);
    
    $vulnerabilityScore = 100; // Start with perfect score
    $issues = [];
    $successes = [];
    $criticalVulnerabilities = [];
    
    // Check for exposed sensitive information
    $sensitivePatterns = [
        '/api[_-]?key[\s:=]+["\']?([a-zA-Z0-9_-]{20,})/i' => 'API key exposed in HTML',
        '/password[\s:=]+["\']?([^\s"\'<>]{6,})/i' => 'Password visible in source code',
        '/secret[\s:=]+["\']?([a-zA-Z0-9_-]{20,})/i' => 'Secret key exposed',
        '/token[\s:=]+["\']?([a-zA-Z0-9_-]{20,})/i' => 'Authentication token exposed',
        '/mysql:\/\/|postgresql:\/\/|mongodb:\/\//i' => 'Database connection string exposed',
        '/\.env|config\.php|settings\.php/i' => 'Configuration file accessible'
    ];
    
    foreach ($sensitivePatterns as $pattern => $message) {
        if (preg_match($pattern, $html)) {
            $vulnerabilityScore -= 20;
            $criticalVulnerabilities[] = $message;
            $issues[] = "🔴 CRITICAL: $message";
        }
    }
    
    // Check for SQL injection vulnerabilities (basic patterns)
    $sqlInjectionIndicators = [
        'mysql_query' => 'Deprecated MySQL function (SQL injection risk)',
        'mysqli_query($' => 'Potential SQL injection if not using prepared statements',
        'SELECT * FROM' => 'SQL query visible in source (potential injection point)',
        'WHERE.*=.*$_GET' => 'Direct GET parameter in SQL query',
        'WHERE.*=.*$_POST' => 'Direct POST parameter in SQL query'
    ];
    
    foreach ($sqlInjectionIndicators as $indicator => $message) {
        if (preg_match('/' . preg_quote($indicator, '/') . '/i', $html)) {
            $vulnerabilityScore -= 15;
            $issues[] = "⚠️ $message";
        }
    }
    
    // Check for XSS vulnerabilities
    $xssIndicators = [
        '<script>alert\(' => 'Potential XSS vulnerability (alert in script)',
        'document\.write\(' => 'Unsafe document.write() usage',
        'innerHTML\s*=' => 'Potential XSS via innerHTML',
        'eval\(' => 'Dangerous eval() function detected',
        'onclick=".*\$' => 'Inline event handler with variables'
    ];
    
    foreach ($xssIndicators as $indicator => $message) {
        if (preg_match('/' . $indicator . '/i', $html)) {
            $vulnerabilityScore -= 10;
            $issues[] = "⚠️ $message";
        }
    }
    
    // Check for outdated libraries/frameworks
    $outdatedLibraries = [
        'jquery-1\.' => 'jQuery 1.x detected (outdated, security vulnerabilities)',
        'jquery-2\.' => 'jQuery 2.x detected (consider upgrading to 3.x)',
        'angular\.js\/1\.[0-5]' => 'AngularJS 1.0-1.5 (known vulnerabilities)',
        'bootstrap\/3\.' => 'Bootstrap 3 (outdated, use Bootstrap 5)',
        'moment\.js' => 'Moment.js (deprecated, use date-fns or Luxon)'
    ];
    
    foreach ($outdatedLibraries as $library => $message) {
        if (preg_match('/' . $library . '/i', $html)) {
            $vulnerabilityScore -= 8;
            $issues[] = $message;
        }
    }
    
    // Check for missing security headers
    $securityHeaders = [
        'X-Content-Type-Options' => 'MIME type sniffing protection',
        'X-Frame-Options' => 'Clickjacking protection',
        'Content-Security-Policy' => 'XSS and injection protection',
        'X-XSS-Protection' => 'XSS filter',
        'Referrer-Policy' => 'Referrer information control',
        'Permissions-Policy' => 'Feature policy control'
    ];
    
    $missingHeaders = 0;
    foreach ($securityHeaders as $header => $description) {
        if (stripos($headers, $header) === false) {
            $missingHeaders++;
            $issues[] = "Missing $header header ($description)";
        } else {
            $successes[] = "$header header present";
        }
    }
    
    $vulnerabilityScore -= ($missingHeaders * 5);
    
    // Check for information disclosure
    $infoDisclosure = [
        'X-Powered-By' => 'Server technology exposed',
        'Server: Apache' => 'Apache version may be exposed',
        'Server: nginx' => 'Nginx version may be exposed',
        'X-AspNet-Version' => 'ASP.NET version exposed'
    ];
    
    foreach ($infoDisclosure as $header => $message) {
        if (stripos($headers, $header) !== false) {
            $vulnerabilityScore -= 5;
            $issues[] = $message;
        }
    }
    
    // Check for directory listing
    if (preg_match('/Index of|Directory Listing|Parent Directory/i', $html)) {
        $vulnerabilityScore -= 15;
        $criticalVulnerabilities[] = 'Directory listing enabled';
        $issues[] = "🔴 CRITICAL: Directory listing enabled (exposes file structure)";
    }
    
    // Check for exposed admin panels
    $adminPanelIndicators = [
        '/wp-admin' => 'WordPress admin panel',
        '/administrator' => 'Joomla admin panel',
        '/admin' => 'Generic admin panel',
        'phpmyadmin' => 'phpMyAdmin exposed'
    ];
    
    foreach ($adminPanelIndicators as $indicator => $panel) {
        if (stripos($html, $indicator) !== false) {
            $vulnerabilityScore -= 10;
            $issues[] = "$panel may be publicly accessible";
        }
    }
    
    // Check for error messages that expose information
    if (preg_match('/Fatal error|Warning:|Notice:|Parse error|SQL syntax/i', $html)) {
        $vulnerabilityScore -= 15;
        $criticalVulnerabilities[] = 'Error messages exposed';
        $issues[] = "🔴 CRITICAL: PHP/SQL error messages visible (information disclosure)";
    }
    
    // Check for unencrypted forms
    $dom = new DOMDocument();
    $loaded = @$dom->loadHTML($html);
    
    if ($loaded) {
        $xpath = new DOMXPath($dom);
        $forms = $xpath->query('//form');
        
        $insecureForms = 0;
        if ($forms && $forms->length > 0) {
            foreach ($forms as $form) {
                $action = $form->getAttribute('action');
                if (strpos($action, 'http://') === 0) {
                    $insecureForms++;
                }
            }
            
            if ($insecureForms > 0) {
                $vulnerabilityScore -= ($insecureForms * 10);
                $issues[] = "$insecureForms forms submitting over HTTP (unencrypted)";
            } else {
                $successes[] = "All forms use secure submission";
            }
        }
    }
    
    // Final score adjustment
    $vulnerabilityScore = max(0, min(100, $vulnerabilityScore));
    
    // Add success message if score is high
    if ($vulnerabilityScore >= 90 && count($criticalVulnerabilities) == 0) {
        $successes[] = "No critical vulnerabilities detected";
    }
    
    if ($vulnerabilityScore >= 80) {
        $successes[] = "Good security posture overall";
    }
    
    return [
        'score' => round($vulnerabilityScore),
        'issues' => $issues,
        'successes' => $successes,
        'criticalVulnerabilities' => $criticalVulnerabilities,
        'vulnerabilityCount' => count($issues),
        'criticalCount' => count($criticalVulnerabilities)
    ];
}

function calculateOverallScore($results) {
    // Weighted average: Performance 20%, SEO 25%, Mobile 15%, Security 15%, Accessibility 10%, Content 10%, Technical 5%
    $weights = [
        'performance' => 0.20,
        'seo' => 0.25,
        'mobile' => 0.15,
        'security' => 0.15,
        'accessibility' => 0.10,
        'content' => 0.10,
        'technical' => 0.05,
        'ux' => 0.05
    ];
    
    $totalScore = 0;
    foreach ($weights as $category => $weight) {
        $score = isset($results[$category]['score']) ? $results[$category]['score'] : 0;
        $totalScore += $score * $weight;
    }
    
    return round($totalScore);
}

function generateRecommendations($results) {
    $quickWins = [];
    $mediumPriority = [];
    $longTerm = [];
    $criticalIssues = [];
    
    // Performance recommendations
    if ($results['performance']['score'] < 70) {
        if (isset($results['performance']['loadTime']) && $results['performance']['loadTime'] > 3000) {
            $quickWins[] = "Compress and optimize images (use WebP format, reduce file sizes by 60-80%)";
            $mediumPriority[] = "Enable browser caching (set cache headers for 1 year on static assets)";
            $mediumPriority[] = "Enable GZIP/Brotli compression (reduce transfer size by 70%)";
        }
        if ($results['performance']['score'] < 50) {
            $criticalIssues[] = "Critical: Page load time exceeds 5 seconds - losing 50%+ of visitors";
        }
        $mediumPriority[] = "Minify CSS and JavaScript files (reduce file size by 20-30%)";
        $longTerm[] = "Implement Content Delivery Network (CDN) for faster global delivery";
        $longTerm[] = "Lazy load images and videos below the fold";
    }
    
    // SEO recommendations
    if ($results['seo']['score'] < 80) {
        foreach ($results['seo']['issues'] as $issue) {
            if (strpos($issue, 'title') !== false) {
                $quickWins[] = "Add unique title tags (30-60 characters) to every page";
            }
            if (strpos($issue, 'description') !== false) {
                $quickWins[] = "Write compelling meta descriptions (120-160 characters) for all pages";
            }
            if (strpos($issue, 'heading') !== false || strpos($issue, 'H1') !== false) {
                $quickWins[] = "Add proper H1 heading (one per page) and H2-H6 subheadings";
            }
            if (strpos($issue, 'alt') !== false) {
                $quickWins[] = "Add descriptive alt text to all images for SEO and accessibility";
            }
        }
        $mediumPriority[] = "Create XML sitemap and submit to Google Search Console";
        $mediumPriority[] = "Add structured data (Schema.org) for rich search results";
        $longTerm[] = "Develop comprehensive content strategy with keyword research";
        $longTerm[] = "Build quality backlinks from authoritative websites";
    }
    
    // Security recommendations
    if ($results['security']['score'] < 80) {
        foreach ($results['security']['issues'] as $issue) {
            if (strpos($issue, 'HTTPS') !== false || strpos($issue, 'SSL') !== false) {
                $criticalIssues[] = "Critical: Enable HTTPS/SSL certificate immediately (free with Let's Encrypt)";
            }
            if (strpos($issue, 'security headers') !== false) {
                $mediumPriority[] = "Add security headers (X-Frame-Options, CSP, HSTS) to prevent attacks";
            }
        }
        $mediumPriority[] = "Implement Web Application Firewall (WAF) protection";
        $longTerm[] = "Schedule regular security audits and penetration testing";
        $longTerm[] = "Set up automated security monitoring and alerts";
    }
    
    // Mobile recommendations
    if ($results['mobile']['score'] < 70) {
        foreach ($results['mobile']['issues'] as $issue) {
            if (strpos($issue, 'viewport') !== false) {
                $quickWins[] = "Add viewport meta tag: <meta name='viewport' content='width=device-width, initial-scale=1'>";
            }
            if (strpos($issue, 'responsive') !== false) {
                $mediumPriority[] = "Implement responsive design with CSS media queries";
            }
        }
        $mediumPriority[] = "Test on real mobile devices (iOS and Android)";
        $longTerm[] = "Adopt mobile-first design approach for all new pages";
    }
    
    // Content recommendations
    if (isset($results['content']) && $results['content']['score'] < 70) {
        foreach ($results['content']['issues'] as $issue) {
            if (strpos($issue, 'content') !== false && strpos($issue, 'words') !== false) {
                $mediumPriority[] = "Expand content to 500+ words per page for better SEO";
            }
            if (strpos($issue, 'call-to-action') !== false || strpos($issue, 'CTA') !== false) {
                $quickWins[] = "Add clear calls-to-action (Contact Us, Get Quote, Buy Now buttons)";
            }
            if (strpos($issue, 'contact') !== false) {
                $quickWins[] = "Display contact information prominently (phone, email, address)";
            }
            if (strpos($issue, 'testimonial') !== false || strpos($issue, 'social proof') !== false) {
                $mediumPriority[] = "Add customer testimonials and reviews for credibility";
            }
        }
        $longTerm[] = "Develop content marketing strategy (blog, videos, infographics)";
    }
    
    // Technical SEO recommendations
    if (isset($results['technical']) && $results['technical']['score'] < 70) {
        foreach ($results['technical']['issues'] as $issue) {
            if (strpos($issue, 'robots.txt') !== false) {
                $quickWins[] = "Create robots.txt file to guide search engine crawlers";
            }
            if (strpos($issue, 'sitemap') !== false) {
                $quickWins[] = "Generate and submit XML sitemap to search engines";
            }
            if (strpos($issue, 'canonical') !== false) {
                $mediumPriority[] = "Add canonical URL tags to prevent duplicate content issues";
            }
            if (strpos($issue, '404') !== false) {
                $mediumPriority[] = "Create custom 404 error page with helpful navigation";
            }
            if (strpos($issue, 'compression') !== false) {
                $quickWins[] = "Enable GZIP compression on web server (Apache/Nginx)";
            }
            if (strpos($issue, 'caching') !== false) {
                $mediumPriority[] = "Configure browser caching headers for static resources";
            }
        }
    }
    
    // UX recommendations
    if (isset($results['ux']) && $results['ux']['score'] < 70) {
        foreach ($results['ux']['issues'] as $issue) {
            if (strpos($issue, 'navigation') !== false) {
                $mediumPriority[] = "Improve navigation menu structure (clear, intuitive, max 7 items)";
            }
            if (strpos($issue, 'search') !== false) {
                $mediumPriority[] = "Add site search functionality for better user experience";
            }
            if (strpos($issue, 'footer') !== false) {
                $quickWins[] = "Add footer with links, contact info, and social media";
            }
            if (strpos($issue, 'forms') !== false) {
                $mediumPriority[] = "Add contact/inquiry forms to capture leads";
            }
            if (strpos($issue, 'buttons') !== false) {
                $quickWins[] = "Add prominent action buttons throughout the site";
            }
        }
        $longTerm[] = "Conduct user testing and A/B testing for conversion optimization";
    }
    
    // Accessibility recommendations
    if ($results['accessibility']['score'] < 70) {
        foreach ($results['accessibility']['issues'] as $issue) {
            if (strpos($issue, 'alt text') !== false) {
                $quickWins[] = "Add descriptive alt text to all images";
            }
            if (strpos($issue, 'labels') !== false) {
                $quickWins[] = "Add proper labels to all form inputs";
            }
            if (strpos($issue, 'heading') !== false) {
                $quickWins[] = "Use proper heading hierarchy (H1, H2, H3, etc.)";
            }
        }
        $mediumPriority[] = "Ensure keyboard navigation works for all interactive elements";
        $mediumPriority[] = "Add ARIA labels for screen reader compatibility";
        $longTerm[] = "Achieve WCAG 2.1 Level AA accessibility compliance";
    }
    
    // Plagiarism recommendations
    if (isset($results['plagiarism']) && $results['plagiarism']['score'] < 80) {
        foreach ($results['plagiarism']['issues'] as $issue) {
            if (strpos($issue, 'external plagiarism') !== false) {
                $criticalIssues[] = "URGENT: Content copied from other websites - Rewrite immediately to avoid legal issues";
            }
            if (strpos($issue, 'copied from') !== false) {
                $criticalIssues[] = "Remove plagiarized content and create original text";
            }
            if (strpos($issue, 'placeholder') !== false || strpos($issue, 'lorem ipsum') !== false) {
                $criticalIssues[] = "Remove placeholder/template text and add original content";
            }
            if (strpos($issue, 'stock') !== false || strpos($issue, 'placeholder images') !== false) {
                $quickWins[] = "Replace stock/placeholder images with original branded images";
            }
            if (strpos($issue, 'duplicate paragraphs') !== false) {
                $mediumPriority[] = "Remove duplicate content and write unique descriptions";
            }
            if (strpos($issue, 'copyright') !== false) {
                $quickWins[] = "Update copyright year to current year (" . date('Y') . ")";
            }
            if (strpos($issue, 'generic') !== false) {
                $quickWins[] = "Customize page titles and meta descriptions with unique branding";
            }
        }
        
        // Add external matches warning if found
        if (isset($results['plagiarism']['externalMatches']) && 
            count($results['plagiarism']['externalMatches']) > 0) {
            $criticalIssues[] = "Content plagiarism detected - Risk of copyright infringement and SEO penalties";
            $mediumPriority[] = "Hire professional content writer to create original, unique content";
        }
        
        $mediumPriority[] = "Create original content that reflects your unique value proposition";
        $longTerm[] = "Develop comprehensive content strategy with original articles and media";
    }
    
    // Vulnerability recommendations
    if (isset($results['vulnerabilities']) && $results['vulnerabilities']['score'] < 80) {
        // Check for critical vulnerabilities first
        if (isset($results['vulnerabilities']['criticalVulnerabilities']) && 
            count($results['vulnerabilities']['criticalVulnerabilities']) > 0) {
            foreach ($results['vulnerabilities']['criticalVulnerabilities'] as $vuln) {
                $criticalIssues[] = "URGENT: $vuln - Fix immediately to prevent security breach";
            }
        }
        
        foreach ($results['vulnerabilities']['issues'] as $issue) {
            if (strpos($issue, 'CRITICAL') !== false) {
                // Already handled above
                continue;
            }
            if (strpos($issue, 'API key') !== false || strpos($issue, 'password') !== false || 
                strpos($issue, 'secret') !== false || strpos($issue, 'token') !== false) {
                $criticalIssues[] = "Remove exposed credentials from source code immediately";
            }
            if (strpos($issue, 'SQL injection') !== false) {
                $mediumPriority[] = "Use prepared statements for all database queries to prevent SQL injection";
            }
            if (strpos($issue, 'XSS') !== false) {
                $mediumPriority[] = "Sanitize all user inputs and escape output to prevent XSS attacks";
            }
            if (strpos($issue, 'outdated') !== false || strpos($issue, 'jQuery') !== false || 
                strpos($issue, 'Bootstrap') !== false) {
                $mediumPriority[] = "Update outdated libraries to latest secure versions";
            }
            if (strpos($issue, 'security header') !== false || strpos($issue, 'Missing') !== false) {
                $quickWins[] = "Add security headers (CSP, X-Frame-Options, HSTS) to web server config";
            }
            if (strpos($issue, 'directory listing') !== false) {
                $quickWins[] = "Disable directory listing in web server configuration";
            }
            if (strpos($issue, 'error messages') !== false) {
                $quickWins[] = "Disable error display in production (set display_errors = Off)";
            }
            if (strpos($issue, 'admin panel') !== false) {
                $mediumPriority[] = "Restrict admin panel access with IP whitelist or VPN";
            }
        }
        $mediumPriority[] = "Implement Web Application Firewall (WAF) for protection";
        $longTerm[] = "Schedule regular security audits and penetration testing";
        $longTerm[] = "Set up security monitoring and intrusion detection system";
    }
    
    // Remove duplicates and prioritize
    $criticalIssues = array_unique($criticalIssues);
    $quickWins = array_unique($quickWins);
    $mediumPriority = array_unique($mediumPriority);
    $longTerm = array_unique($longTerm);
    
    return [
        'critical' => array_slice($criticalIssues, 0, 4),
        'quick_wins' => array_slice($quickWins, 0, 7),
        'medium_priority' => array_slice($mediumPriority, 0, 6),
        'long_term' => array_slice($longTerm, 0, 5)
    ];
}

// Validate Cloudflare Turnstile token
function validateTurnstileToken($token) {
    require_once __DIR__ . '/config/config.php';
    $turnstile = Config::getTurnstile();
    
    if (empty($token)) {
        return ['success' => false, 'error' => 'Missing security verification token'];
    }
    
    $postData = [
        'secret' => $turnstile['secret_key'],
        'response' => $token,
        'remoteip' => $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? ''
    ];
    
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => 'https://challenges.cloudflare.com/turnstile/v0/siteverify',
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => http_build_query($postData),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_HTTPHEADER => ['Content-Type: application/x-www-form-urlencoded']
    ]);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    if ($response === false || $httpCode !== 200) {
        return ['success' => false, 'error' => 'Security verification service unavailable'];
    }
    
    $result = json_decode($response, true);
    
    if (!$result || !isset($result['success'])) {
        return ['success' => false, 'error' => 'Invalid security verification response'];
    }
    
    if (!$result['success']) {
        $errorCodes = $result['error-codes'] ?? [];
        $errorMessage = 'Security verification failed';
        
        if (in_array('timeout-or-duplicate', $errorCodes)) {
            $errorMessage = 'Security verification expired. Please try again.';
        } elseif (in_array('invalid-input-response', $errorCodes)) {
            $errorMessage = 'Invalid security verification. Please refresh and try again.';
        }
        
        return ['success' => false, 'error' => $errorMessage];
    }
    
    return ['success' => true];
}

// Anti-spam protection
function checkSpamProtection($ip, $email = null) {
    require_once __DIR__ . '/config/config.php';
    $pdo = Config::getDatabaseConnection();
    
    // Check IP-based rate limiting (max 3 audits per hour)
    $stmt = $pdo->prepare("
        SELECT audit_count, last_audit, is_blocked 
        FROM audit_spam_protection 
        WHERE ip_address = ? AND last_audit > DATE_SUB(NOW(), INTERVAL 1 HOUR)
    ");
    $stmt->execute([$ip]);
    $ipData = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($ipData) {
        if ($ipData['is_blocked'] || $ipData['audit_count'] >= 3) {
            return ['allowed' => false, 'reason' => 'Rate limit exceeded. Please try again later.'];
        }
        
        // Update count
        $stmt = $pdo->prepare("
            UPDATE audit_spam_protection 
            SET audit_count = audit_count + 1, last_audit = NOW() 
            WHERE ip_address = ?
        ");
        $stmt->execute([$ip]);
    } else {
        // Insert new IP record
        $stmt = $pdo->prepare("
            INSERT INTO audit_spam_protection (ip_address, audit_count, last_audit) 
            VALUES (?, 1, NOW())
            ON DUPLICATE KEY UPDATE audit_count = 1, last_audit = NOW()
        ");
        $stmt->execute([$ip]);
    }
    
    // Check email-based limiting (max 2 audits per day per email)
    if ($email) {
        $stmt = $pdo->prepare("
            SELECT COUNT(*) as count 
            FROM audit_leads 
            WHERE email = ? AND created_at > DATE_SUB(NOW(), INTERVAL 24 HOUR)
        ");
        $stmt->execute([$email]);
        $emailCount = $stmt->fetch(PDO::FETCH_ASSOC)['count'];
        
        if ($emailCount >= 2) {
            return ['allowed' => false, 'reason' => 'Email limit exceeded. Please try again tomorrow.'];
        }
    }
    
    return ['allowed' => true];
}

// Ensure audit tables exist
function ensureAuditTablesExist($pdo) {
    // Create audit_leads table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS audit_leads (
            id INT AUTO_INCREMENT PRIMARY KEY,
            audit_id VARCHAR(32) UNIQUE NOT NULL,
            website_url VARCHAR(500) NOT NULL,
            business_name VARCHAR(255) NULL,
            email VARCHAR(255) NULL,
            phone VARCHAR(50) NULL,
            industry VARCHAR(100) NULL,
            overall_score INT NOT NULL,
            performance_score INT NOT NULL,
            seo_score INT NOT NULL,
            mobile_score INT NOT NULL,
            security_score INT NOT NULL,
            accessibility_score INT NOT NULL,
            audit_results JSON NULL,
            ip_address VARCHAR(45) NULL,
            user_agent TEXT NULL,
            status ENUM('New', 'Contacted', 'Quoted', 'Converted', 'Lost') DEFAULT 'New',
            notes TEXT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            
            INDEX idx_audit_id (audit_id),
            INDEX idx_email (email),
            INDEX idx_status (status),
            INDEX idx_created (created_at)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ");
    
    // Create audit_spam_protection table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS audit_spam_protection (
            id INT AUTO_INCREMENT PRIMARY KEY,
            ip_address VARCHAR(45) NOT NULL,
            email VARCHAR(255) NULL,
            audit_count INT DEFAULT 1,
            last_audit TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            
            INDEX idx_ip (ip_address),
            INDEX idx_email (email),
            INDEX idx_last_audit (last_audit)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ");
}

// Save audit to database with comprehensive lead tracking
function saveAuditResults($results) {
    require_once __DIR__ . '/config/config.php';
    
    try {
        $pdo = Config::getDatabaseConnection();
        
        // Ensure tables exist
        ensureAuditTablesExist($pdo);
        
        // Generate unique audit ID
        $auditId = md5($results['url'] . $results['timestamp'] . rand(1000, 9999));
        
        // Get client info
        $ipAddress = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        
        // Insert audit lead
        $stmt = $pdo->prepare("
            INSERT INTO audit_leads (
                audit_id, website_url, business_name, email, phone, industry,
                overall_score, performance_score, seo_score, mobile_score, 
                security_score, accessibility_score, audit_results,
                ip_address, user_agent, status
            ) VALUES (
                ?, ?, ?, ?, ?, ?,
                ?, ?, ?, ?, 
                ?, ?, ?,
                ?, ?, 'New'
            )
        ");
        
        $stmt->execute([
            $auditId,
            $results['url'],
            $results['business_name'] ?? '',
            $results['email'] ?? '',
            $results['phone'] ?? '',
            $results['industry'] ?? '',
            $results['overall'],
            $results['performance']['score'] ?? 0,
            $results['seo']['score'] ?? 0,
            $results['mobile']['score'] ?? 0,
            $results['security']['score'] ?? 0,
            $results['accessibility']['score'] ?? 0,
            json_encode($results),
            $ipAddress,
            $userAgent
        ]);
        
        // Send admin notification email
        sendAdminNotification($auditId, $results);
        
        // Send user report email
        if (!empty($results['email'])) {
            sendUserReport($auditId, $results);
        }
        
        return $auditId;
        
    } catch (Exception $e) {
        error_log("Failed to save audit results: " . $e->getMessage());
        return false;
    }
}

// Send admin notification about new audit lead
function sendAdminNotification($auditId, $results) {
    $adminEmail = 'info@appnomu.com'; // Your admin email
    $subject = "🚨 New Website Audit Lead - {$results['business_name']}";
    
    $emailBody = "
    <h2>New Website Audit Lead</h2>
    <p><strong>Audit ID:</strong> {$auditId}</p>
    <p><strong>Business:</strong> {$results['business_name']}</p>
    <p><strong>Website:</strong> <a href='{$results['url']}'>{$results['url']}</a></p>
    <p><strong>Email:</strong> {$results['email']}</p>
    <p><strong>Phone:</strong> {$results['phone']}</p>
    <p><strong>Industry:</strong> {$results['industry']}</p>
    
    <h3>Audit Scores:</h3>
    <ul>
        <li><strong>Overall Score:</strong> {$results['overall']}/100</li>
        <li><strong>Performance:</strong> {$results['performance']['score']}/100</li>
        <li><strong>SEO:</strong> {$results['seo']['score']}/100</li>
        <li><strong>Security:</strong> {$results['security']['score']}/100</li>
        <li><strong>Mobile:</strong> {$results['mobile']['score']}/100</li>
    </ul>
    
    <h3>Key Issues Found:</h3>
    <ul>";
    
    if (!empty($results['performance']['issues'])) {
        foreach ($results['performance']['issues'] as $issue) {
            $emailBody .= "<li>Performance: {$issue}</li>";
        }
    }
    
    if (!empty($results['seo']['issues'])) {
        foreach ($results['seo']['issues'] as $issue) {
            $emailBody .= "<li>SEO: {$issue}</li>";
        }
    }
    
    $emailBody .= "
    </ul>
    
    <p><strong>Action Required:</strong> Follow up with this lead within 24 hours for best conversion rates.</p>
    <p><a href='https://services.appnomu.com/admin/audit-leads.php?id={$auditId}' style='background: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>View Full Report</a></p>
    ";
    
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: AppNomu Audit System <noreply@appnomu.com>',
        'Reply-To: info@appnomu.com'
    ];
    
    mail($adminEmail, $subject, $emailBody, implode("\r\n", $headers));
}

// Send detailed report to user
function sendUserReport($auditId, $results) {
    $userEmail = $results['email'];
    $businessName = $results['business_name'];
    $subject = "Your Website Audit Report - {$businessName}";
    
    $emailBody = "
    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
        <div style='background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%); color: white; padding: 30px; text-align: center;'>
            <h1>Website Audit Report</h1>
            <p>Professional analysis for {$businessName}</p>
        </div>
        
        <div style='padding: 30px; background: #f8f9fa;'>
            <h2>Overall Score: {$results['overall']}/100</h2>
            
            <div style='background: white; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                <h3>Performance Analysis</h3>
                <p><strong>Score:</strong> {$results['performance']['score']}/100</p>
                <p><strong>Load Time:</strong> " . ($results['performance']['loadTime'] / 1000) . " seconds</p>
            </div>
            
            <div style='background: white; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                <h3>SEO Analysis</h3>
                <p><strong>Score:</strong> {$results['seo']['score']}/100</p>
            </div>
            
            <div style='background: white; padding: 20px; border-radius: 8px; margin: 20px 0;'>
                <h3>Security Analysis</h3>
                <p><strong>Score:</strong> {$results['security']['score']}/100</p>
                <p><strong>HTTPS:</strong> " . ($results['security']['isHttps'] ? 'Enabled ✅' : 'Not Enabled ❌') . "</p>
            </div>
            
            <div style='text-align: center; margin: 30px 0;'>
                <a href='https://services.appnomu.com/request-quote.php' style='background: #28a745; color: white; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-weight: bold;'>Get Professional Help</a>
            </div>
            
            <p style='color: #666; font-size: 14px;'>
                This audit was performed by AppNomu's professional website analysis tool. 
                For a detailed consultation and improvement plan, contact us at info@appnomu.com or +256 200 948 420.
            </p>
        </div>
    </div>
    ";
    
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: AppNomu Website Audit <noreply@appnomu.com>',
        'Reply-To: info@appnomu.com'
    ];
    
    mail($userEmail, $subject, $emailBody, implode("\r\n", $headers));
}

try {
    // Validate Cloudflare Turnstile token first
    $turnstileToken = $input['cf-turnstile-response'] ?? '';
    $turnstileValidation = validateTurnstileToken($turnstileToken);
    
    if (!$turnstileValidation['success']) {
        http_response_code(400); // Bad Request
        echo json_encode(['error' => $turnstileValidation['error']]);
        exit;
    }
    
    // Get client IP for spam protection
    $clientIP = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    $email = $input['email'] ?? null;
    
    // Check spam protection
    $spamCheck = checkSpamProtection($clientIP, $email);
    if (!$spamCheck['allowed']) {
        http_response_code(429); // Too Many Requests
        echo json_encode(['error' => $spamCheck['reason']]);
        exit;
    }
    
    try {
        $auditResults = performRealAudit($websiteUrl);
        
        // Add user info if provided
        if (isset($input['email'])) {
            $auditResults['email'] = $input['email'];
        }
        if (isset($input['business_name'])) {
            $auditResults['business_name'] = $input['business_name'];
        }
        if (isset($input['phone'])) {
            $auditResults['phone'] = $input['phone'];
        }
        if (isset($input['industry'])) {
            $auditResults['industry'] = $input['industry'];
        }
        
        // Save results and get audit ID
        $auditId = saveAuditResults($auditResults);
        $auditResults['audit_id'] = $auditId;
        
        echo json_encode($auditResults);
    } catch (Exception $e) {
        error_log("Audit error: " . $e->getMessage());
        http_response_code(500);
        echo json_encode([
            'error' => 'Audit failed',
            'message' => 'An error occurred while analyzing the website. Please try again.',
            'debug' => $e->getMessage()
        ]);
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Audit failed: ' . $e->getMessage()]);
}
?>
