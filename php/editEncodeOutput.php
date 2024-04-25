<?php
include('db_conn.php');
include('autoRedirect.php');

if (isset($_POST['encodeOutputButton'])) {
    $idToUpdate = $_POST['id']; // Assuming there's a hidden input field for the ID to update

    $project = $_POST['project'];
    $personel = $_POST['personelName'];
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
    $microFilmingTime = $_POST['microFilmingTime'];
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
    // Retrieve other form fields as before

    $promt = "Updated output id: $idToUpdate";
    $history = "INSERT INTO history (transaction, person_incharge) VALUES ('$promt', '$activeName')";
    $historyResult = mysqli_query($conn, $history);
    // Construct the update query
    $updateQuery = "UPDATE output SET 
                    project = '$project',
                    personelName = '$personel',
                    projectCoordinator = '$projectCoordinator',
                    date = '$date',
                    documentPreparation = '$documentPreparation',
                    documentPreparationTime = '$documentPreparationTime',
                    scanning = '$scanning',
                    scanningTime = '$scanningTime',
                    qualityAssurance = '$qualityAssurance',
                    qualityAssuranceTime = '$qualityAssuranceTime',
                    indexing = '$indexing',
                    indexingTime = '$indexingTime',
                    microFilming = '$microFilming',
                    microFilmingTime = '$microFilmingTime',
                    refiling = '$refiling',
                    refilingTime = '$refilingTime',
                    uploading = '$uploading',
                    uploadingTime = '$uploadingTime',
                    conversion = '$conversion',
                    conversionTime = '$conversionTime',
                    imageQualityAssurance = '$imageQualityAssurance',
                    imageQualityAssuranceTime = '$imageQualityAssuranceTime',
                    stuffing = '$stuffing',
                    stuffingTime = '$stuffingTime',
                    printing = '$printing',
                    printingTime = '$printingTime',
                    cropping = '$cropping',
                    croppingTime = '$croppingTime',
                    submission = '$submission',
                    submissionTime = '$submissionTime',
                    releasing = '$releasing',
                    releasingTime = '$releasingTime',
                    remarks = '$remarks'
                    WHERE id = '$idToUpdate'";

    // Execute the update query
    $updateResult = mysqli_query($conn, $updateQuery);
    $redirectUrl = "/ptss/pages/productionOutput.php?updatedList=$project&status=updated";

    echo '<script>
        window.location.href = "' . $redirectUrl . '";
        alert("Output Edited.");
    </script>';
}
?>