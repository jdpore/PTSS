<?php
include('db_conn.php');
include('autoRedirect.php');

if (isset($_POST['encodeOutputButton'])) {
    $project = $_POST['project'];
    $personel = $_POST['personel'];
    $projectCoordinator = $_POST['projectCoordinator'];
    $date = $_POST['date'];
    $documentPreparation = $_POST['documentPreparation'];
    $documentPreparationTime = $_POST['documentPreparationTime'];
    $scanning = $_POST['scanning'];
    $scanningTime = $_POST['scanningTime'];
    $qualityAssurance = $_POST['qualityAssurance'];
    $qualityAssuranceTime = $_POST['qualityAssuranceTime'];
    $indexing = $_POST['indexing'];
    $indexingTime = $_POST['indexingTime'];
    $microFilming = $_POST['microFilming'];
    $microfilmingTime = $_POST['microfilmingTime'];
    $refiling = $_POST['refiling'];
    $refilingTime = $_POST['refilingTime'];
    $uploading = $_POST['uploading'];
    $uploadingTime = $_POST['uploadingTime'];
    $conversion = $_POST['conversion'];
    $conversionTime = $_POST['conversionTime'];
    $imageQualitytyAssurance = $_POST['imageQualityAssurance'];
    $imageQualityAssuranceTime = $_POST['imageQualityAssuranceTime'];
    $stuffing = $_POST['stuffing'];
    $stuffingTime = $_POST['stuffingTime'];
    $printing = $_POST['printing'];
    $printingTime = $_POST['printingTime'];
    $cropping = $_POST['cropping'];
    $croppingTime = $_POST['croppingTime'];
    $submission = $_POST['submission'];
    $submissionTime = $_POST['submissionTime'];
    $releasing = $_POST['releasing'];
    $releasingTime = $_POST['releasingTime'];
    $remarks = $_POST['remarks'];


    $idQuery = "SELECT * FROM output";
    $idResult = mysqli_query($conn, $idQuery);
    $idNumber = mysqli_num_rows($idResult);
    $idNumber = $idNumber + 301;

    $promt = "Inserted output of personnel: $personel, project: $project";

    $history = "INSERT INTO history (transaction, person_incharge) VALUES ('$promt', '$activeName')";
    $historyResult = mysqli_query($conn, $history);

    $insertQuery = "INSERT INTO output (id, project, personelName, projectCoordinator, date, documentPreparation, documentPreparationTime, 
                    scanning, scanningTime, qualityAssurance, qualityAssuranceTime, indexing, indexingTime, microFilming, microFilmingTime, 
                    refiling, refilingTime, uploading, uploadingTime, conversion, conversionTime, imageQualityAssurance, imageQualityAssuranceTime,
                    stuffing, stuffingTime, printing, printingTime, cropping, croppingTime, submission, submissionTime, releasing, releasingTime, remarks)
                    VALUES ('$idNumber', '$project', '$personel', '$projectCoordinator', '$date', '$documentPreparation', '$documentPreparationTime', 
                    '$scanning', '$scanningTime', '$qualityAssurance', '$qualityAssuranceTime', '$indexing', '$indexingTime', '$microFilming', '$microfilmingTime', 
                    '$refiling', '$refilingTime', '$uploading', '$uploadingTime', '$conversion', '$conversionTime', '$imageQualityAssurance', '$imageQualityAssuranceTime',
                    '$stuffing', '$stuffingTime', '$printing', '$printingTime', '$cropping', '$croppingTime', '$submission', '$submissionTime', '$releasing', '$releasingTime', '$remarks')";

    $encodeOutput = mysqli_query($conn, $insertQuery);
    $redirectUrl = "/ptss/pages/encode.php?openModal=true";

    echo '<script>
            window.location.href = "' . $redirectUrl . '";
            alert("Output added.")
        </script>';
    exit();
}

?>