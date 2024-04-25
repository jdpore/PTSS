<?php
include('../php/autoRedirect.php');
include('../php/userList.php');
include('../php/projectList.php');
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
    <title>Dashboard - PTSS</title>
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
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
                        <li id="users" class="nav-item admin">
                            <a class="nav-link custom" href="user.php">
                                <i class="fa-regular fa-user me-1"></i>
                                Users
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 p-0 overflow-auto" style="height: 88vh">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3 border-bottom">
                    <h1 class="h3">Projects</h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#createProjectModal">
                        Create Projects
                    </button>

                    <div class="modal fade" id="createProjectModal" tabindex="-1"
                        aria-labelledby="createProjectModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createProjectModalLabel">Create Project</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="createProjectForm" action="../php/createProject.php" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="projectName" class="form-label">Project Name</label>
                                                <input type="text" class="form-control" id="projectName"
                                                    name="projectName" placeholder="Name" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="projectCoordinator" class="form-label">Project
                                                    Coordinator</label>
                                                <select class="form-select" id="projectCoordinator"
                                                    name="projectCoordinator" required>
                                                    <option value="" selected disabled>Project Coordinator</option>
                                                    <?php
                                                    foreach ($coordinatorList as $row) { ?>
                                                        <option value='<?php echo $row['name']; ?>'>
                                                            <?php echo $row['name']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="dateFrom" class="form-label">Date From</label>
                                                <input type="date" class="form-control datepicker" id="dateFrom"
                                                    name="dateFrom" placeholder="Select Date" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="dateTo" class="form-label">Date To</label>
                                                <input type="date" class="form-control datepicker" id="dateTo"
                                                    name="dateTo" placeholder="Select Date" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="teamLeader" class="form-label">Team Leader</label>
                                                <select class="form-select" id="teamLeader" name="teamLeader" required>
                                                    <option value="" selected disabled>Team Leader</option>
                                                    <?php
                                                    foreach ($teamLeaderList as $row) { ?>
                                                        <option value='<?php echo $row['name']; ?>'>
                                                            <?php echo $row['name']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="clientContactPerson" class="form-label">Client Contact
                                                    Person</label>
                                                <input type="text" class="form-control" id="clientContactPerson"
                                                    name="clientContactPerson" placeholder="Name" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Select Tasks:</label>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4 mb-1">
                                                <label><input type="checkbox" class="taskCheckbox"
                                                        value="documentPreparation"> Document Preparation</label>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label><input type="checkbox" class="taskCheckbox" value="scanning">
                                                    Scanning</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="indexing">
                                                    Indexing</label>
                                            </div>
                                            <div class="col-md-4 mb-1">
                                                <label><input type="checkbox" class="taskCheckbox"
                                                        value="qualityAssurance"> Quality Assurance</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="refiling">
                                                    Refiling</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="uploading">
                                                    Uploading
                                                </label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox"
                                                        value="imageQualityAssurance"> Image Quality Assurance
                                                </label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="conversion">
                                                    Conversion
                                                </label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="microFilming">
                                                    Micro Filming</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="cropping">
                                                    Cropping</label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="printing">
                                                    Printing
                                                </label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="stuffing">
                                                    Stuffing
                                                </label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="submission">
                                                    Submission
                                                </label>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label><input type="checkbox" class="taskCheckbox" value="releasing">
                                                    Releasing
                                                </label>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-label">Over All Target Volume</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Daily Target Volume</label>
                                                </div>
                                            </div>
                                            <div id="dynamicInputs"></div>
                                            <input type="hidden" name="orderClicked" id="orderClickedInput">
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4 w-100"
                                            id="createProjectButton" name="createProjectButton">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3">
                    <div class="container m-0 p-0">
                        <div class="row">
                            <?php
                            foreach ($projectList as $row) {
                                $randomColor = '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
                                ?>

                                <div class="col-lg-4 col-sm-6">
                                    <div class="card" style="background-color: <?php echo $randomColor; ?>; color: white;">
                                        <div class="card-body">
                                            <h3 class="card-title">
                                                <?php echo $row['projectName']; ?>
                                            </h3>
                                            <p>Coordinator:
                                                <?php echo $row['coordinator']; ?>
                                            </p>
                                            <p>Team Leader:
                                                <?php echo $row['teamLeader']; ?>
                                            </p>
                                            <p>Start:
                                                <?php echo $row['durationFrom']; ?>
                                            </p>
                                            <p>End:
                                                <?php echo $row['durationTo']; ?>
                                            </p>
                                        </div>
                                        <div class="card-body icon">
                                            <i class="fa fa-chart-bar" aria-hidden="true"></i>
                                        </div>
                                        <a class="card-footer text-white"
                                            href="../php/graphList.php?projectName=<?php echo $row['projectName']; ?>&projectId=<?php echo $row['id']; ?>">View
                                            More <i class="fa fa-arrow-circle-right"></i></a>

                                    </div>
                                </div>
                                <?php
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
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.taskCheckbox');
            const orderClicked = []; // Array to store the order of clicked tasks

            checkboxes.forEach(function (checkbox) {
                checkbox.addEventListener('change', function () {
                    const task = this.value;
                    const rowId = task + 'Row';
                    const isChecked = this.checked;

                    if (isChecked) {
                        // Add task to the array if checked
                        orderClicked.push(task);
                        updateHiddenInput(orderClicked);
                        const html = `
                    <div class="row" id="${rowId}">
                        <div class="col-md-6 mb-3">
                            <input type="number" class="form-control" id="${task}" name="${task}" placeholder="${toPascalCase(task)}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="number" class="form-control" id="daily${task}" name="daily${task}" placeholder="${toPascalCase(task)}">
                        </div>
                    </div>
                `;
                        document.getElementById('dynamicInputs').insertAdjacentHTML('beforeend', html);
                    } else {
                        // Remove task from the array if unchecked
                        const index = orderClicked.indexOf(task);
                        if (index !== -1) {
                            orderClicked.splice(index, 1);
                        }
                        updateHiddenInput(orderClicked);
                        const row = document.getElementById(rowId);
                        if (row) {
                            row.remove();
                        }
                    }
                });
            });

            // Function to update the value of the hidden input field
            function updateHiddenInput(orderClicked) {
                console.log(orderClicked);
                document.getElementById('orderClickedInput').value = JSON.stringify(orderClicked);
            }

            // Function to convert a string to Pascal case
            function toPascalCase(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
                });
            }
        });
    </script>

</body>

</html>