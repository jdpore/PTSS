<?php
include('db_conn.php');

if (isset($_GET['deleteUserId'])) {
    $id = $_GET['deleteUserId'];

    $sql = "delete from users where id='$id'";
    $result = mysqli_query($conn, $sql);
    header("location:../pages/user.php");
}

if (isset($_GET['deletePersonelId'])) {
    $id = $_GET['deletePersonelId'];

    $sql = "delete from personel where id='$id'";
    $result = mysqli_query($conn, $sql);
    header("location:../pages/personel.php");
}
?>