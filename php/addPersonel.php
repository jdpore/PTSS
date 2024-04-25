<?php
include('db_conn.php');
include('autoRedirect.php');

if (isset($_POST['addPersonelButton'])) {
    $personelName = $_POST['personelName'];
    $designation = $_POST['designation'];
    $project = $_POST['project'];

    $promt = "created a personel for $project: $personelName, designation: $designation, project: $project";

    $history = "INSERT INTO history (transaction, person_incharge) VALUES ('$promt', '$activeName')";
    $historyResult = mysqli_query($conn, $history);

    $sql = "SELECT * FROM personel WHERE personelName = '$personelName'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    if ($check == 1) {
        echo '<script>
                        window.location.href = "/ptss/pages/personel.php";
                        alert("Personel already exist.")
                    </script>';
        exit();
    } else {
        $idQuery = "SELECT * FROM personel";
        $idResult = mysqli_query($conn, $idQuery);
        $idNumber = mysqli_num_rows($idResult);
        $idNumber = $idNumber + 201;
        $insertQuery = "INSERT INTO personel (id, personelName, designation, project)
                        VALUES ('$idNumber', '$personelName', '$designation', '$project')";
        $addPPersonel = mysqli_query($conn, $insertQuery);
        echo '<script>
                        window.location.href = "/ptss/pages/personel.php";
                        alert("Personel added.")
                    </script>';
        exit();
    }
}

?>