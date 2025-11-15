<?php
// Start session
session_start();

// Log the logout event (optional)
if (isset($_SESSION['admin_username'])) {
    // You could add logging code here if needed
    $username = $_SESSION['admin_username'];
    // Example: error_log("Admin user '$username' logged out at " . date('Y-m-d H:i:s'));
}

// Clear all session variables
$_SESSION = array();

// Destroy the session cookie if it exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Add a logout message and redirect to login page
$logoutMessage = "You have been successfully logged out.";

// Store the message in a temporary cookie (will be removed after reading)
setcookie('logout_message', $logoutMessage, 0, '/');

// Redirect to login page
header("Location: login.php");
exit;
?>
