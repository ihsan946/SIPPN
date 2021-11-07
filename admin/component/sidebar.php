<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../img/logo_bnn.png" class="brand-link">
        <img src="../img/logo_bnn.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIPPN</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <!-- example -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php if ($halaman == "Overview") echo "active"; ?>">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="user.php" class="nav-link <?php if ($halaman == "Data User") echo "active"; ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pengesahan.php" class="nav-link <?php if ($halaman == "Data Pengesahan") echo "active"; ?>">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Data Pengesahan
                        </p>
                    </a>
                </li>
                <li class="nav-header">USERS</li>
                <li class="nav-item">
                    <a href="../login/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>