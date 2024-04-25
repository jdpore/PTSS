<?php
include('db_conn.php');
include('autoRedirect.php');

if (isset($_POST['editUserButton'])) {
    $editId = $_POST['editId'];
    $editName = $_POST['editName'];
    $editUserName = $_POST['editUserName'];
    $editPassword = $_POST['editPassword'];
    $hashedPassword = password_hash($editPassword, PASSWORD_DEFAULT);
    $editCategory = $_POST['editCategory'];

    $promt = "edited a user $editId, name: $editPersonelName, designation: $designation, project: $editProject";

    $history = "INSERT INTO history (transaction, person_incharge) VALUES ('$promt', '$activeName')";
    $historyResult = mysqli_query($conn, $history);

    $sql = "UPDATE users SET name = '$editName', username = '$editUserName', password = '$hashedPassword', category = '$editCategory'
            WHERE id = $editId";
    $result = mysqli_query($conn, $sql);
    echo '<script>
            window.location.href = "/ptss/pages/user.php";
            alert("User Updated.")
        </script>';
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    $stmt = $conn->prepare("SELECT name, username, category FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($name, $username, $category);
    if ($stmt->fetch()) {
        // Include userId in the array
        $userArray = array(
            'userId' => $userId,
            'name' => $name,
            'username' => $username,
            'category' => $category
        );
        echo json_encode($userArray);
    } else {
        echo json_encode(array('error' => 'User not found'));
    }
    $stmt->close();
} else {
    echo json_encode(array('error' => 'No ID provided'));
}
$conn->close();
?>