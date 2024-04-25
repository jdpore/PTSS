<?php
include('db_conn.php');
include('autoRedirect.php');

if (isset($_POST['addUserButton'])) {
    $name = $_POST['name'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password
    $category = $_POST['category'];
    $sql = "SELECT * FROM users WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    if ($check == 1) {
        echo '<script>
                        window.location.href = "/ptss/pages/user.php";
                        alert("User already exists.")
                    </script>';
        exit();
    } else {
        $idQuery = "SELECT * FROM users";
        $idResult = mysqli_query($conn, $idQuery);
        $idNumber = mysqli_num_rows($idResult) + 1;

        $promt = "created a user account: $name";

        $history = "INSERT INTO history (transaction, person_incharge) VALUES ('$promt', '$activeName')";
        $historyResult = mysqli_query($conn, $history);

        $insertQuery = "INSERT INTO users (id, name, username, password, category, status)
                        VALUES ('$idNumber', '$name', '$userName', '$hashedPassword', '$category', 'new')";
        $addUser = mysqli_query($conn, $insertQuery);

        if ($addUser) {
            echo '<script>
                        window.location.href = "/ptss/pages/user.php";
                        alert("User added.")
                    </script>';
            exit();
        } else {
            echo '<script>
                        window.location.href = "/ptss/pages/user.php";
                        alert("Error adding user. Please try again.")
                    </script>';
            exit();
        }
    }
}
?>