<?php
include_once('db_conn.php');

if (isset($_POST['login'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Hash the password before checking it in the database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $qResult = mysqli_fetch_assoc($result);

        // Verify the hashed password
        if (password_verify($password, $qResult['password'])) {
            $id = $qResult['id'];
            $name = $qResult['name'];
            $category = $qResult['category'];
            $status = $qResult['status'];

            if ($status == "offline") {
                $sql = "UPDATE users SET status = 'online', log_at = CURRENT_TIMESTAMP WHERE username = '$username'";
                $result2 = mysqli_query($conn, $sql);

                $cookieName = "ptss-user";
                $cookieValue = $username;
                $expirationTime = time() + 86400; // 86400 seconds = 1 day
                $cookiePath = "/"; // The cookie is available throughout the entire domain
                setcookie($cookieName, $cookieValue, $expirationTime, $cookiePath);

                // Redirect to the welcome page
                header("Location: /ptss/pages/dashboard.php");
                exit();
            }
            if ($status == "new") {
                header("Location: /ptss/firstTimeLogin.php?username=$username");
                exit();
            } else {
                echo '<script>
                        window.location.href = "/ptss/index.php";
                        alert("Account is in use.")
                    </script>';
                exit();
            }
        } else {
            echo '<script>
                        window.location.href = "/ptss/index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
        }
    } else {
        echo '<script>
                        window.location.href = "/ptss/index.php";
                        alert("Login failed. Invalid username or password!!")
                    </script>';
    }
}

if (isset($_POST['newLogin'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "UPDATE users SET password = '$hashedPassword', status = 'online', log_at = CURRENT_TIMESTAMP WHERE username = '$username'";
    $result2 = mysqli_query($conn, $sql);

    $cookieName = "ptss-user";
    $cookieValue = $username;
    $expirationTime = time() + 86400; // 86400 seconds = 1 day
    $cookiePath = "/"; // The cookie is available throughout the entire domain
    setcookie($cookieName, $cookieValue, $expirationTime, $cookiePath);

    // Redirect to the welcome page
    header("Location: /ptss/pages/dashboard.php");
    exit();
}
?>