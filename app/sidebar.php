<style>
    .logo-header {
        background-color: #0000;
    }

    .sidebar {
        background-color: #222426;
    }

    /* Cambiar color de los enlaces del sidebar */
    .sidebar .nav-item a {
        color: #ffffff !important;
        /* blanco para el texto */
    }

    /* Cambiar color de los íconos dentro del sidebar */
    .sidebar .nav-item a i {
        color: #ffffff !important;
        /* blanco para los íconos */
    }


    /* Ícono activo */
    .sidebar-wrapper .sidebar-content .nav.nav-secondary .nav-item.active a i {
        color: #EA4F1B !important;
    }

    /* Texto activo */
    .sidebar-wrapper .sidebar-content .nav.nav-secondary .nav-item.active a p {
        color: #EA4F1B !important;
    }

    /* Linea vertical */
    .sidebar .nav.nav-secondary>.nav-item.active a:before,
    .sidebar[data-background-color=white] .nav.nav-secondary>.nav-item.active a:before {
        background: #EA4F1B !important;
    }

    .sidebar .nav>.nav-item a:hover p {
        color: #FF5E23 !important
    }

    .sidebar .nav.nav-secondary>.nav-item a:hover i {
        color: #FF5E23 !important
    }

    .topbar-toggler.more i {
        color: #ffffff !important;
        /* blanco para los tres puntos */
    }

    .nav-toggle i {
        color: #ffffff !important;
    }
</style>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header">
            <a href="index.php" class="logo">
                <img src="/globxel/assets/images/logos/logo.svg">
            </a>


            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                    <a href="index.php">
                        <i class="fas fa-home"></i>
                        <p>Inicio</p>
                    </a>
                </li>
                <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'leads.php' ? 'active' : ''; ?>">
                    <a href="leads.php">
                        <i class="fas fa-users"></i>
                        <p>Contactos</p>
                    </a>
                </li>
                <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'products.php' ? 'active' : ''; ?>">
                    <a href="products.php">
                        <i class="fas fa-th-list"></i>
                        <p>Productos</p>
                    </a>
                </li>
                <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'users.php' ? 'active' : ''; ?>">
                    <a href="users.php">
                        <i class="fas fa-address-card"></i>
                        <p>Usuarios</p>
                    </a>
                <li class="nav-item">
                    <a href="logout.php">
                        <i class="fas fa-power-off"></i>
                        <p>Salir</p>
                    </a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->