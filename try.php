<?php

$data = array(
    'key' => '60da1144-dca4-4849-b2b3-31535ae8543999'
);

$url = "https://statex.ipsos.co.ug/index.php/data_api/logs_data";

// Print the data being sent for verification
echo "Request Data: ";
var_dump($data);

$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_POST, true);
curl_setopt($handle, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($handle, CURLOPT_HEADER, false);
curl_setopt($handle, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));

// Execute and check for errors
$output = curl_exec($handle);

// Check HTTP status code
$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
echo "HTTP Status Code: " . $httpCode . "\n";

// Check for cURL errors
if (curl_errno($handle)) {
    echo "cURL Error: " . curl_error($handle);
} else {
    echo "Raw Response: ";
    var_dump($output);

    $decodedOutput = json_decode($output, true);
    if (json_last_error() === JSON_ERROR_NONE) {
        echo "Decoded Response: ";
        print_r($decodedOutput);
    } else {
        echo "Error decoding JSON: " . json_last_error_msg() . "\n";
    }
}

curl_close($handle);



?>





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
define('DB_USER', 'wipedxlj_philldevcoder');
define('DB_PASS', '4YB]0Q[-##X[tK*');
define('DB_NAME', 'wipedxlj_datalytics');


// Establish database connection.
try {
    $dbh = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}
?>