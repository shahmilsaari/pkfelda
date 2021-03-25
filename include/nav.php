
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">PKFelda System</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i>Login as : <?php echo htmlspecialchars($_SESSION["username"]); ?></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="viewprofile.php?id= <?php echo htmlspecialchars($_SESSION["id"]);?>">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">KEMATIAN DAN PERWARIS</div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                            TAMBAH MAKLUMAT
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="process1.php">SEMUA MAKLUMAT</a>
                              <a class="nav-link" href="peneroka.php">PENEROKA</a>
                              <a class="nav-link" href="isteri.php">PENEROKAWATI</a>
                                <a class="nav-link" href="kahwin.php">KAHWIN</a>
                              <a class="nav-link" href="pewaris.php">PEWARIS</a>
                              <a class="nav-link" href="warisan.php">PEWARISAN</a>
                              <a class="nav-link" href="kematian.php">KEMATIAN</a>
                            </nav>
                        </div>



                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayoutssz" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-file"></i></div>
                            LIHAT MAKLUMAT
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayoutssz" aria-labelledby="heading344" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="viewpeneroka.php">PENEROKA</a>
                                <a class="nav-link" href="viewisteri.php">PENEROKAWATI</a>
                                <a class="nav-link" href="viewpewaris.php">PEWARIS</a>
                                <a class="nav-link" href="viewkematians.php">KEMATIAN</a>
                            </nav>
                        </div>


















                </div>

            </nav>
        </div>
