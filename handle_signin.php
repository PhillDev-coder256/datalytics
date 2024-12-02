<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['login'])) {
    include_once('includes/dbconnection.php');
    $username = htmlspecialchars($_POST['uname'], ENT_QUOTES, 'UTF-8');
    $password = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');

    try {
        // Query to fetch user details
        $sql2 = "SELECT * FROM users WHERE username = :uname OR email = :email";
        $query2 = $dbh->prepare($sql2);
        $query2->bindParam(':uname', $username, PDO::PARAM_STR);
        $query2->bindParam(':email', $username, PDO::PARAM_STR); // Assuming email is also submitted as 'uname'
        $query2->execute();

        // Check if user exists
        if ($query2->rowCount() > 0) {
            $result = $query2->fetch(PDO::FETCH_OBJ);

            // $password = password_hash($password, PASSWORD_DEFAULT);

            // Verify password
            if (password_verify($password, $result->password)) {
                // Set session and redirect
                $_SESSION['id'] = $result->user_id;
                $_SESSION['type'] = $result->role;
                // echo $_SESSION['id'];
                header('Location: portal/');
                exit;
            } else {
                echo "<script>alert('Invalid credentials, Please try again');</script>";

                echo $password;
                header('Refresh: 0; url=login.php');
                exit;
            }
        } else {
            echo "<script>alert('User not found, Please try again');</script>";
            header('Refresh: 0; url=login.php');
            exit;
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<script>alert('Unauthorized access!');</script>";
    header('Refresh: 0; url=login.php');
    exit;
}
