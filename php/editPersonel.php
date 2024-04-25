<?php
include('db_conn.php');
include('autoRedirect.php');

if (isset($_POST['editPersonelButton'])) {
    $editId = $_POST['editId'];
    $editPersonelName = $_POST['editPersonelName'];
    $editDesignation = $_POST['editDesignation'];
    $editProject = $_POST['editProject'];

    $promt = "edited a personnel: $editId, name: $editPersonelName, designation: $designation, project: $editProject";

    $history = "INSERT INTO history (transaction, person_incharge) VALUES ('$promt', '$activeName')";
    $historyResult = mysqli_query($conn, $history);

    $sql = "UPDATE personel SET personelName = '$editPersonelName', designation = '$editDesignation', project = '$editProject'
            WHERE id = $editId";
    $result = mysqli_query($conn, $sql);
    echo '<script>
            window.location.href = "/ptss/pages/personel.php";
            alert("User Updated.")
        </script>';
}

if (isset($_GET['id'])) {
    $personelId = $_GET['id'];
    $stmt = $conn->prepare("SELECT personelName, designation, project FROM personel WHERE id = ?");
    $stmt->bind_param("i", $personelId);
    $stmt->execute();
    $stmt->bind_result($personelName, $designation, $project);
    if ($stmt->fetch()) {
        echo json_encode(
            array(
                'personelName' => $personelName,
                'designation' => $designation,
                'project' => $project
            )
        );
    } else {
        echo json_encode(array('error' => 'User not found'));
    }
    $stmt->close();
} else {
    echo json_encode(array('error' => 'No ID provided'));
}
$conn->close();
?>