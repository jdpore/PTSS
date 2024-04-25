<?php
include('../php/projectList.php');
include('../php/userList.php');
include('../php/personelList.php');
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
                        <li id="users" class="nav-item admin">
                            <a class="nav-link custom" href="user.php">
                                <i class="fa-regular fa-user me-1"></i>
                                Users
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 p-0 overflow-auto" style="height: 88vh">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3 border-bottom">
                    <h1 class="h3">Individual Performance</h1>
                    <button type="button" class="btn btn-primary"
                        onclick="handleCategoryChange('<?php echo $category; ?>', '<?php echo $projectName ?>', '<?php echo $coordinator ?>')">
                        Encode Output
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="encodeOutput" tabindex="-1" aria-labelledby="encodeOutputLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="encodeOutputLabel">Encode Output</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="encodeOutputForm" action="../php/encodeOutput.php"
                                        onsubmit="return isvalid()" method="POST">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="project" class="form-label">Project</label>
                                                <select class="form-select" id="project" name="project" required>
                                                    <option value="" selected disabled>Project</option>
                                                    <?php
                                                    foreach ($projectList as $row) { ?>
                                                        <option value='<?php echo $row['projectName']; ?>'>
                                                            <?php echo $row['projectName']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="personel" class="form-label">Personel</label>
                                                <select class="form-select" id="personel" name="personel" required>
                                                    <option value="" selected disabled>Personel</option>
                                                    <?php
                                                    foreach ($personelList as $row) { ?>
                                                        <option value='<?php echo $row['personelName']; ?>'>
                                                            <?php echo $row['personelName']; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="projectCoordinator" class="form-label">Project
                                                    Coordinator</label>
                                                <select class="form-select" id="projectCoordinator"
                                                    name="projectCoordinator" required data-current-value="">
                                                    <option value="" selected disabled>Project Coordinator</option>
                                                    <?php
                                                    foreach ($coordinatorList as $row) {
                                                        $coordinatorName = $row['name'];
                                                        ?>
                                                        <option value='<?php echo $coordinatorName; ?>'>
                                                            <?php echo $coordinatorName; ?>
                                                        </option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
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
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3">
                    <div class="container m-0 p-0">
                        <div class="row">
                            <?php
                            foreach ($projectList as $row) {
                                // Generate a random light hex color code
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
                                            href="../php/individualPerformanceList.php?projectName=<?php echo $row['projectName']; ?>&task=documentPreparation">View
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/ptss/js/autoFill.js"></script>
    <script src="/ptss/js/script.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Check if the 'openModal' parameter is present in the URL
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('openModal')) {
                // Your modal opening code here
                // For example, if you're using Bootstrap modal:
                $('#encodeOutput').modal('show');
                handleCategoryChange('<?php echo $category; ?>', '<?php echo $projectName ?>', '<?php echo $coordinator ?>')
            }
        });
    </script>
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
                            var taskName = toPascalCase(task); // Remove spaces from task name
                            var html = `
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="${task}" name="${task}" placeholder="${taskName}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <select class="form-select" id="${task}Time" name="${task}Time">
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
        function toPascalCase(str) {
            // Split the string into words
            const words = str.split(/\s+/);

            // Capitalize the first letter of each word and join them back together
            return words.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join('');
        }

        // Event listener for project select change
        $('#project').change(function () {
            var projectName = $(this).val();
            fetchAndGenerateTaskInputs(projectName);
        });

        // Call fetchAndGenerateTaskInputs initially with default project
        var defaultProjectName = $('#project').val();
        fetchAndGenerateTaskInputs(defaultProjectName);
    </script>
</body>

</html>