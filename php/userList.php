<?php
include('db_conn.php');

$sql = "SELECT DISTINCT id, name FROM users WHERE category = 'Project Coordinator'";
$coordinatorList = mysqli_query($conn, $sql);

$sql = "SELECT DISTINCT id, name FROM users WHERE category = 'Project Team Leader'";
$teamLeaderList = mysqli_query($conn, $sql);

$sql = "SELECT * FROM users";
$userList = mysqli_query($conn, $sql);

?>