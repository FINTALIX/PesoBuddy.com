<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PesoBuddy | Admin Dashboard</title>
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
                    <a href="#profile" class="sidebar-link">
                        <i class="bi bi-person"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#categories" class="sidebar-link">
                        <i class="bi bi-list"></i>
                        <span>Categories</span>
                    </a>
                </li>
                <li class="sidebar-item mt-auto">
                    <a href="#settings" class="sidebar-link active">
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
                    <li><a href="#profile"><i class="bi bi-person"></i> Profile</a></li>
                    <li><a href="#categories"><i class="bi bi-list"></i> Categories</a></li>
                    <li><a href="#settings" class="sidebar-link active"><i class="bi bi-gear"></i> Settings</a></li>
                    <li><a href="#logout"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                </ul>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main" style="margin-left: 70px; transition: margin-left 0.25s ease-in-out;">

            <!-- Settings -->
            <div id="settings" class="container-fluid py-4 px-4">
                <div class="row">
                    <div class="col-12">
                        <h2 style="font-size: 24px; font-weight: bold; margin-bottom: 20px;">WEBSITE SETTINGS</h2>
                        <hr style="border-top: 2px solid #000; margin: 1rem 0 2rem 0; opacity: 1;">
                    </div>
                </div>

                <div class="row">
                    <div
                        class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-lg-start gap-3 ps-lg-5 mb-4">
                        <div class="website-logo">
                            <img src="../assets/images/pesobuddy_icon.png" alt="Website Logo"
                                style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover;">
                        </div>
                        <h3 style="margin-bottom: 0;">Website Logo</h3>
                    </div>
                    <div class="col-12 col-md-6 d-flex align-items-center justify-content-center justify-content-lg-end gap-3 pe-lg-5">
                        <button class="btn btn-primary">Change</button>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadLogoModal">Upload
                            New</button>
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