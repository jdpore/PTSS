<?php
include('../php/autoRedirect.php');
include('../php/projectList.php');

if (isset($_GET['updatedList']) && $_GET['status']) {
    $updatedList = $_GET['updatedList'];
    $status = $_GET['updatedList'];
    if ($status = 'updated') {
        header("Location: ../php/outputList.php?projectName=$updatedList");
    }
}

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
    <title>Production Output - PTSS</title>
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
                    <h1 class="h3">Projects</h1>
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
                                            href="../php/outputList.php?projectName=<?php echo $row['projectName']; ?>">View
                                            More <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Your content goes here -->
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>