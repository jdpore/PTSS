<?php
include('db_conn.php');

if (isset($_COOKIE['ptss-user'])) {
    $coockieUser = $_COOKIE['ptss-user'];
    $sql1 = "SELECT * FROM users WHERE username = '$coockieUser'";
    $result1 = mysqli_query($conn, $sql1);

    while ($qResult = mysqli_fetch_array($result1)) {
        $id = $qResult['id'];
        $name = $qResult['name'];
        $activeName = $qResult['name'];
        $username = $qResult['username'];
        $password = $qResult['password'];
        $category = $qResult['category'];
        $stat = $qResult['status'];
    }
} else {
    // If the cookie is not set, prompt the user to login
    echo '<script>
            window.location.href = "../index.php";
            alert("Please log in to access the welcome page!");
          </script>';
}

?>