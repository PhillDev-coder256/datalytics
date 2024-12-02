<?php

if (isset($_POST['register'])) {
    // Proceed with processing

    include_once('../includes/dbconnection.php');

    $fullname = htmlspecialchars($_POST['fname']);
    $username = htmlspecialchars($_POST['uname']);
    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['a_type']);

    if ($role == "none") { ?>
        <script>
            alert("Invalid usertype selected, Please try again");
            window.location.href = "./register.php";
        </script>
        <?php }

    $password = htmlspecialchars($_POST['pass'], ENT_QUOTES, 'UTF-8');
    $cpass = htmlspecialchars($_POST['cpass']);

    if ($password == $cpass) {
        try {
            // Hash the password
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Check for existing username or student ID
            $sql2 = "SELECT * FROM users WHERE username = :uname OR email = :email";
            $query2 = $dbh->prepare($sql2);
            $query2->bindParam(':uname', $username, PDO::PARAM_STR);
            $query2->bindParam(':email', $email, PDO::PARAM_STR);
            $query2->execute();

            if ($query2->rowCount() <= 0) {

                $sql = "INSERT INTO users(fullname, username, email, role, password)VALUES(:fname, :uname, :email, :role, :pass)";
                $query = $dbh->prepare($sql);
                $query->bindParam(':fname', $fullname, PDO::PARAM_STR);
                $query->bindParam(':uname', $username, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':role', $role, PDO::PARAM_STR);
                $query->bindParam(':pass', $password, PDO::PARAM_STR);
                $query->execute();

                $LastInsertId = $dbh->lastInsertId();

                if ($LastInsertId > 0) { ?>
                    <script>
                        alert("User registered successfully");
                        window.location.href = "./";
                    </script>
                <?php } else { ?>
                    <script>
                        alert("Error while registering user, Please try again");
                        window.location.href = "register.php";
                    </script>
                <?php }
            } else { ?>
                <script>
                    alert("User with same username or email already exists, Please try again");
                    window.location.href = "register.php";
                </script>
        <?php }
        } catch (Exception $e) {
            echo "Error hashing password: " . $e->getMessage();
        }
    } else { ?>
        <script>
            alert("Passwords don't match, Please try again");
        </script>
    <?php }
} else { ?>
    <script>
        alert("You're not authorised to use this file, Please try again");
        window.location.href = "register.php";
    </script>
<?php }

?>