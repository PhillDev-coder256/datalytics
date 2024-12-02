<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Implement session timeout functionality

// Function to destroy session
function destroy_session_and_data()
{
    $_SESSION = array();
    session_destroy();
}

// Check if the last activity time is set
if (isset($_SESSION['last_activity'])) {

    $inactive_time = 300; // Time in seconds for inactivity
    $current_time = time();
    $last_activity_time = $_SESSION['last_activity'];

    // If the user has been inactive for more than one minute, destroy the session
    if (($current_time - $last_activity_time) > $inactive_time) { ?>
        <script>
            console.log("Session inactivity timeout, 5s");
        </script>
<?php destroy_session_and_data();

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
        header('location:../?message=logout_success&reason=session_inactivity_timeout');

        exit();
    } else {
        // Reset the last activity time
        $_SESSION['last_activity'] = $current_time;
    }
}

// Establishing a connection to the datbase

// DB credentials development
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'db_datalytics');


// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>