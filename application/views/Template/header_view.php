<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="USAM">
    <meta name="description" content="Sistema para Administración de Convenios de la Universidad">
    <title><?= $page_title; ?></title>
    <link rel="icon" type="image/png" href="<?= base_url() . 'assets/img/login.png'; ?>">
    <!-- Librerías y estilos CSS -->
    <!--<link type="text/css" rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"> -->
    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/css/all.css'; ?>">
    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/css/all.min.css'; ?>">
    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/css/fontawesome.css'; ?>">

    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/mdb/css/bootstrap.min.css'; ?>">
    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/mdb/css/mdb.min.css'; ?>">
    <!-- DataTables CSS -->
    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/mdb/css/addons/datatables.min.css'; ?>">
    <!-- Our Custom CSS -->
    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/css/menu.css'; ?>">
    <!--  <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"> -->
    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/css/usam-styles.css'; ?>">
    <link type="text/css" rel="stylesheet" href="<?= base_url() . 'assets/css/style.css'; ?>">
    <link rel="stylesheet" href="<?= base_url() . 'assets/plugins/toastr/toastr.css' ?>">

    <style>
        /* fallback */
        @font-face {
            font-family: 'Material Icons';
            font-style: normal;
            font-weight: 400;
            src: url(<?= base_url() . 'assets/css/MaterialIcons.woff2'; ?>) format('woff2');
        }

        .material-icons {
            font-family: 'Material Icons';
            font-weight: normal;
            font-style: normal;
            font-size: 25px;
            line-height: 1;
            letter-spacing: normal;
            text-transform: none;
            display: inline-block;
            white-space: nowrap;
            word-wrap: normal;
            direction: ltr;
            -webkit-font-feature-settings: 'liga';
            -webkit-font-smoothing: antialiased;
        }
    </style>
    <!-- script -->
    <script src="<?= base_url() . 'assets/mdb/js/jquery.min.js'; ?>"></script>

    <?php
    if ($view = 'convenios/convenios_insert_view' || $view = 'convenios/convenios_insert_view' || $view = 'reportes_view') { ?>
        <script src="<?= base_url() . 'assets/js/select2.min.js' ?>"></script>
        <link rel="stylesheet" href="<?= base_url() . 'assets/css/select2.min.css'; ?>">

    <?php } ?>

</head>

<body>
    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="<?= base_url() . 'assets/img/login.png'; ?>" class="img-fluid my-3 mx-auto d-block">
                <p class="text-center h4">Convenios USAM</p>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a id="liveclock"></a>
                </li>
                <li class="<?php $this->uri->segment(1) == 'dashboard' ? print 'active' : print '' ?>">
                    <a href="<?= base_url() . 'dashboard'; ?>"><i class="inline-icon material-icons">dashboard</i>Dashboard</a>
                </li>
                <li class="<?php $this->uri->segment(1) == 'entidades' ? print 'active' : print '' ?>">
                    <a href="<?= base_url() . 'entidades'; ?>"><i class="inline-icon material-icons">people</i>Entidades</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="inline-icon material-icons">description</i>Convenios
                    </a>

                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li class="<?php $this->uri->segment(1) == 'convenios' ? print 'active' : print '' ?>">
                            <a href="<?= base_url() . 'convenios'; ?>"><i class="inline-icon material-icons">work</i>Convenios</a>
                        </li>
                        <li class="<?php $this->uri->segment(1) == 'actividades' ? print 'active' : print '' ?>">
                            <a href="<?= base_url() . 'actividades'; ?>"><i class="inline-icon material-icons">task</i>Actividades</a>
                        </li>
                        <li class="<?php $this->uri->segment(1) == 'reportes' ? print 'active' : print '' ?>">
                            <a href="<?= base_url() . 'reportes'; ?>"><i class="inline-icon material-icons">trending_up</i>Reportes</a>
                        </li>
                    </ul>
                </li>
                <li class="<?php $this->uri->segment(1) == 'facultades' ? print 'active' : print '' ?>">
                    <a href="<?= base_url() . 'facultades'; ?>"><i class="inline-icon material-icons">school</i>Facultades</a>
                </li>
                <li class="<?php $this->uri->segment(1) == 'oficinas' ? print 'active' : print '' ?>">
                    <a href="<?= base_url() . 'oficinas'; ?>"><i class="inline-icon material-icons">apartment</i>Oficinas</a>
                </li>
                <?php if ($this->session->userdata('rol_') == 1) { ?>
                    <li class="<?php $this->uri->segment(1) == 'usuarios' ? print 'active' : print '' ?>">
                        <a href="<?= base_url() . 'usuarios'; ?>"><i class="inline-icon material-icons">manage_accounts</i>Usuarios</a>
                    </li>
                <?php } ?>
            </ul>
            <ul>
                <li>
                    <a href="#account-details" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="inline-icon material-icons">account_circle</i>Hola, <?php echo $this->session->userdata('nombre_user'); ?>
                    </a>
                </li>
                <ul class="collapse list-unstyled" id="account-details">
                    <li>
                        <a href="<?= base_url(); ?>login/cerrar_sesion">
                            <i class="inline-icon material-icons">login</i>Cerrar sesión
                        </a>
                    </li>
                </ul>
            </ul>
        </nav>

        <!-- Page Content Holder -->
        <div id="content" class="mb-5">

            <nav class="navbar">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </nav>