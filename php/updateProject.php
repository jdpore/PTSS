<?php
include('db_conn.php');
include('autoRedirect.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $promt = "Ended project: $id";

    $history = "INSERT INTO history (transaction, person_incharge) VALUES ('$promt', '$activeName')";
    $historyResult = mysqli_query($conn, $history);

    $sql = "UPDATE projects SET status = 'ended'
            WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    echo '<script>
            window.location.href = "/ptss/pages/dashboard.php";
            alert("Project Ended.")
        </script>';
}
$conn->close();
?>