<?php
include('db_conn.php');

if (isset($_GET['projectName'])) {
    $project = $_GET['projectName'];
    $task = $_GET['task'];
    $taskTime = $task . 'Time';

    $taskQuery = "SELECT projectOrder from projects where projectName = '$project'";
    $taskResult = $conn->query($taskQuery);
    $projectOrder = $taskResult->fetch_assoc();
    $taskList = json_decode($projectOrder['projectOrder'], true);


    $dateQuery = "SELECT DISTINCT date FROM output WHERE project = '$project'";
    $dateResult = $conn->query($dateQuery);

    $dates = array();
    while ($dateRow = $dateResult->fetch_assoc()) {
        $dates[] = $dateRow['date'];
    }

    // Step 2: Construct dynamic pivot query
    $pivotColumns = "";
    foreach ($dates as $date) {
        $dateVolume = 'Volume: ' . $date;
        $dateTime = 'Time: ' . $date;
        $pivotColumns .= "MAX(CASE WHEN date = '$date' THEN $task END) AS '$dateVolume',
                          MAX(CASE WHEN date = '$date' THEN $taskTime END) AS '$dateTime', ";
    }

    // Remove the trailing comma
    $pivotColumns = rtrim($pivotColumns, ', ');

    // Final Query
    $sql = "
    SELECT 
        personelName,
        $pivotColumns
    FROM output
    WHERE $task IS NOT NULL AND $task != 0 AND project = '$project'
    GROUP BY personelName;
";
    session_start();
    $_SESSION['sql'] = $sql;
    $_SESSION['task'] = $taskList;
    header("Location: ../pages/individualPerformance.php?project=$project&task=$task");
}

if (isset($_POST['datesButton'])) {
    $project = $_POST['project'];
    $task = $_POST['task'];
    $taskTime = $task . 'Time';
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];


    $taskQuery = "SELECT projectOrder from projects where projectName = '$project'";
    $taskResult = $conn->query($taskQuery);
    $projectOrder = $taskResult->fetch_assoc();
    $taskList = json_decode($projectOrder['projectOrder'], true);


    $dateQuery = "SELECT DISTINCT date FROM output WHERE date BETWEEN '$startDate' AND '$endDate' AND project = '$project'";
    $dateResult = $conn->query($dateQuery);

    $dates = array();
    while ($dateRow = $dateResult->fetch_assoc()) {
        $dates[] = $dateRow['date'];
    }

    // Step 2: Construct dynamic pivot query
    $pivotColumns = "";
    foreach ($dates as $date) {
        $dateVolume = 'Volume: ' . $date;
        $dateTime = 'Time: ' . $date;
        $pivotColumns .= "MAX(CASE WHEN date = '$date' THEN $task END) AS '$dateVolume',
                          MAX(CASE WHEN date = '$date' THEN $taskTime END) AS '$dateTime', ";
    }

    // Remove the trailing comma
    $pivotColumns = rtrim($pivotColumns, ', ');

    // Final Query
    $sql = "
    SELECT 
        personelName,
        $pivotColumns
    FROM output
    WHERE $task IS NOT NULL AND $task != 0 AND project = '$project'
    GROUP BY personelName;
";
    session_start();
    $_SESSION['sql'] = $sql;
    $_SESSION['task'] = $taskList;
    header("Location: ../pages/individualPerformance.php?project=$project&task=$task");
}
?>