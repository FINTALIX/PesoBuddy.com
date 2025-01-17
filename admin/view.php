<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy | Admin | View User</title>
    <link rel="icon" href="../assets/images/pesobuddy_icon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Exa&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/sidebar.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body>

    <!-- Navbar for phone size -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="../assets/images/pesobuddy_icon.png" alt="Logo" style="height: 40px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarOffcanvas"
                aria-controls="sidebarOffcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <!-- sidebar -->
    <div class="wrapper">
        <aside id="sidebar">
            <div class="d-flex align-items-center">
                <img src="../assets/images/pesobuddy_icon.png" id="toggleSidebar" alt="Toggle Sidebar"
                    class="toggle-logo">
                <div class="sidebar-logo">
                    <a href="#">PESOBUDDY</a>
                </div>
            </div>
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="index.php" class="sidebar-link">
                        <i class="bi bi-bar-chart-line"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="users.php" class="sidebar-link active">
                        <i class="bi bi-person"></i>
                        <span>Users</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="categories.php" class="sidebar-link">
                        <i class="bi bi-list"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item mt-auto">
                    <a href="#settings" class="sidebar-link">
                        <i class="bi bi-gear"></i>
                        <span>Settings</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#logout" class="sidebar-link">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </aside>

        <!-- Offcanvas for phone size -->
        <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas"
            aria-labelledby="sidebarOffcanvasLabel">
            <div class="offcanvas-header">
                <img src="../assets/images/pesobuddy_logoW.png" alt="PESOBUDDY" class="img-fluid"
                    id="sidebarOffcanvasLabel" style="max-height: 94px; max-width: 200px">
                <button type="button" class="btn-close text-reset m-0" data-bs-dismiss="offcanvas" aria-label="Close"
                    style="background-color: transparent;"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list-unstyled">
                    <li><a href="index.php"><i class="bi bi-bar-chart-line"></i> Dashboard</a></li>
                    <li><a href="users.php" class="sidebar-link active"><i class="bi bi-person"></i> Users</a></li>
                    <li><a href="categories.php"><i class="bi bi-list"></i> Categories</a></li>
                    <li><a href="#settings"><i class="bi bi-gear"></i> Settings</a></li>
                    <li><a href="#logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main px-2 px-md-0" style="margin-left: 70px; transition: margin-left 0.25s ease-in-out;">

            <!-- View User -->
            <div class="container-fluid">
                <div class="row pt-5 p-md-4">

                    <!-- Back to user's page -->
                    <div class="col-12">
                        <a href="users.php">
                            <div class="text-center text-sm-start pb-3"
                                style="color:#616161; text-decoration:underline;"><i class="bi bi-arrow-left"></i>
                                <b>Go back to users page</b>
                            </div>
                        </a>
                    </div>

                    <!-- Heading -->
                    <div class="col-12 my-3">
                        <div class="heading text-center text-sm-start"><span style="color: #1A7431;">USER ID:</span> 001
                        </div>
                    </div>

                    <div class="col-12 my-3">
                        <div class="row mb-4 px-2 d-flex justify-content-center align-items-center">
                            <div class="card stat-card w-100">
                                <div class="row py-2">
                                    <!-- Profile Picture -->
                                    <div class="col-12 col-md-2 p-2 d-flex justify-content-center align-items-center">
                                        <img src="../assets/images/pesobuddy_icon.png" alt="Profile Picture"
                                            class="rounded-circle img-fluid" width="150" height="140">
                                    </div>
                                    <!-- User's Information -->
                                    <div class="col-12 col-md-10 pt-3 d-flex justify-content-start align-items-center">
                                        <ul class="list-unstyled">
                                            <li><b>John Doe</b></li>
                                            <li><i>john_doe</i></li>
                                            <br>
                                            <li><b>Birthday:</b> May 18, 2004</li>
                                            <li><b>Email:</b> john_doe@gmail.com</li>
                                            <li><b>Status:</b> Active</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Login Table -->
                    <div class="col-12 mb-2">
                        <div><b>Recent Login:</b></div>
                    </div>

                    <div class="col-12">
                        <div class="card card-container p-4">
                            <div class="row">
                                <div class="table-responsive">
                                    <table class="table table-striped table-borderless m-0">
                                        <thead class="text-center align-middle">
                                            <tr>
                                                <th scope="col">ID</th>
                                                <th scope="col">DATE</th>
                                                <th scope="col">TIME</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Category Row -->
                                            <tr class="text-center align-middle">
                                                <td scope="row">1</td>
                                                <td>September 26, 2024</td>
                                                <td>10:45 AM</td>
                                            </tr>

                                            <!-- Category Row -->
                                            <tr class="text-center align-middle">
                                                <td scope="row">2</td>
                                                <td>July 23, 2024</td>
                                                <td>11:30 AM</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
        <script>
            document.getElementById("toggleSidebar").addEventListener("click", function () {
                const sidebar = document.getElementById("sidebar");
                const mainContent = document.querySelector(".main");
                sidebar.classList.toggle("expand");

                if (sidebar.classList.contains("expand")) {
                    mainContent.style.marginLeft = "260px";
                } else {
                    mainContent.style.marginLeft = "70px";
                }
            });
        </script>
</body>

</html>