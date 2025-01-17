<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy | Manage Users</title>
    <link rel="icon" href="../assets/images/pesobuddy_icon.png">
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
                    <a href="settings.php" class="sidebar-link">
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
                    <li><a href="categories.php"><i class="bi bi-list"></i> Categories</a>
                    </li>
                    <li><a href="settings.php"><i class="bi bi-gear"></i> Settings</a></li>
                    <li><a href="#logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main px-2 px-md-0" style="margin-left: 70px; transition: margin-left 0.25s ease-in-out;">
            <div class="container-fluid">
                <div class="row pt-4 p-md-4">

                    <!-- Heading -->
                    <div id="" class="col-12 mb-4">
                        <div class="heading text-center text-sm-start">MANAGE USERS</div>
                    </div>

                    <div class="col-12">

                        <!-- Search and Sort Section -->
                        <div
                            class="row d-flex flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-between">

                            <!-- Search -->
                            <form class="col-12 col-lg my-2" method="GET">
                                <div class="input-group">
                                    <!-- Textbox -->
                                    <input type="text" class="form-control" placeholder="Search User" name="" value="">
                                    <!-- Search Button -->
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </form>

                            <!-- Sort -->
                            <form class="col-12 col-lg-auto" method="GET">
                                <div class="row d-flex flex-column flex-md-row align-items-center mx-1">
                                    <!-- Label -->
                                    <div class="col-12 col-lg-auto p-0 mx-lg-1 my-1">
                                        <div class="paragraph">
                                            Sort By:
                                        </div>
                                    </div>

                                    <!-- Sort Form -->
                                    <div class="col-12 col-lg-auto d-flex flex-column flex-md-row p-0 my-1">
                                        <!-- Sort -->
                                        <select class="form-select ms-lg-1 me-md-1 my-1" name="">
                                            <option value="" selected>Default</option>
                                            <option value="">First Name</option>
                                            <option value="">Last Name</option>
                                            <option value="">Username</option>
                                            <option value="">Recent Login</option>
                                        </select>

                                        <!-- Order -->
                                        <select class="form-select me-lg-1 my-1" name="">
                                            <option value="" selected>Ascending</option>
                                            <option value="">Descending</option>
                                        </select>
                                    </div>

                                    <!-- Apply Button -->
                                    <div class="col-12 col-lg-auto text-center text-md-start p-0 ms-lg-1 my-1">
                                        <button type="submit" class="btn btn-primary px-2">
                                            Apply
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Users Table Section -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="card card-container p-4">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-borderless text-center">

                                            <!-- Column Heading -->
                                            <thead class="align-middle">
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Username</th>
                                                    <th scope="col">Recent Login</th>
                                                    <th scope="col" class="text-center">Action</th>
                                                </tr>
                                            </thead>

                                            <!-- Data -->
                                            <tbody class="align-middle">
                                                <!-- Row -->
                                                <tr>
                                                    <td>1</td>
                                                    <td>John</td>
                                                    <td>Doe</td>
                                                    <td>johndoe</td>
                                                    <td>2025-01-01</td>

                                                    <!-- Action Buttons -->
                                                    <td class="text-center">
                                                        <!-- View -->
                                                        <a class="btn btn-primary my-1" href="view.php?id=">
                                                            View
                                                        </a>

                                                        <!-- Delete -->
                                                        <a class="btn btn-danger my-1" data-bs-toggle="modal" data-bs-target="#deleteUser">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>

                                                <!-- If No Data -->
                                                <tr>
                                                    <td colspan="100%" class="text-center py-3">No data available.</td>
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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