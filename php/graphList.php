<?php
include('db_conn.php');

if (isset($_GET['projectName'])) {
    $project = $_GET['projectName'];
    $projectId = $_GET['projectId'];

    // Fetch actual values
    $sqlActual = "SELECT 
                SUM(documentPreparation) AS totalDocumentPreparation,
                SUM(scanning) AS totalScanning,
                SUM(qualityAssurance) AS totalQualityAssurance,
                SUM(indexing) AS totalIndexing,
                SUM(microFilming) AS totalMicroFilming,
                SUM(refiling) AS totalRefiling,
                SUM(uploading) AS totalUploading,
                SUM(conversion) AS totalConversion,
                SUM(imageQualityAssurance) AS totalImageQualityAssurance,
                SUM(stuffing) AS totalStuffing,
                SUM(printing) AS totalPrinting,
                SUM(cropping) AS totalCropping,
                SUM(submission) AS totalSubmission,
                SUM(releasing) AS totalReleasing
            FROM output
            WHERE project = '$project'";

    $resultActual = $conn->query($sqlActual);
    if ($resultActual) {
        $rowsActual = $resultActual->fetch_assoc();
        $totalDocumentPreparation = $rowsActual['totalDocumentPreparation'];
        $totalScanning = $rowsActual['totalScanning'];
        $totalQualityAssurance = $rowsActual['totalQualityAssurance'];
        $totalIndexing = $rowsActual['totalIndexing'];
        $totalMicroFilming = $rowsActual['totalMicroFilming'];
        $totalRefiling = $rowsActual['totalRefiling'];
        $totalUploading = $rowsActual['totalUploading'];
        $totalConversion = $rowsActual['totalConversion'];
        $totalImageQualityAssurance = $rowsActual['totalImageQualityAssurance'];
        $totalStuffing = $rowsActual['totalStuffing'];
        $totalPrinting = $rowsActual['totalPrinting'];
        $totalCropping = $rowsActual['totalCropping'];
        $totalSubmission = $rowsActual['totalSubmission'];
        $totalReleasing = $rowsActual['totalReleasing'];

        // Store the actual values in session
        session_start();
        $_SESSION['projectId'] = $projectId;
        $_SESSION['totalDocumentPreparation'] = $totalDocumentPreparation;
        $_SESSION['totalScanning'] = $totalScanning;
        $_SESSION['totalQualityAssurance'] = $totalQualityAssurance;
        $_SESSION['totalIndexing'] = $totalIndexing;
        $_SESSION['totalMicroFilming'] = $totalMicroFilming;
        $_SESSION['totalRefiling'] = $totalRefiling;
        $_SESSION['totalUploading'] = $totalUploading;
        $_SESSION['totalConversion'] = $totalConversion;
        $_SESSION['totalImageQualityAssurance'] = $totalImageQualityAssurance;
        $_SESSION['totalStuffing'] = $totalStuffing;
        $_SESSION['totalPrinting'] = $totalPrinting;
        $_SESSION['totalCropping'] = $totalCropping;
        $_SESSION['totalSubmission'] = $totalSubmission;
        $_SESSION['totalReleasing'] = $totalReleasing;
    } else {
        echo "Error: " . $sqlActual . "<br>" . $conn->error;
    }

    // Fetch target values
    $sqlTarget = "SELECT * FROM projects WHERE projectName = '$project'";

    $resultTarget = $conn->query($sqlTarget);
    if ($resultTarget) {
        $rowsTarget = $resultTarget->fetch_assoc();

        $projectName = $rowsTarget['projectName'];
        $durationFrom = $rowsTarget['durationFrom'];
        $durationTo = $rowsTarget['durationTo'];
        $coordinator = $rowsTarget['coordinator'];
        $contactPerson = $rowsTarget['contactPerson'];
        $documentPreparationAll = $rowsTarget['documentPreparationAll'];
        $scanningAll = $rowsTarget['scanningAll'];
        $qualityAssuranceAll = $rowsTarget['qualityAssuranceAll'];
        $indexingAll = $rowsTarget['indexingAll'];
        $microFilmingAll = $rowsTarget['microFilmingAll'];
        $refilingAll = $rowsTarget['refilingAll'];
        $uploadingAll = $rowsTarget['uploadingAll'];
        $uploading = $rowsTarget['uploading'];
        $conversionAll = $rowsTarget['conversionAll'];
        $conversion = $rowsTarget['conversion'];
        $imageQualityAssuranceAll = $rowsTarget['imageQualityAssuranceAll'];
        $imageQualityAssurance = $rowsTarget['imageQualityAssurance'];
        $stuffingAll = $rowsTarget['stuffingAll'];
        $stuffing = $rowsTarget['stuffing'];
        $printingAll = $rowsTarget['printingAll'];
        $printing = $rowsTarget['printing'];
        $croppingAll = $rowsTarget['croppingAll'];
        $cropping = $rowsTarget['cropping'];
        $submissionAll = $rowsTarget['submissionAll'];
        $submission = $rowsTarget['submission'];
        $releasingAll = $rowsTarget['releasingAll'];
        $releasing = $rowsTarget['releasing'];

        $projectOrder = $rowsTarget['projectOrder']; // New addition

        $_SESSION['projectName'] = $projectName;
        $_SESSION['durationFrom'] = $durationFrom;
        $_SESSION['durationTo'] = $durationTo;
        $_SESSION['coordinator'] = $coordinator;
        $_SESSION['contactPerson'] = $contactPerson;
        $_SESSION['documentPreparationAll'] = $documentPreparationAll;
        $_SESSION['scanningAll'] = $scanningAll;
        $_SESSION['qualityAssuranceAll'] = $qualityAssuranceAll;
        $_SESSION['indexingAll'] = $indexingAll;
        $_SESSION['microFilmingAll'] = $microFilmingAll;
        $_SESSION['refilingAll'] = $refilingAll;
        $_SESSION['uploadingAll'] = $uploadingAll;
        $_SESSION['conversionAll'] = $conversionAll;
        $_SESSION['imageQualityAssuranceAll'] = $imageQualityAssuranceAll;
        $_SESSION['stuffingAll'] = $stuffingAll;
        $_SESSION['printingAll'] = $printingAll;
        $_SESSION['croppingAll'] = $croppingAll;
        $_SESSION['submissionAll'] = $submissionAll;
        $_SESSION['releasingAll'] = $releasingAll;

        $_SESSION['projectOrder'] = $projectOrder; // New addition
        echo $projectOrder;
    } else {
        echo "Error: " . $sqlTarget . "<br>" . $conn->error;
    }

    // Redirect to the next page
    header("Location: ../pages/graph.php");
    exit();
}
if (isset($_POST['datesButton'])) {
    $projectId = $_POST['projectId'];
    $project = $_POST['projectName'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];

    // Fetch actual values
    $sqlActual = "SELECT 
                SUM(documentPreparation) AS totalDocumentPreparation,
                SUM(scanning) AS totalScanning,
                SUM(qualityAssurance) AS totalQualityAssurance,
                SUM(indexing) AS totalIndexing,
                SUM(microFilming) AS totalMicroFilming,
                SUM(refiling) AS totalRefiling,
                SUM(uploading) AS totalUploading,
                SUM(conversion) AS totalConversion,
                SUM(imageQualityAssurance) AS totalImageQualityAssurance,
                SUM(stuffing) AS totalStuffing,
                SUM(printing) AS totalPrinting,
                SUM(cropping) AS totalCropping,
                SUM(submission) AS totalSubmission,
                SUM(releasing) AS totalReleasing
            FROM output
            WHERE date BETWEEN '$startDate' AND '$endDate' AND project = '$project'";

    $resultActual = $conn->query($sqlActual);
    $resultActual = $conn->query($sqlActual);
    if ($resultActual) {
        $rowsActual = $resultActual->fetch_assoc();
        $totalDocumentPreparation = $rowsActual['totalDocumentPreparation'];
        $totalScanning = $rowsActual['totalScanning'];
        $totalQualityAssurance = $rowsActual['totalQualityAssurance'];
        $totalIndexing = $rowsActual['totalIndexing'];
        $totalMicroFilming = $rowsActual['totalMicroFilming'];
        $totalRefiling = $rowsActual['totalRefiling'];
        $totalUploading = $rowsActual['totalUploading'];
        $totalConversion = $rowsActual['totalConversion'];
        $totalImageQualityAssurance = $rowsActual['totalImageQualityAssurance'];
        $totalStuffing = $rowsActual['totalStuffing'];
        $totalPrinting = $rowsActual['totalPrinting'];
        $totalCropping = $rowsActual['totalCropping'];
        $totalSubmission = $rowsActual['totalSubmission'];
        $totalReleasing = $rowsActual['totalReleasing'];

        // Store the actual values in session
        session_start();
        $_SESSION['projectId'] = $projectId;
        $_SESSION['totalDocumentPreparation'] = $totalDocumentPreparation;
        $_SESSION['totalScanning'] = $totalScanning;
        $_SESSION['totalQualityAssurance'] = $totalQualityAssurance;
        $_SESSION['totalIndexing'] = $totalIndexing;
        $_SESSION['totalMicroFilming'] = $totalMicroFilming;
        $_SESSION['totalRefiling'] = $totalRefiling;
        $_SESSION['totalUploading'] = $totalUploading;
        $_SESSION['totalConversion'] = $totalConversion;
        $_SESSION['totalImageQualityAssurance'] = $totalImageQualityAssurance;
        $_SESSION['totalStuffing'] = $totalStuffing;
        $_SESSION['totalPrinting'] = $totalPrinting;
        $_SESSION['totalCropping'] = $totalCropping;
        $_SESSION['totalSubmission'] = $totalSubmission;
        $_SESSION['totalReleasing'] = $totalReleasing;
    } else {
        echo "Error: " . $sqlActual . "<br>" . $conn->error;
    }

    // Fetch target values
    $sqlTarget = "SELECT * FROM projects WHERE projectName = '$project'";

    $resultTarget = $conn->query($sqlTarget);
    $resultTarget = $conn->query($sqlTarget);
    if ($resultTarget) {
        $rowsTarget = $resultTarget->fetch_assoc();

        $projectName = $rowsTarget['projectName'];
        $durationFrom = $rowsTarget['durationFrom'];
        $durationTo = $rowsTarget['durationTo'];
        $coordinator = $rowsTarget['coordinator'];
        $contactPerson = $rowsTarget['contactPerson'];
        $documentPreparationAll = $rowsTarget['documentPreparationAll'];
        $scanningAll = $rowsTarget['scanningAll'];
        $qualityAssuranceAll = $rowsTarget['qualityAssuranceAll'];
        $indexingAll = $rowsTarget['indexingAll'];
        $microFilmingAll = $rowsTarget['microFilmingAll'];
        $refilingAll = $rowsTarget['refilingAll'];
        $uploadingAll = $rowsTarget['uploadingAll'];
        $conversionAll = $rowsTarget['conversionAll'];
        $imageQualityAssuranceAll = $rowsTarget['imageQualityAssuranceAll'];
        $stuffingAll = $rowsTarget['stuffingAll'];
        $printingAll = $rowsTarget['printingAll'];
        $croppingAll = $rowsTarget['croppingAll'];
        $submissionAll = $rowsTarget['submissionAll'];
        $releasingAll = $rowsTarget['releasingAll'];

        $projectOrder = $rowsTarget['projectOrder']; // New addition

        $_SESSION['projectName'] = $projectName;
        $_SESSION['durationFrom'] = $durationFrom;
        $_SESSION['durationTo'] = $durationTo;
        $_SESSION['coordinator'] = $coordinator;
        $_SESSION['contactPerson'] = $contactPerson;
        $_SESSION['documentPreparationAll'] = $documentPreparationAll;
        $_SESSION['scanningAll'] = $scanningAll;
        $_SESSION['qualityAssuranceAll'] = $qualityAssuranceAll;
        $_SESSION['indexingAll'] = $indexingAll;
        $_SESSION['microFilmingAll'] = $microFilmingAll;
        $_SESSION['refilingAll'] = $refilingAll;
        $_SESSION['uploadingAll'] = $uploadingAll;
        $_SESSION['conversionAll'] = $conversionAll;
        $_SESSION['imageQualityAssuranceAll'] = $imageQualityAssuranceAll;
        $_SESSION['stuffingAll'] = $stuffingAll;
        $_SESSION['printingAll'] = $printingAll;
        $_SESSION['croppingAll'] = $croppingAll;
        $_SESSION['submissionAll'] = $submissionAll;
        $_SESSION['releasingAll'] = $releasingAll;

        $_SESSION['projectOrder'] = $projectOrder; // New addition
        echo $projectOrder;
    } else {
        echo "Error: " . $sqlTarget . "<br>" . $conn->error;
    }

    // Redirect to the next page
    header("Location: ../pages/graph.php");
    exit();
}
?>