<?php
include('db_conn.php');

if (isset($_POST['projectName'])) {
    $projectName = $_POST['projectName'];

    // Prepare and execute SQL query to fetch project order
    $sql = "SELECT projectOrder FROM projects WHERE projectName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $projectName);
    $stmt->execute();
    $result = $stmt->get_result();

    // Fetch project order from the result
    $projectOrder = $result->fetch_assoc();

    // Check if project order is fetched successfully
    if ($projectOrder) {
        // Extract task list from project order (assuming it's stored as a JSON string)
        $taskList = json_decode($projectOrder['projectOrder'], true);

        // Format task names to PascalCase and add space between words if necessary
        $formattedTaskList = array_map(function ($task) {
            return str_replace(' ', '', ucwords($task));
        }, $taskList);

        // Return formatted task list as JSON
        echo json_encode($taskList);
    } else {
        // Handle case where project order is not found
        echo json_encode(array('error' => 'Project order not found'));
    }
} else {
    // Handle invalid request
    echo json_encode(array('error' => 'Invalid request'));
}
?>