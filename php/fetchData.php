<?php
include('db_conn.php');


if (isset($_POST['projectId'])) {
    $projectId = $_POST['projectId'];
    $projectName = $_POST['projectName'];

    $sql = "SELECT projectOrder FROM projects WHERE projectName = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $projectName);
    $stmt->execute();
    $result = $stmt->get_result();
    $projectOrder = $result->fetch_assoc();

    // Check if project order is fetched successfully
    if ($projectOrder) {
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


        $sql = "SELECT $taskString FROM output WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $projectId); // Assuming project ID is an integer
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if data is fetched successfully
        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            // Return fetched data as JSON
            echo json_encode($data);
        } else {
            // Handle case where no data is found
            echo json_encode(array('error' => 'No data found for the specified project ID'));
        }
    } else {
        // Handle case where project order is not found
        echo json_encode(array('error' => 'Project order not found'));
    }
} else {
    // Handle invalid request
    echo json_encode(array('error' => 'Invalid request'));
}
?>