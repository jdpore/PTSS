<?php
include('../php/autoRedirect.php');
include('../php/graphList.php');
session_start();
$projectId = $_SESSION['projectId'];
$projectName = $_SESSION['projectName'];
$durationFrom = $_SESSION['durationFrom'];
$durationTo = $_SESSION['durationTo'];
$coordinator = $_SESSION['coordinator'];
$contactPerson = $_SESSION['contactPerson'];
$totalDocumentPreparation = $_SESSION['totalDocumentPreparation'];
$totalScanning = $_SESSION['totalScanning'];
$totalQualityAssurance = $_SESSION['totalQualityAssurance'];
$totalIndexing = $_SESSION['totalIndexing'];
$totalMicroFilming = $_SESSION['totalMicroFilming'];
$totalRefiling = $_SESSION['totalRefiling'];
$totalUploading = $_SESSION['totalUploading'];
$totalConversion = $_SESSION['totalConversion'];
$totalImageQualityAssurance = $_SESSION['totalImageQualityAssurance'];
$totalStuffing = $_SESSION['totalStuffing'];
$totalPrinting = $_SESSION['totalPrinting'];
$totalCropping = $_SESSION['totalCropping'];
$totalSubmission = $_SESSION['totalSubmission'];
$totalReleasing = $_SESSION['totalReleasing'];

$targetDocumentPreparation = $_SESSION['documentPreparationAll'];
$targetScanning = $_SESSION['scanningAll'];
$targetQualityAssurance = $_SESSION['qualityAssuranceAll'];
$targetIndexing = $_SESSION['indexingAll'];
$targetMicroFilming = $_SESSION['microFilmingAll'];
$targetRefiling = $_SESSION['refilingAll'];
$targetUploading = $_SESSION['uploadingAll'];
$targetConverison = $_SESSION['conversionAll'];
$targetImageQualityAssurance = $_SESSION['imageQualityAssuranceAll'];
$targetStuffing = $_SESSION['stuffingAll'];
$targetPrinting = $_SESSION['printingAll'];
$targetCropping = $_SESSION['croppingAll'];
$targetSubmission = $_SESSION['submissionAll'];
$targetReleasing = $_SESSION['releasingAll'];

