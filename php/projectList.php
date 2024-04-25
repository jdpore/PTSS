<?php
include('db_conn.php');
include('autoRedirect.php');

$condition = "";

switch ($category) {
    case 'Admin':
        $condition = "WHERE status = 'ongoing'";
        break;
    case 'Project Coordinator':
        $condition = "WHERE coordinator = '$name' AND status = 'ongoing'";
        break;
    case 'Team Leader':
        $condition = "WHERE teamLeader = '$name' AND status = 'ongoing'";
        break;
}

$sql = "SELECT * FROM projects $condition";
$projectList = mysqli_query($conn, $sql);

$projectArray = array();
while ($row = mysqli_fetch_assoc($projectList)) {
    $projectArray[] = $row['projectName'];
    $projectName = $row['projectName'];
    $coordinator = $row['coordinator'];
}
$projectArrayString = implode(',', $projectArray);
if (count($projectArray) == 1) {
    $projectArrayString = "'" . $projectArrayString . "'";
} else {
    $projectArrayString = implode(',', array_map(function ($value) {
        return "'" . $value . "'";
    }, $projectArray));
}
?>