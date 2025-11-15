<?php
/**
 * Path Helper for Blog pages
 * This file helps fix relative path issues when blog pages include the main website header/footer
 */

// Determine if we're in the blog section
$isBlog = (strpos($_SERVER['PHP_SELF'], '/blog/') !== false);

// Get the site root URL dynamically
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$siteRoot = $protocol . '://' . $host;

// Base URL for the site - always use absolute URLs for navigation
$baseUrl = $siteRoot . '/';

/**
 * Generate a correct URL based on the current context (blog or main site)
 * 
 * @param string $path The relative path from the main website root
 * @return string The correct URL
 */
function site_url($path = '') {
    global $baseUrl;
    // Remove leading slash if present
    $path = ltrim($path, '/');
    
    // Always return absolute URL to prevent routing issues
    return $baseUrl . $path;
}

// Define an array of menu items with their URLs and labels
$menuItems = [
    ['url' => site_url(''), 'label' => 'Home'],
    ['url' => site_url('services'), 'label' => 'Services'],
    ['url' => site_url('products'), 'label' => 'Products'],
    ['url' => site_url('about'), 'label' => 'About Us'],
    ['url' => site_url('our-impact'), 'label' => 'Our Impact'],
    ['url' => site_url('hire-expert'), 'label' => 'Hire Expert <i class="bi bi-chevron-down"></i>', 'class' => 'hire-expert-btn btn btn-warning text-white'],
    ['url' => site_url('contact'), 'label' => 'Contact']
];

// Define an array of footer links
$footerServices = [
    ['url' => site_url('services#website-design'), 'label' => 'Website Design'],
    ['url' => site_url('services#mobile-apps'), 'label' => 'Mobile App Development'],
    ['url' => site_url('services#software-dev'), 'label' => 'Software Development'],
    ['url' => site_url('services#hosting'), 'label' => 'Website Hosting'],
    ['url' => site_url('services#domains'), 'label' => 'Domain Registration'],
    ['url' => site_url('blog/digital-sms-marketing-power?utm_source=footer&utm_medium=link&utm_campaign=sms_marketing'), 'label' => 'SMS Marketing Insight']
];

$footerCompany = [
    ['url' => site_url('about'), 'label' => 'About Us'],
    ['url' => site_url('our-impact'), 'label' => 'Our Impact'],
    ['url' => site_url('hire-expert'), 'label' => 'Hire Expert'],
    ['url' => site_url('blog'), 'label' => 'Blog'],
    ['url' => site_url('contact'), 'label' => 'Contact Us'],
    ['url' => site_url('blog/appnomu-best-practices?utm_source=footer&utm_medium=link&utm_campaign=best_practices'), 'label' => 'Best Practices']
];

$footerLegal = [
    ['url' => site_url('privacy-policy'), 'label' => 'Privacy Policy'],
    ['url' => site_url('terms-of-service'), 'label' => 'Terms of Service'],
    ['url' => site_url('cookie-policy'), 'label' => 'Cookie Policy']
];

// Social links
$socialLinks = [
    ['url' => 'https://www.facebook.com/appnomu', 'icon' => 'facebook', 'label' => 'Facebook'],
    ['url' => 'https://www.twitter.com/appnomu', 'icon' => 'twitter', 'label' => 'Twitter'],
    ['url' => 'https://www.linkedin.com/company/our-appnomu', 'icon' => 'linkedin', 'label' => 'LinkedIn'],
    ['url' => 'https://www.instagram.com/appnomu', 'icon' => 'instagram', 'label' => 'Instagram']
];

// Script and CSS paths - use relative paths for assets
$bootstrapCss = '../assets/css/bootstrap.min.css';
$bootstrapJs = '../assets/js/bootstrap.bundle.min.js';
$customCss = '../assets/css/style.css';
$customJs = '../assets/js/main.js';
$logoPath = '../assets/images/logo.png';
?>
