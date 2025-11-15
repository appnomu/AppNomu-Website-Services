<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Set a flash message
 * @param string $key Message key
 * @param string $message Message content
 * @param string $type Message type (success, error, warning, info)
 */
function set_flash_message($key, $message, $type = 'info') {
    if (!isset($_SESSION['flash_messages'])) {
        $_SESSION['flash_messages'] = [];
    }
    $_SESSION['flash_messages'][$key] = [
        'message' => $message,
        'type' => $type
    ];
}

/**
 * Get a flash message and remove it from the session
 * @param string $key Message key
 * @return array|null Message data or null if not found
 */
function get_flash_message($key) {
    if (isset($_SESSION['flash_messages'][$key])) {
        $message = $_SESSION['flash_messages'][$key];
        unset($_SESSION['flash_messages'][$key]);
        return $message;
    }
    return null;
}

/**
 * Display a flash message if it exists
 * @param string $key Message key
 * @param string $default Default message if key doesn't exist
 * @param string $default_type Default message type
 * @return string HTML for the alert or empty string if no message
 */
function display_flash_message($key, $default = null, $default_type = 'info') {
    $message = get_flash_message($key);
    
    if ($message === null && $default !== null) {
        $message = [
            'message' => $default,
            'type' => $default_type
        ];
    }
    
    if ($message) {
        $alert_class = 'alert-' . $message['type'];
        return '<div class="alert ' . $alert_class . ' alert-dismissible fade show" role="alert">'
             . htmlspecialchars($message['message'])
             . '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'
             . '</div>';
    }
    
    return '';
}

/**
 * Check if a flash message exists
 * @param string $key Message key
 * @return bool True if message exists, false otherwise
 */
function has_flash_message($key) {
    return !empty($_SESSION['flash_messages'][$key]);
}

/**
 * Clear all flash messages
 */
function clear_flash_messages() {
    unset($_SESSION['flash_messages']);
}

// Initialize flash messages array if it doesn't exist
if (!isset($_SESSION['flash_messages'])) {
    $_SESSION['flash_messages'] = [];
}
