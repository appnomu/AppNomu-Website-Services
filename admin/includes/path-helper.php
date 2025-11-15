<?php
/**
 * Path Helper for Admin pages
 * This file helps fix relative path issues when admin pages include the main website header/footer
 */

// Determine if we're in the admin section
$isAdmin = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false);

// Base URL for the site
$baseUrl = '';

// If in admin, we need to adjust relative paths to point to the parent directory
if ($isAdmin) {
    $baseUrl = '../';
}

/**
 * Generate a correct URL based on the current context (admin or main site)
 * 
 * @param string $path The relative path from the main website root
 * @return string The correct URL
 */
function site_url($path = '') {
    global $baseUrl;
    // Remove leading slash if present
    $path = ltrim($path, '/');
    return $baseUrl . $path;
}

// Define an array of menu items with their URLs and labels
$menuItems = [
    ['url' => site_url('index.php'), 'label' => 'Home'],
    ['url' => site_url('services.php'), 'label' => 'Services'],
    ['url' => site_url('products.php'), 'label' => 'Products'],
    ['url' => site_url('about.php'), 'label' => 'About Us'],
    ['url' => site_url('portfolio.php'), 'label' => 'Portfolio'],
    ['url' => site_url('contact.php'), 'label' => 'Contact']
];

// Define an array of footer links
$footerServices = [
    ['url' => site_url('services.php#website-design'), 'label' => 'Website Design'],
    ['url' => site_url('services.php#mobile-apps'), 'label' => 'Mobile App Development'],
    ['url' => site_url('services.php#software-dev'), 'label' => 'Software Development'],
    ['url' => site_url('services.php#hosting'), 'label' => 'Website Hosting'],
    ['url' => site_url('services.php#domains'), 'label' => 'Domain Registration']
];

$footerCompany = [
    ['url' => site_url('about.php'), 'label' => 'About Us'],
    ['url' => site_url('portfolio.php'), 'label' => 'Portfolio'],
    ['url' => site_url('careers.php'), 'label' => 'Careers'],
    ['url' => site_url('contact.php'), 'label' => 'Contact Us']
];

$footerLegal = [
    ['url' => site_url('privacy-policy.php'), 'label' => 'Privacy Policy'],
    ['url' => site_url('terms-of-service.php'), 'label' => 'Terms of Service']
];

// Social links
$socialLinks = [
    ['url' => 'https://www.facebook.com/appnomu', 'icon' => 'facebook', 'label' => 'Facebook'],
    ['url' => 'https://www.twitter.com/appnomu', 'icon' => 'twitter', 'label' => 'Twitter'],
    ['url' => 'https://www.linkedin.com/company/our-appnomu', 'icon' => 'linkedin', 'label' => 'LinkedIn'],
    ['url' => 'https://www.instagram.com/appnomu', 'icon' => 'instagram', 'label' => 'Instagram']
];

// Script and CSS paths
$bootstrapCss = site_url('assets/css/bootstrap.min.css');
$bootstrapJs = site_url('assets/js/bootstrap.bundle.min.js');
$customCss = site_url('assets/css/style.css');
$customJs = site_url('assets/js/main.js');
$logoPath = site_url('assets/images/logo.png');
?>
