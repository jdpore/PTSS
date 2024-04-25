<?php
include('../php/autoRedirect.php');
include('../php/projectList.php');
include('../php/personelList.php');
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Dashboard - PTSS</title>
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
            <main class="col-md-9 ms-sm-auto col-lg-10 p-0" style="height: 88vh">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3 mb-3 border-bottom">
                    <h1 class="h3">Personel</h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#addPersonelModal">
                        Add Personel
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addPersonelModal" tabindex="-1" aria-labelledby="addPersonelModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addPersonelModalLabel">Add Personel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addPersonelForm" action="../php/addPersonel.php"
                                        onsubmit="return isvalid()" method="POST">
                                        <div class="mb-3">
                                            <label for="personelName" class="form-label">Personel Name</label>
                                            <input type="text" class="form-control" id="personelName"
                                                name="personelName" placeholder="Name" required>
                                        </div>
                                        <div class="mb-3">
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
                                        <div class="mb-3">
                                            <label for="designation" class="form-label">Designation</label>
                                            <select class="form-select" id="designation" name="designation" required>
                                                <option value="" selected disabled>Task</option>

                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4 w-100" id="addPersonelButton"
                                            name="addPersonelButton">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center ps-4 pe-4 pt-3 pb-2 mb-3">
                    <div class="container table-responsive p-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Project</th>
                                    <!-- Add more headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Add rows of data dynamically or manually as needed -->
                                <?php
                                if (!empty($personelList)) {
                                    foreach ($personelList as $row) {
                                        $id = $row['id'];
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <button class="btn btn-success btn-lg" type="button">
                                                    <a onclick="editPersonel(<?php echo $id; ?>)" style='color: white'><i
                                                            class='fa fa-pen'></i></a>
                                                </button>
                                                <button class="btn btn-danger btn-lg">
                                                    <?php
                                                    echo "
                        <a onclick=\"javascript:return confirm('Confirm Delete?')\" style='color: white' href='../php/delete.php?deletePersonelId=$id'><i class='fa fa-trash'></i></a>
                     ";
                                                    ?>
                                                </button>
                                            </th>
                                            <td>
                                                <?php echo $row['personelName']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['designation']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['project']; ?>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    // Display a message or perform some action when $personelList is null or empty.
                                    echo "<tr><td colspan='4'>No personnel data available.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="editPersonelModal" name="editPersonelModal" tabindex="-1"
                        aria-labelledby="editPersonelModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editPersonelModalLabel">Edit Personel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editPersonelForm" action="../php/editPersonel.php"
                                        onsubmit="return isvalid()" method="POST">
                                        <div class="mb-3 d-none">
                                            <label for="editId" class="form-label">ID</label>
                                            <input type="text" class="form-control" id="editId" name="editId"
                                                placeholder="ID" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editPersonelName" class="form-label">Personel Name</label>
                                            <input type="text" class="form-control" id="editPersonelName"
                                                name="editPersonelName" placeholder="Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editProject" class="form-label">Project</label>
                                            <select class="form-select" id="editProject" name="editProject" required>
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
                                        <div class="mb-3">
                                            <label for="editDesignation" class="form-label">Designation</label>
                                            <select class="form-select" id="editDesignation" name="editDesignation"
                                                required>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-4 w-100" id="editPersonelButton"
                                            name="editPersonelButton">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Your content goes here -->
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/editPersonel.js"></script>
    <script>
        $(document).ready(function () {
            $('#project').change(function () {
                var projectName = $(this).val();
                $.ajax({
                    url: '../php/fetchTask.php', // Change the URL to your PHP file that fetches tasks
                    type: 'POST',
                    data: { projectName: projectName },
                    dataType: 'json',
                    success: function (response) {
                        var options = '<option value="" selected disabled>Task</option>';
                        for (var i = 0; i < response.length; i++) {
                            options += '<option value="' + toPascalCase(response[i]) + '">' + toPascalCase(response[i]) + '</option>';
                        }
                        $('#designation').html(options);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
        $(document).ready(function () {
            $('#editProject').change(function () {
                var projectName = $(this).val();
                $.ajax({
                    url: '../php/fetchTask.php', // Change the URL to your PHP file that fetches tasks
                    type: 'POST',
                    data: { projectName: projectName },
                    dataType: 'json',
                    success: function (response) {
                        var options = '<option value="" selected disabled>Task</option>';
                        for (var i = 0; i < response.length; i++) {
                            options += '<option value="' + toPascalCase(response[i]) + '">' + toPascalCase(response[i]) + '</option>';
                        }
                        $('#editDesignation').html(options);
                    },
                    error: function (xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            });
        });
        function toPascalCase(str) {
            // Split the string into words
            const words = str.split(/\s+/);

            // Capitalize the first letter of each word and join them back together
            return words.map(word => word.charAt(0).toUpperCase() + word.slice(1)).join('');
        }
    </script>
</body>

</html>