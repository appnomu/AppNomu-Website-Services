<?php
/**
 * AppNomu Dynamic Sitemap Generator
 * Generates sitemap.xml with current dates and automatic page discovery
 */

// Set the content type to XML
header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate');

// Current date in the format YYYY-MM-DD
$currentDate = date('Y-m-d');

// Base URL of your website
$baseUrl = 'https://services.appnomu.com';

// Define pages with their priorities and change frequencies
$pages = [
    // Main pages
    ['url' => '', 'priority' => '1.0', 'changefreq' => 'weekly', 'lastmod' => $currentDate],
    ['url' => 'about', 'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    ['url' => 'services', 'priority' => '0.9', 'changefreq' => 'weekly', 'lastmod' => $currentDate],
    ['url' => 'products', 'priority' => '0.9', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    ['url' => 'hire-expert', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    ['url' => 'our-impact', 'priority' => '0.7', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    ['url' => 'contact', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    ['url' => 'request-quote', 'priority' => '0.8', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    ['url' => 'careers', 'priority' => '0.6', 'changefreq' => 'monthly', 'lastmod' => $currentDate],
    
    // Legal pages
    ['url' => 'privacy-policy', 'priority' => '0.3', 'changefreq' => 'yearly', 'lastmod' => $currentDate],
    ['url' => 'terms-of-service', 'priority' => '0.3', 'changefreq' => 'yearly', 'lastmod' => $currentDate],
    ['url' => 'cookie-policy', 'priority' => '0.3', 'changefreq' => 'yearly', 'lastmod' => $currentDate],
];

// Auto-discover blog pages
$blogPages = [];
if (is_dir('blog')) {
    $blogFiles = glob('blog/*.php');
    foreach ($blogFiles as $file) {
        $filename = basename($file, '.php');
        if ($filename !== 'index') {
            $blogPages[] = [
                'url' => 'blog/' . $filename,
                'priority' => '0.6',
                'changefreq' => 'monthly',
                'lastmod' => date('Y-m-d', filemtime($file))
            ];
        }
    }
}

// Combine all pages
$allPages = array_merge($pages, $blogPages);

// Generate XML
echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($allPages as $page) {
    $url = $baseUrl . '/' . $page['url'];
    if ($page['url'] === '') $url = $baseUrl . '/'; // Homepage
    
    echo "    <url>\n";
    echo "        <loc>" . htmlspecialchars($url) . "</loc>\n";
    echo "        <lastmod>" . $page['lastmod'] . "</lastmod>\n";
    echo "        <changefreq>" . $page['changefreq'] . "</changefreq>\n";
    echo "        <priority>" . $page['priority'] . "</priority>\n";
    echo "    </url>\n";
}

echo '</urlset>';
?>
