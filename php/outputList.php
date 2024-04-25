<?php
include_once('db_conn.php');

if (isset($_GET['projectName'])) {
    $projectName = $_GET['projectName'];

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
        $taskListWithTime = [];

        foreach ($taskList as $task) {
            $taskListWithTime[] = $task . "Time";
            $taskListWithTime[] = $task;
        }

        $taskListWithTime = array_unique($taskListWithTime);
        sort($taskListWithTime);

        $details = array("id", "project", "personelName", "projectCoordinator", "date");
        $remarks = "remarks";
        $fullTask = array_merge($details, $taskListWithTime, array($remarks));

        $formattedTaskList = array_map(function ($task) {
            return str_replace(' ', '', ucwords($task));
        }, $fullTask);
        $taskString = implode(', ', $fullTask);


        $outputQuery = "SELECT $taskString FROM output where project = '$projectName'";
        $outputResult = mysqli_query($conn, $outputQuery);
        $rows = mysqli_fetch_all($outputResult, MYSQLI_ASSOC);
        session_start();
        print_r($rows);
        $_SESSION['outputResult'] = $rows;
        $_SESSION['taskList'] = $fullTask;
        $_SESSION['formattedTaskList'] = $formattedTaskList;
        $_SESSION['projectName'] = $projectName;
        header("Location: ../pages/output.php");
    } else {
        // Handle case where project order is not found
        echo json_encode(array('error' => 'Project order not found'));
    }
}

?>