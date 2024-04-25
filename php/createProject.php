<?php
include('db_conn.php');
include('autoRedirect.php');

if (isset($_POST['createProjectButton'])) {
    $projectName = $_POST['projectName'];
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $projectCoordinator = $_POST['projectCoordinator'];
    $teamLeader = $_POST['teamLeader'];
    $clientContactPerson = $_POST['clientContactPerson'];
    $documentPreparationAll = $_POST['documentPreparation'];
    $documentPreparation = $_POST['dailydocumentPreparation'];
    $scanningAll = $_POST['scanning'];
    $scanning = $_POST['dailyscanning'];
    $qualityAssuranceAll = $_POST['qualityAssurance'];
    $qualityAssurance = $_POST['dailyqualityAssurance'];
    $indexingAll = $_POST['indexing'];
    $indexing = $_POST['dailyindexing'];
    $microFilmingAll = $_POST['microfilming'];
    $microFilming = $_POST['dailymicrofilming'];
    $refilingAll = $_POST['refiling'];
    $refiling = $_POST['dailyrefiling'];
    $uploadingAll = $_POST['uploading'];
    $uploading = $_POST['dailyuploading'];
    $conversionAll = $_POST['conversion'];
    $conversion = $_POST['dailyconversion'];
    $imageQualityAssuranceAll = $_POST['imageQualityAssurance'];
    $imageQualityAssurance = $_POST['dailyimageQualityAssurance'];
    $stuffingAll = $_POST['stuffing'];
    $stuffing = $_POST['dailystuffing'];
    $printingAll = $_POST['printing'];
    $printing = $_POST['dailyprinting'];
    $croppingAll = $_POST['cropping'];
    $cropping = $_POST['dailycropping'];
    $submissionAll = $_POST['submission'];
    $submission = $_POST['dailysubmission'];
    $releasingAll = $_POST['releasing'];
    $releasing = $_POST['dailyreleasing'];

    // Decode the JSON-encoded array
    $orderClickedJSON = $_POST['orderClicked'];
    $orderClicked = json_decode($orderClickedJSON);

    $sql = "SELECT * FROM projects WHERE projectName = '$projectName'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    if ($check == 1) {
        echo '<script>
                        window.location.href = "/ptss/pages/dashboard.php";
                        alert("Project already exist.")
                    </script>';
        exit();
    } else {
        $idQuery = "SELECT * FROM projects";
        $idResult = mysqli_query($conn, $idQuery);
        $idNumber = mysqli_num_rows($idResult);
        $idNumber = $idNumber + 101;

        $promt = "created a project: $projectName";

        $history = "INSERT INTO history (transaction, person_incharge) VALUES ('$promt', '$activeName')";
        $historyResult = mysqli_query($conn, $history);

        $insertQuery = "INSERT INTO projects (id, projectName, durationFrom, durationTo, coordinator, teamLeader,
                    contactPerson, documentPreparationAll, documentPreparation, scanningAll, scanning, 
                    qualityAssuranceAll, qualityAssurance, indexingAll, indexing, microFilmingAll, microFilming, refilingAll, refiling, status, projectOrder,
                    uploadingAll , uploading, conversionAll, conversion, imageQualityAssuranceAll, imageQualityAssurance, stuffingAll, stuffing, printingAll, 
                    printing, croppingAll, cropping, submissionAll, submission, releasingAll, releasing)
                    VALUES 
                    ('$idNumber', '$projectName', '$dateFrom', '$dateTo', '$projectCoordinator', '$teamLeader',
                    '$clientContactPerson', '$documentPreparationAll', '$documentPreparation', '$scanningAll', '$scanning',
                    '$qualityAssuranceAll', '$qualityAssurance', '$indexingAll', '$indexing', '$microFilmingAll', '$microFilming', '$refilingAll', '$refiling', 'ongoing', '$orderClickedJSON',
                    '$uploadingAll', '$uploading', '$conversionAll', '$conversion', '$imageQualityAssuranceAll', '$imageQualityAssurance', '$stuffingAll', '$stuffing', '$printingAll', 
                    '$printing', '$croppingAll', '$cropping', '$submissionAll', '$submission', '$releasingAll', '$releasing')";
        $addProject = mysqli_query($conn, $insertQuery);
        echo '<script>
        window.location.href = "/ptss/pages/dashboard.php";
                        alert("Project Added.")
                    </script>';
        exit();
    }
}

?>