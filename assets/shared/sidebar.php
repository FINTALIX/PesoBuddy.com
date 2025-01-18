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
            <img src="../assets/images/pesobuddy_icon.png" id="toggleSidebar" alt="Toggle Sidebar" class="toggle-logo">
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
                <a href="users.php" class="sidebar-link">
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
    <div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarOffcanvas" aria-labelledby="sidebarOffcanvasLabel">
        <div class="offcanvas-header">
            <img src="../assets/images/pesobuddy_logoW.png" alt="PESOBUDDY" class="img-fluid" id="sidebarOffcanvasLabel"
                style="max-height: 94px; max-width: 200px">
            <button type="button" class="btn-close text-reset m-0" data-bs-dismiss="offcanvas" aria-label="Close"
                style="background-color: transparent;"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a href="index.php" class="sidebar-link"><i class="bi bi-bar-chart-line"></i>
                        Dashboard</a></li>
                <li><a href="users.php" class="sidebar-link"><i class="bi bi-person"></i> Users</a></li>
                <li><a href="categories.php" class="sidebar-link"><i class="bi bi-list"></i> Categories</a></li>
                <li><a href="settings.php" class="sidebar-link"><i class="bi bi-gear"></i> Settings</a></li>
                <li><a href="#logout" class="sidebar-link"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
            </ul>
        </div>
    </div>

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

        document.addEventListener("DOMContentLoaded", () => {
            const pathName = window.location.pathname;
            const links = document.querySelectorAll(".sidebar-link");

            links.forEach(link => {
                const linkHref = link.getAttribute("href");
                if (pathName.includes(linkHref)) {
                    link.classList.add("active");
                } else {
                    link.classList.remove("active");
                }
            });
        });


    </script>