<?php
session_start();

// Unset all session variables
$_SESSION = array();

// If there is a session cookie, delete it
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Destroy the session
session_destroy();

// Clear cookies if they exist
if (isset($_COOKIE['user_login'])) {
    setcookie('user_login', '', time() - 3600, '/');
}
if (isset($_COOKIE['userpassword'])) {
    setcookie('userpassword', '', time() - 3600, '/');
}

// Redirect to the home page with a logout message
header('location:../?message=logout_success');
exit;
