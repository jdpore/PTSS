<?php
include('../php/autoRedirect.php');
include('../php/userList.php');
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
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center px-5 pt-3 pb-3 mb-3 border-bottom">
                    <h1 class="h3">Users</h1>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUserModal">
                        Add User
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addUserModal" tabindex="-1" aria-labelledby="addUserModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addUserModalLabel">Add User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="addUserForm" action="../php/addUser.php" onsubmit="return isvalid()"
                                        method="POST">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="userName" class="form-label">User Name</label>
                                            <input type="text" class="form-control" id="userName" name="userName"
                                                placeholder="User name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="password" name="password"
                                                placeholder="Password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <select class="form-select" id="category" name="category" required>
                                                <option value="" selected disabled>Classification</option>
                                                <option value="Project Coordinator">Project Coordinator</option>
                                                <option value="Project Team Leader">Project Team Leader</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4 w-100" id="addUserButton"
                                            name="addUserButton">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="d-flex justify-content-between overflow-auto flex-wrap flex-md-nowrap align-items-center ps-4 pe-4 pt-3 pb-2 mb-3">
                    <div class="container table-responsive p-4">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Action</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Last Activity</th>
                                    <!-- Add more headers as needed -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Add rows of data dynamically or manually as needed -->
                                <?php foreach ($userList as $row) {
                                    $id = $row['id'] ?>
                                    <tr>
                                        <th scope="row">
                                            <button class="btn btn-success btn-lg" type="button">
                                                <a onclick="editUser(<?php echo $id; ?>)" style='color: white'><i
                                                        class='fa fa-pen'></i></a>
                                            </button>
                                            <button class="btn btn-danger btn-lg">
                                                <?php
                                                echo "
                                                    <a onclick=\"javascript:return confirm('Confirm Delete?')\" style='color: white' href='../php/delete.php?deleteUserId=$id'><i class='fa fa-trash'></i></a>
                                                 ";
                                                ?>
                                            </button>
                                        </th>
                                        <td>
                                            <?php echo $row['name']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['username']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['category']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['status']; ?>
                                        </td>
                                        <td>
                                            <?php echo $row['log_at']; ?>
                                        </td>

                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="editUserModal" name="editUserModal" tabindex="-1"
                        aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editUserForm" action="../php/editUser.php" onsubmit="return isvalid()"
                                        method="POST">
                                        <div class="mb-3">
                                            <label for="editId" class="form-label">ID</label>
                                            <input type="number" class="form-control" id="editId" name="editId"
                                                placeholder="ID" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="editName" name="editName"
                                                placeholder="Name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editUserName" class="form-label">User Name</label>
                                            <input type="text" class="form-control" id="editUserName"
                                                name="editUserName" placeholder="User name" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editPassword" class="form-label">Password</label>
                                            <input type="text" class="form-control" id="editPassword"
                                                name="editPassword" placeholder="Password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="editCategory" class="form-label">Category</label>
                                            <select class="form-select" id="editCategory" name="editCategory" required>
                                                <option value="" selected disabled>Classification</option>
                                                <option value="Project Coordinator">Project Coordinator</option>
                                                <option value="Team Leader">Project Team Leader</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mt-4 w-100" id="editUserButton"
                                            name="editUserButton">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/editUser.js"></script>
</body>

</html>