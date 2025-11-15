<?php
/**
 * Path Utilities for AppNomu Admin Panel
 * 
 * Provides consistent path handling across the admin panel
 */

// Base admin directory - this should always be correct
$adminDirectory = '/admin';

/**
 * Get the admin base URL
 * 
 * @return string The base URL for admin pages
 */
function getAdminBaseUrl() {
    global $adminDirectory;
    
    // Get the site root from server variables
    $siteRoot = '';
    if (isset($_SERVER['DOCUMENT_ROOT']) && isset($_SERVER['SCRIPT_FILENAME'])) {
        $relativePath = str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname($_SERVER['SCRIPT_FILENAME']));
        $pathParts = explode('/', $relativePath);
        
        // Find the admin directory in the path
        $adminIndex = array_search('admin', $pathParts);
        if ($adminIndex !== false) {
            // Keep only parts before 'admin' (inclusive)
            $pathParts = array_slice($pathParts, 0, $adminIndex + 1);
            $siteRoot = implode('/', $pathParts);
        }
    }
    
    // If we couldn't find admin directory in path, use hardcoded value
    if (empty($siteRoot)) {
        $siteRoot = $adminDirectory;
    }
    
    return $siteRoot;
}

/**
 * Generate an admin URL
 * 
 * @param string $page The page name (e.g., 'index.php', 'logout.php')
 * @param array $params Optional query parameters
 * @return string The full admin URL
 */
function adminUrl($page, $params = []) {
    $baseUrl = getAdminBaseUrl();
    $url = $baseUrl . '/' . ltrim($page, '/');
    
    // Add query parameters if provided
    if (!empty($params)) {
        $queryString = http_build_query($params);
        $url .= '?' . $queryString;
    }
    
    return $url;
}

/**
 * Generate URL for site root (parent of admin directory)
 * 
 * @return string URL to site root
 */
function siteRootUrl() {
    $baseUrl = getAdminBaseUrl();
    return dirname($baseUrl);
}
?>
