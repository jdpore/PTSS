<?php
include('../php/autoRedirect.php');
include('../php/individualPerformanceList.php');
session_start();
$project = $_GET['project'];
$task = $_GET['task'];
$sqlProject = $_SESSION['sql'];
$taskList = $_SESSION['task'];



$dailyVolume = "SELECT $task
                FROM projects
                WHERE projectName = '$project'";
$dailyVolumeResult = $conn->query($dailyVolume);
if ($dailyVolumeResult) {
    $daily = mysqli_fetch_assoc($dailyVolumeResult);
    $targetVolume = $daily["$task"];
}
;

$result = $conn->query($sqlProject);

$row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3600; url=../php/logout.php?logoutid=<?php echo $name ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/ptss/css/sidebar.css" rel="stylesheet">
    <link href="/ptss/css/body.css" rel="stylesheet">
    <title>Dashboard - PTSS</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.5/xlsx.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
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
                <ul class="navbar-nav ms-auto"> <!-- Modified class here -->
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

    <!-- Sidebar -->
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

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 p-0 overflow-auto" style="height: 88vh ">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3 border-bottom">
                    <h1 class="h3">Individual Performance -
                        <?php echo ucfirst($task) ?>
                    </h1>
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownDates"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dates
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownDates">
                                <form class="px-4 py-3" method="post" action="../php/individualPerformanceList.php">
                                    <div class="mb-3 d-none">
                                        <label for="project" class="form-label">Project</label>
                                        <input type="text" class="form-control" id="project" name="project"
                                            value='<?php echo $project ?>'>
                                    </div>
                                    <div class="mb-3 d-none">
                                        <label for="task" class="form-label">Task</label>
                                        <input type="text" class="form-control" id="task" name="task"
                                            value='<?php echo $task ?>'>
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
                        <!-- Dropdown Button -->
                        <div class="dropdown ms-2">
                            <button class="btn dropdown-toggle" type="button" id="dropdownTask"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Tasks
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownTask">
                                <?php
                                foreach ($taskList as $tasks) {
                                    $url = "../php/individualPerformanceList.php?projectName=" . urlencode($project) . "&task=" . urlencode($tasks);
                                    $taskName = ucfirst($tasks);
                                    echo "<a class='dropdown-item' href='$url'>$taskName</a>";
                                }
                                ?>
                            </div>
                        </div>
                        <button class="btn btn-success ms-2" id="downloadExcel">Excel</button>
                        <button class="btn btn-danger ms-2" id="downloadPDF">PDF</button>
                        <button class="btn btn-primary ms-2" onclick="window.location.href='encode.php'">
                            Back
                        </button>
                    </div>
                </div>
                <div class="d-flex flex-column justify-content-between align-items-center px-5 pt-3 pb-3">
                    <h1 class="h3">
                        <?php echo $project ?>
                    </h1>
                    <!-- First Row: Graph -->
                    <div class="container p-4 col-12">
                        <canvas id="personnelChart" width="400" height="100"></canvas>
                    </div>

                    <!-- Second Row: Table -->
                    <div class="container p-4 col-12">
                        <div class="table-responsive">
                            <?php
                            if ($result->num_rows > 0) {
                                ?>
                                <table id="personelTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope='col'>Personel Name</th>
                                            <?php
                                            foreach ($row as $key => $value) {
                                                if ($key != "personelName") {
                                                    echo "<th scope='col'>$key</th>";
                                                }
                                            }
                                            ?>
                                            <th scope='col'>Percentage</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result->data_seek(0);
                                        while ($row = $result->fetch_assoc()) {
                                            $percent = array();
                                            $output = array();
                                            $count = 0;
                                            $arrayNumber = 0;
                                            $arrayNumberInside = 0;
                                            echo "<tr>";
                                            echo "<th>" . $row['personelName'] . "</th>";
                                            $personnelName = $row['personelName'];
                                            $personnelNames[] = $personnelName;

                                            foreach ($row as $key => $value) {
                                                if ($key != "personelName") {
                                                    if (is_numeric($value)) {
                                                        $formattedValue = number_format($value);
                                                        echo "<td>" . $formattedValue . "</td>";
                                                    } else {
                                                        echo "<td>" . $value . "</td>";
                                                    }
                                                    $percent[$arrayNumber] = $value;

                                                    $arrayNumber++;
                                                    $count++;

                                                    if ($count == 2) {
                                                        $target = $targetVolume / 8;
                                                        $target = $percent[1] * $target;
                                                        if ($target != 0) {
                                                            $conversion = number_format(($percent[0] / $target) * 100, 2);
                                                        } else {
                                                            $conversion = 0;
                                                        }
                                                        $output[$arrayNumberInside] = $conversion;
                                                        $arrayNumberInside++;
                                                        $count = 0;
                                                        $arrayNumber = 0;
                                                    }
                                                }
                                            }
                                            $average = number_format(array_sum($output) / count($output), 2);
                                            echo "<td>" . $average . "</td>";
                                            $averagePercentages[] = $average;
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            } else {
                                echo "<p>No Input</p>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var labels = <?php echo json_encode($personnelNames); ?>;
            var data = <?php echo json_encode($averagePercentages); ?>;

            // Chart.js code
            var ctx = document.getElementById('personnelChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Average Percentage',
                        data: data,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // ... (existing code)

            // Download Excel button click event
            document.getElementById('downloadExcel').addEventListener('click', function () {
                // Create a new workbook
                var wb = XLSX.utils.book_new();
                // Add a worksheet
                var ws = XLSX.utils.table_to_sheet(document.getElementById('personelTable'), { raw: true });
                // Add the worksheet to the workbook
                XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                // Save the workbook as an Excel file
                XLSX.writeFile(wb, 'individual_performance.xlsx');
            });

            // Download PDF button click event
            document.getElementById('downloadPDF').addEventListener('click', function () {
                // Create a new jsPDF instance
                window.jsPDF = window.jspdf.jsPDF;
                var pdf = new jsPDF();

                // Add title to PDF
                pdf.text("Individual Performance - <?php echo $task ?>", 20, 20);

                // Add graph to PDF
                var graphImgData = document.getElementById('personnelChart').toDataURL('image/png');
                pdf.addImage(graphImgData, 'PNG', 20, 30, 160, 80);

                // Directly use autoTable on the table data
                var tableData = pdf.autoTableHtmlToJson(document.getElementById('personelTable'));
                pdf.autoTable(tableData.columns, tableData.data, { startY: 120 });

                // Save the PDF
                pdf.save('individual_performance.pdf');
            });
        });
    </script>
</body>

</html>