$projectOrder = $_SESSION['projectOrder'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="3600; url=../php/logout.php?logoutid=<?php echo $name ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ptss/css/sidebar.css" rel="stylesheet">
    <link href="/ptss/css/body.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Dashboard - PTSS</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script>
        var userCategory = <?php echo json_encode($category); ?>;
    </script>
    <script src="/ptss/js/hide.js" defer></script>
</head>

<body>
    <nav class="sticky-top navbar navbar-expand-lg navbar-dark bg-dark px-5" style="min-height: 12vh">
        <div class="container-fluid p-0">
            <a class="navbar-brand" href="#">
                <h3>UIC - PTSS</h3>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link">
                            <?php echo $name ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../php/logout.php?logoutid=<?php echo $name; ?>"
                            onclick="return confirm('Logout Account?')">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light" style="height: 88vh">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link custom" href="dashboard.php">
                                <i class="fa-solid fa-chart-pie me-1"></i>
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" href="encode.php">
                                <i class="fa-regular fa-keyboard me-1"></i>
                                Individual Performance
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" href="productionOutput.php">
                                <i class="fa-solid fa-square-poll-horizontal me-1"></i>
                                Production Output
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link custom" href="personel.php">
                                <i class="fa-solid fa-users"></i>
                                Personel
                            </a>
                        </li>
                        <li id="users" class="nav-item  admin">
                            <a class="nav-link custom" href="user.php">
                                <i class="fa-regular fa-user me-1"></i>
                                Users
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md ms-sm-auto col-lg-10 p-0 d-flex flex-column">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3 border-bottom">
                    <h1 class="h3">Projects</h1>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownDates"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dates
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownDates">
                                <!-- Form Code -->
                                <form class="px-4 py-3" method="post" action="../php/graphList.php">
                                    <div class="mb-3 d-none">
                                        <label for="projectId" class="form-label">Project</label>
                                        <input type="text" class="form-control" id="projectId" name="projectId"
                                            value='<?php echo $projectId ?>'>
                                    </div>
                                    <div class="mb-3 d-none">
                                        <label for="projectName" class="form-label">Project</label>
                                        <input type="text" class="form-control" id="projectName" name="projectName"
                                            value='<?php echo $projectName ?>'>
                                    </div>
                                    <div class="mb-3">
                                        <label for="startDate" class="form-label">Start Date</label>
                                        <input type="date" class="form-control" id="startDate" name="startDate">
                                    </div>
                                    <div class="mb-3">
                                        <label for="endDate" class="form-label">End Date</label>
                                        <input type="date" class="form-control" id="endDate" name="endDate">
                                    </div>
                                    <button name="datesButton" type="submit"
                                        class="btn btn-success w-100">Apply</button>
                                </form>
                            </div>
                        </div>
                        <button class="btn btn-secondary ms-2 btn-sm" id="downloadPDF">Download PDF</button>
                        <button class="btn btn-danger ms-2 btn-sm"
                            onclick="confirmEndProject(<?php echo $projectId ?>)">End Project</button>
                        <button class="btn btn-primary ms-2 btn-sm"
                            onclick="window.location.href='dashboard.php'">Back</button>

                    </div>
                </div>
                <div id="content" class="container-fluid mt-5 px-5 flex-grow-1">
                    <div class="row gx-3">
                        <div class="col-md-4">
                            <div class="p-3 bg-light border rounded overflow-auto">
                                <h2 class="mb-4">
                                    <?php echo $projectName ?>
                                </h2>
                                <p>Coordinator:
                                    <?php echo $coordinator ?>
                                </p>
                                <p>Contact Person:
                                    <?php echo $contactPerson ?>
                                </p>
                                <div class="mt-3">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Category</th>
                                                <th>Target</th>
                                                <th>Actual</th>
                                                <th>Balance</th>
                                                <th>Percentage</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Assuming $projectOrder is a string containing task names in longtext format
                                            $projectOrderArray = explode(',', str_replace(['[', ']', '"'], '', $projectOrder));
                                            // Define the categories in the order they should be displayed
                                            
                                            foreach ($projectOrderArray as $task) {
                                                $task = trim($task);
                                                $task = ucfirst($task);
                                                $targetVariable = 'target' . str_replace(' ', '', $task);
                                                $actualVariable = 'total' . str_replace(' ', '', $task);
                                                $target = ${$targetVariable};
                                                $actual = ${$actualVariable};
                                                $balance = $actual - $target;
                                                if ($actual != 0) {
                                                    $percentage = ($actual / $target) * 100;
                                                } else {
                                                    $percentage = 0;
                                                }
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $task; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($target); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($actual); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($balance); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo number_format($percentage, 2) . '%'; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 bg-light border rounded flex-grow-1 overflow-auto">
                                <h2>Overall Progress Report - Comparison</h2>
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var targetDocumentPreparation = <?php echo isset($targetDocumentPreparation) ? $targetDocumentPreparation : 0; ?>;
        var targetScanning = <?php echo isset($targetScanning) ? $targetScanning : 0; ?>;
        var targetQualityAssurance = <?php echo isset($targetQualityAssurance) ? $targetQualityAssurance : 0; ?>;
        var targetIndexing = <?php echo isset($targetIndexing) ? $targetIndexing : 0; ?>;
        var targetMicroFilming = <?php echo isset($targetMicroFilming) ? $targetMicroFilming : 0; ?>;
        var targetRefiling = <?php echo isset($targetRefiling) ? $targetRefiling : 0; ?>;
        var targetUploading = <?php echo isset($targetUploading) ? $targetUploading : 0; ?>;
        var targetConversion = <?php echo isset($targetConversion) ? $targetConversion : 0; ?>;
        var targetImageQualityAssurance = <?php echo isset($targetImageQualityAssurance) ? $targetImageQualityAssurance : 0; ?>;
        var targetStuffing = <?php echo isset($targetStuffing) ? $targetStuffing : 0; ?>;
        var targetPrinting = <?php echo isset($targetPrinting) ? $targetPrinting : 0; ?>;
        var targetCropping = <?php echo isset($targetCropping) ? $targetCropping : 0; ?>;
        var targetSubmission = <?php echo isset($targetSubmission) ? $targetSubmission : 0; ?>;
        var targetReleasing = <?php echo isset($targetReleasing) ? $targetReleasing : 0; ?>;

        var actualDocumentPreparation = <?php echo isset($totalDocumentPreparation) ? $totalDocumentPreparation : 0; ?>;
        var actualScanning = <?php echo isset($totalScanning) ? $totalScanning : 0; ?>;
        var actualQualityAssurance = <?php echo isset($totalQualityAssurance) ? $totalQualityAssurance : 0; ?>;
        var actualIndexing = <?php echo isset($totalIndexing) ? $totalIndexing : 0; ?>;
        var actualMicroFilming = <?php echo isset($totalMicroFilming) ? $totalMicroFilming : 0; ?>;
        var actualRefiling = <?php echo isset($totalRefiling) ? $totalRefiling : 0; ?>;
        var actualUploading = <?php echo isset($totalUploading) ? $totalUploading : 0; ?>;
        var actualConversion = <?php echo isset($totalConversion) ? $totalConversion : 0; ?>;
        var actualImageQualityAssurance = <?php echo isset($totalImageQualityAssurance) ? $totalImageQualityAssurance : 0; ?>;
        var actualStuffing = <?php echo isset($totalStuffing) ? $totalStuffing : 0; ?>;
        var actualPrinting = <?php echo isset($totalPrinting) ? $totalPrinting : 0; ?>;
        var actualCropping = <?php echo isset($totalCropping) ? $totalCropping : 0; ?>;
        var actualSubmission = <?php echo isset($totalSubmission) ? $totalSubmission : 0; ?>;
        var actualReleasing = <?php echo isset($totalReleasing) ? $totalReleasing : 0; ?>;

        var projectOrder = <?php echo json_encode($projectOrder); ?>;
        console.log("Value of projectOrder (before parsing):", projectOrder);

        // Parse the JSON string into an array
        projectOrder = JSON.parse(projectOrder);
        console.log("Value of projectOrder (after parsing):", projectOrder);

        // Remove newline characters from each string element
        projectOrder = projectOrder.map(function (task) {
            return task.replace(/\n/g, ''); // Remove newline characters
        });

        console.log("Cleaned projectOrder:", projectOrder);

        var targetData = [];
        var actualData = [];

        for (var i = 0; i < projectOrder.length; i++) {
            var task = projectOrder[i];
            switch (task) {
                case 'documentPreparation':
                    targetData.push(targetDocumentPreparation);
                    actualData.push(actualDocumentPreparation);
                    break;
                case 'scanning':
                    targetData.push(targetScanning);
                    actualData.push(actualScanning);
                    break;
                case 'qualityAssurance':
                    targetData.push(targetQualityAssurance);
                    actualData.push(actualQualityAssurance);
                    break;
                case 'indexing':
                    targetData.push(targetIndexing);
                    actualData.push(actualIndexing);
                    break;
                case 'microFilming':
                    targetData.push(targetMicroFilming);
                    actualData.push(actualMicroFilming);
                    break;
                case 'refiling':
                    targetData.push(targetRefiling);
                    actualData.push(actualRefiling);
                    break;
                case 'uploading':
                    targetData.push(targetUploading);
                    actualData.push(actualUploading);
                    break;
                case 'conversion':
                    targetData.push(targetConversion);
                    actualData.push(actualConversion);
                    break;
                case 'imageQualityAssurance':
                    targetData.push(targetImageQualityAssurance);
                    actualData.push(actualImageQualityAssurance);
                    break;
                case 'stuffing':
                    targetData.push(targetStuffing);
                    actualData.push(actualStuffing);
                    break;
                case 'printing':
                    targetData.push(targetPrinting);
                    actualData.push(actualPrinting);
                    break;
                case 'cropping':
                    targetData.push(targetCropping);
                    actualData.push(actualCropping);
                    break;
                case 'submission':
                    targetData.push(targetSubmission);
                    actualData.push(actualSubmission);
                    break;
                case 'releasing':
                    targetData.push(targetReleasing);
                    actualData.push(actualReleasing);
                    break;
            }
        }

        console.log("Target data:", targetData, "mamamo");
        console.log("Actual data:", actualData);

        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: projectOrder,
                datasets: [
                    {
                        label: 'Target',
                        data: targetData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Actual',
                        data: actualData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>




    <script>
        document.getElementById('downloadPDF').addEventListener('click', function () {
            var contentElement = document.getElementById('content');

            html2pdf(contentElement, {
                margin: 10,
                filename: 'project_report.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: {
                    unit: 'mm',
                    format: calculatePaperSize(contentElement),
                    orientation: 'landscape' // Change the orientation to 'landscape'
                }
            });
        });

        function calculatePaperSize(element) {
            var contentWidth = element.offsetWidth;
            var contentHeight = element.offsetHeight;
            var maxWidth = 210; // Swap width and height for landscape
            var numPages = Math.ceil(contentHeight / 210); // Swap width and height for landscape
            var paperWidth = contentWidth > maxWidth ? maxWidth : contentWidth;
            var paperHeight = numPages * 210; // Swap width and height for landscape
            return [paperWidth, paperHeight];
        }
    </script>
    <script>
        function confirmEndProject(projectId) {
            var confirmation = confirm("Do you want to end this project?");
            if (confirmation) {
                window.location.href = '../php/updateProject.php?id=' + encodeURIComponent(projectId);
            } else {
                // Optional: Handle the case where the user chooses not to end the project
            }
        }
    </script>
</body>

</html>