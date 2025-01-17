<!-- Navbar -->
<div class="container-fluid px-0 fixed-top">
    <div class="navbar navbar-expand-lg px-3">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <img src="assets/images/pesobuddy_logoW.png" width="230" height="50" alt="Logo">
        </a>

        <!-- Toggler Button -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Menu -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link px-2" href="#">Overview</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="#budget-tracker">Tracker</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-2" href="#transaction-history">Transaction</a>
                </li>


                <!-- User Profile Dropdown -->
                <li class="nav-item dropdown ms-lg-3 px-2">
                    <!-- Profile Image -->
                    <a class="d-none d-lg-block" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                        style="cursor: pointer;">
                        <img src="assets/images/pesobuddy_icon.png" alt="Profile" width="32" height="32"
                            class="rounded-circle">
                    </a>
                    <a class="nav-link d-block d-lg-none" id="profileDropdown" data-bs-toggle="dropdown"
                        aria-expanded="false" style="cursor: pointer;">Profile</a>

                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li>
                            <a class="dropdown-item" href="settings.php">
                                <i class="bi bi-gear px-1"></i> Settings
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="login.php" style="color: red;">
                                <i class="bi bi-box-arrow-right px-1"></i> Log Out
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>