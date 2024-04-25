<?php
include('db_conn.php');

$selectedProject = $_GET['project'];

// Perform a query to fetch coordinators based on the selected project
$query = "SELECT coordinator FROM projects WHERE projectName = '$selectedProject'";
$result = $conn->query($query);

// Create an array to store the fetched coordinators
$coordinators = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $coordinators[] = $row;
    }
}

// Return the coordinators as a JSON response
echo json_encode($coordinators);

?>