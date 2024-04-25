<?php
include('db_conn.php');


// Check if the 'user' cookie is set
if (isset($_COOKIE['ptss-user'])) {
    $coockieUser = $_COOKIE['ptss-user'];
    $sql = "SELECT * FROM users WHERE username = '$coockieUser'";
    $result = mysqli_query($conn, $sql);

    while ($qResult = mysqli_fetch_array($result)) {
        $id = $qResult['id'];
        $name = $qResult['name'];
        $username = $qResult['username'];
        $password = $qResult['password'];
        $category = $qResult['category'];
        $stat = $qResult['status'];
    }
    header("Location: ./pages/dashboard.php");
    exit();
}
?>