<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title'); ?>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?php base_url() ?>/template/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php base_url() ?>/template/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->

    <!-- datatables css -->
    <link rel="stylesheet" href="<?php base_url() ?>/template/assets/modules/datatables/datatables.min.css">
    <link rel="stylesheet" href="<?php base_url() ?>/template/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php base_url() ?>/template/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?php base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?php base_url() ?>/template/assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?php base_url() ?>/template/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi,
                                <?php
                                if (session()->get('level') == 1) {
                                    $nip = session()->get('id_user');
                                    $connect = mysqli_connect("127.0.0.1", "root", "", "db_mahasiswa");
                                    $sql = "SELECT nama FROM Akademik WHERE nip = $nip";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo $row["nama"];
                                    }
                                }

                                if (session()->get('level') == 2) {


                                    $nim = session()->get('id_user');
                                    $connect = mysqli_connect("127.0.0.1", "root", "", "db_mahasiswa");
                                    $sql = "SELECT nama FROM Mahasiswa WHERE nim = $nim";
                                    $result = mysqli_query($connect, $sql);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo $row["nama"];
                                    }
                                }

                                ?>
                                <br>
                                <!-- <p>
                                    <?php if (session()->get('level') == 1) {
                                        echo 'Akademik';
                                    } else if (session()->get('level') == 2) {
                                        echo 'Mahasiswa';
                                    } else {
                                        echo 'Tidak Dikenali';
                                    } ?>
                                </p> -->
                            </div>

                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- <div class="dropdown-title">Logged in 5 min ago</div>
                            <a href="features-profile.html" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profile
                            </a>
                            <a href="features-activities.html" class="dropdown-item has-icon">
                                <i class="fas fa-bolt"></i> Activities
                            </a>
                            <a href="features-settings.html" class="dropdown-item has-icon">
                                <i class="fas fa-cog"></i> Settings
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a href="<?= site_url('auth/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url() ?>">CRUD MAHASISWA</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= site_url() ?>">CM</a>
                    </div>
                    <ul class="sidebar-menu">
                        <?= $this->include('layout/menu') ?>
                    </ul>
                    </li>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $this->renderSection('content'); ?>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="https://nauval.in/">Khafid</a>
                </div>
                <div class="footer-right">
                    v1.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?php base_url() ?>/template/assets/modules/jquery.min.js"></script>
    <script src="<?php base_url() ?>/template/assets/modules/popper.js"></script>
    <script src="<?php base_url() ?>/template/assets/modules/tooltip.js"></script>
    <script src="<?php base_url() ?>/template/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php base_url() ?>/template/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="<?php base_url() ?>/template/assets/modules/moment.min.js"></script>
    <script src="<?php base_url() ?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <script src="<?php base_url() ?>/template/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php base_url() ?>/template/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
    <script src="<?php base_url() ?>/template/assets/modules/jquery-ui/jquery-ui.min.js"></script>

    <script src="<?php base_url() ?>/template/assets/js/page/modules-datatables.js"></script>

    <!-- Page Specific JS File -->
    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function() {
                $($this).remove();
            });
        }, 3000);
    </script>
    <!-- Template JS File -->
    <script src="<?php base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?php base_url() ?>/template/assets/js/custom.js"></script>
</body>

</html>