<?php
if (!class_exists('Brand') && file_exists(__DIR__ . '/brand.php')) {
    require_once __DIR__ . '/brand.php';
}
/**
 * SEO Meta Tags Generator - Safe Implementation
 * Generates proper SEO meta tags for each page
 */

class SEOMeta {
    private static $defaultTitle = "Best Website Designer Uganda | Affordable Hosting & Domain Registration | AppNomu";
    private static $defaultDescription = "Leading website designing company in Uganda. Affordable VPS hosting, reliable domain registration, mobile app development Uganda. Most affordable app developers near me. Based in Bugiri, serving all Uganda.";
    private static $defaultKeywords = "website designing Uganda, cheaper website hosting, reliable domain registration, affordable hosting solution, website developers Uganda, website hosting, best website designer Uganda, affordable VPS hosting provider, website designing in Bugiri, mobile app development Uganda, most affordable app developers near me";
    
    /**
     * Generate SEO meta tags based on current page
     */
    public static function generateMeta($customTitle = null, $customDescription = null, $customKeywords = null) {
        $currentPage = basename($_SERVER['PHP_SELF'], '.php');
        
        // Page-specific SEO data
        $seoData = self::getPageSEOData($currentPage);
        
        // Use custom data if provided, otherwise use page-specific or default
        $title = $customTitle ?: ($seoData['title'] ?: self::$defaultTitle);
        $description = $customDescription ?: ($seoData['description'] ?: self::$defaultDescription);
        $keywords = $customKeywords ?: ($seoData['keywords'] ?: self::$defaultKeywords);

        if (class_exists('Brand')) {
            $title = Brand::refreshCopy($title);
            $description = Brand::refreshCopy($description);
            $keywords = Brand::refreshCopy($keywords);
        }
        
        // Generate canonical URL
        $canonicalUrl = self::getCanonicalUrl();
        
        // Output meta tags
        echo self::generateMetaTags($title, $description, $keywords, $canonicalUrl, $seoData);
    }
    
    /**
     * Get page-specific SEO data
     */
    private static function getPageSEOData($page) {
        $seoPages = [
            'index' => [
                'title' => 'Best Website Designer Uganda | Affordable Hosting & Mobile App Development | AppNomu',
                'description' => 'Top website designing company in Uganda. Cheaper website hosting, reliable domain registration, affordable VPS hosting provider. Mobile app development Uganda. Most affordable app developers near me in Bugiri.',
                'keywords' => 'website designing Uganda, best website designer Uganda, cheaper website hosting, affordable VPS hosting provider, mobile app development Uganda, website developers Uganda, most affordable app developers near me, website designing in Bugiri'
            ],
            'services' => [
                'title' => 'Website Designing Uganda | Affordable Hosting & Domain Registration Services | AppNomu',
                'description' => 'Professional website designing Uganda, cheaper website hosting solutions, reliable domain registration, affordable VPS hosting provider. Mobile app development Uganda by most affordable app developers.',
                'keywords' => 'website designing Uganda, website developers Uganda, cheaper website hosting, reliable domain registration, affordable hosting solution, website hosting, affordable VPS hosting provider, mobile app development Uganda'
            ],
            'products' => [
                'title' => 'Our Products | Meizon Radio, SalesQ, CharityWave | AppNomu',
                'description' => 'Discover AppNomu products: Meizon Radio (multi-platform app), SalesQ (business management), CharityWave (charity platform). Custom enterprise solutions.',
                'keywords' => 'Meizon Radio, AppNomu SalesQ, CharityWave, enterprise software, business management software'
            ],
            'about' => [
                'title' => 'About AppNomu | Leading Software Company | Uganda, Kenya, South Africa',
                'description' => 'About AppNomu Business Services: 1200+ websites, 100+ mobile apps, 20+ developers across Africa, India & USA. Professional software solutions since inception.',
                'keywords' => 'about AppNomu, software company Uganda, web development company Kenya, technology solutions South Africa'
            ],
            'contact' => [
                'title' => 'Contact AppNomu | Get Professional Website & Software Solutions',
                'description' => 'Contact AppNomu for professional website design, mobile apps, hosting & software development. Offices in Uganda, Kenya, South Africa, USA & India.',
                'keywords' => 'contact AppNomu, website design quote, software development contact, hosting support'
            ],
            'request-quote' => [
                'title' => 'Get a Quote | Website Design & Software Development | AppNomu',
                'description' => 'Request a free quote for website design, mobile app development, hosting or custom software solutions. Professional services across Uganda, Kenya, South Africa.',
                'keywords' => 'website design quote, mobile app quote, software development quote, hosting quote'
            ],
            'hire-expert' => [
                'title' => 'Hire Expert Developers | Professional Software Team | AppNomu',
                'description' => 'Hire expert developers from AppNomu. Professional website designers, mobile app developers, software engineers. 20+ experts across Africa, India & USA.',
                'keywords' => 'hire developers, expert programmers, software team, web developers, mobile app developers'
            ]
        ];
        
        return isset($seoPages[$page]) ? $seoPages[$page] : ['title' => null, 'description' => null, 'keywords' => null];
    }
    
    /**
     * Generate canonical URL
     */
    private static function getCanonicalUrl() {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI'];
        
        // Remove query parameters for canonical URL
        $uri = strtok($uri, '?');
        
        return $protocol . '://' . $host . $uri;
    }
    
    /**
     * Generate all meta tags
     */
    private static function generateMetaTags($title, $description, $keywords, $canonicalUrl, $seoData) {
        $output = "\n";
        
        // Basic meta tags
        $output .= "    <title>{$title}</title>\n";
        $output .= "    <meta name=\"description\" content=\"{$description}\">\n";
        $output .= "    <meta name=\"keywords\" content=\"{$keywords}\">\n";
        $output .= "    <link rel=\"canonical\" href=\"{$canonicalUrl}\">\n";
        
        // Open Graph tags
        $output .= "    <meta property=\"og:title\" content=\"{$title}\">\n";
        $output .= "    <meta property=\"og:description\" content=\"{$description}\">\n";
        $output .= "    <meta property=\"og:url\" content=\"{$canonicalUrl}\">\n";
        $output .= "    <meta property=\"og:type\" content=\"website\">\n";
        $ogImage = class_exists('Brand') ? Brand::OG_IMAGE_URL : 'https://services.appnomu.com/assets/images/AppNomu%20SalesQ%20logo.png';
        $siteName = class_exists('Brand') ? Brand::NAME : 'AppNomu Business Services';
        $output .= "    <meta property=\"og:image\" content=\"{$ogImage}\">\n";
        $output .= "    <meta property=\"og:site_name\" content=\"{$siteName}\">\n";
        
        // Twitter Card tags
        $output .= "    <meta name=\"twitter:card\" content=\"summary_large_image\">\n";
        $output .= "    <meta name=\"twitter:title\" content=\"{$title}\">\n";
        $output .= "    <meta name=\"twitter:description\" content=\"{$description}\">\n";
        $output .= "    <meta name=\"twitter:image\" content=\"{$ogImage}\">\n";
        
        // Additional SEO tags
        $output .= "    <meta name=\"robots\" content=\"index, follow\">\n";
        $author = class_exists('Brand') ? Brand::LEGAL_NAME : 'AppNomu Business Services';
        $output .= "    <meta name=\"author\" content=\"{$author}\">\n";
        $output .= "    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\n";
        
        return $output;
    }
}
?>
