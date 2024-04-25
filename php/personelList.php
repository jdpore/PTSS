<?php
include('db_conn.php');
include('autoRedirect.php');

$personelQuery = "SELECT * FROM personel";
$personelList = mysqli_query($conn, $personelQuery);
?>