<?php
include('../php/autoRedirect.php');
include('../php/projectList.php');
session_start();

// Retrieve the query result from the session variable
$outputResult = $_SESSION['outputResult'];
$taskList = $_SESSION['taskList'];
$formattedTaskList = $_SESSION['formattedTaskList'];
$projectName = $_SESSION['projectName'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3600; url=../php/logout.php?logoutid=<?php echo $name ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/ptss/css/sidebar.css" rel="stylesheet">
    <link href="/ptss/css/body.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Output - PTSS</title>
    <style>
        .table td,
        .table th {
            padding-left: 25px;
            padding-right: 25px;
            white-space: nowrap;
            text-align: center;
        }
    </style>
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
                        <li class="nav-item">
                            <a class="nav-link custom" href="user.php">
                                <i class="fa-regular fa-user me-1"></i>
                                Users
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 p-0" style="height: 88vh">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3 border-bottom">
                    <h1 class="h3">Outputs</h1>
                    <div class="modal fade" id="encodeOutput" tabindex="-1" aria-labelledby="encodeOutputLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="encodeOutputLabel">Edit Encoded Output</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editEncodeOutputForm" action="../php/editEncodeOutput.php"
                                        onsubmit="return isvalid()" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3 d-none">
                                                <label for="id" class="form-label">Id</label>
                                                <input type="text" class="form-control" id="id" name="id"
                                                    placeholder="Id">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="project" class="form-label">Project</label>
                                                <input type="text" class="form-control" id="project" name="project"
                                                    placeholder="Project">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="personelName" class="form-label">Personel</label>
                                                <input type="text" class="form-control" id="personelName"
                                                    name="personelName" placeholder="PersonelName">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="projectCoordinator" class="form-label">Project
                                                    Coordinator</label>
                                                <input type="text" class="form-control" id="projectCoordinator"
                                                    name="projectCoordinator" placeholder="ProjectCoordinator">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" class="form-control datepicker" id="date" name="date"
                                                    placeholder="Select Date" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="form-label">Volume:</label>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">Time / Hours</label>
                                            </div>
                                        </div>
                                        <div id="taskInputsContainer" class="mb-3"></div>
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="remarks" class="form-label">Remarks</label>
                                                <textarea class="form-control" id="remarks" name="remarks" rows="3"
                                                    placeholder="Remarks"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4 w-100" id="encodeOutputButton"
                                            name="encodeOutputButton">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="align-items-center px-5 pt-3 pb-3">
                    <div class="table-responsive p-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Action</th>
                                    <?php
                                    // Loop through the formatted task list to generate table headers
                                    foreach ($formattedTaskList as $task) {
                                        echo "<th scope='col'>$task</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Loop through each row in the output result
                                foreach ($outputResult as $row) {
                                    echo "<tr>";
                                    // Extract projectId and projectName from the row
                                    $projectId = $row[$taskList[0]];
                                    $projectName = $row[$taskList[1]];
                                    // Create a table cell for the action button
                                    echo "<td scope='row'>
                            <button class='btn btn-success btn-lg edit-btn' id='edit' type='button' data-project-id='$projectId' data-project-name='$projectName'>
                                <i class='fa fa-pen'></i>
                            </button>
                        </td>";
                                    // Loop through each task in the row and create table cells
                                    for ($i = 0; $i < count($taskList); $i++) {
                                        $task = $row[$taskList[$i]];
                                        echo "<td>$task</td>";
                                    }
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </main>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/ptss/js/script.js"></script>
    <script>
        // Function to fetch tasks and generate input fields
        function fetchAndGenerateTaskInputs(projectName) {
            // Make an AJAX request to fetch tasks
            $.ajax({
                type: 'POST',
                url: '../php/fetchTask.php',
                data: { projectName: projectName },
                dataType: 'json',
                success: function (response) {
                    if (!response.error) {
                        // Clear previous task inputs
                        $('#taskInputsContainer').empty();

                        // Generate input fields for each task
                        $.each(response, function (index, task) {
                            var taskName = task.replace(/\s+/g, ''); // Remove spaces from task name
                            var html = `
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <input type="number" class="form-control" id="${taskName}" name="${taskName}" placeholder="${task}">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <select class="form-select" id="${taskName}Time" name="${taskName}Time">
                                                <option value=1>1 hr/s</option>
                                                <option value=2>2 hr/s</option>
                                                <option value=3>3 hr/s</option>
                                                <option value=4>4 hr/s</option>
                                                <option value=5>5 hr/s</option>
                                                <option value=6>6 hr/s</option>
                                                <option value=7>7 hr/s</option>
                                                <option value=8 selected>8 hr/s</option>
                                            </select>
                                        </div>
                                    </div>`;
                            // Append the HTML to the container
                            $('#taskInputsContainer').append(html);
                        });
                    } else {
                        // Handle error response
                        console.error(response.error);
                    }
                },
                error: function (xhr, status, error) {
                    // Handle AJAX error
                    console.error(error);
                }
            });
        }

        // Function to fetch data from the server and fill the input fields
        function fetchDataAndFillInputs(projectId, projectName) {
            console.log(projectId, projectName);
            $.ajax({
                type: 'POST',
                url: '../php/fetchData.php',
                data: { projectId: projectId, projectName: projectName },
                dataType: 'json',
                success: function (response) {
                    if (!response.error) {
                        // Loop through the response data and fill the corresponding input fields
                        $.each(response, function (key, value) {

                            console.log(key, value);
                            // Find the input field with the corresponding ID and set its value
                            $('#' + key).val(value);
                        });
                    } else {
                        console.error(response.error);
                    }
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        }

        // Event listener for project select change
        $('.edit-btn').click(function () {
            var projectId = $(this).data('project-id');
            var projectName = $(this).data('project-name');

            // Fetch data and fill input fields
            fetchDataAndFillInputs(projectId, projectName);

            $("#encodeOutput").modal("show");
        });
        var defaultProjectName = $('.edit-btn').data('project-name');
        fetchAndGenerateTaskInputs(defaultProjectName);
    </script>

</html>