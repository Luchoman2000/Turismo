<?php require_once './core/configGeneral.php';
$peticionAjax = false;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <title>Admin - Mejia360</title>
    <link rel="stylesheet" href="<?php echo SERVERURL ?>admin/view-admin/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>admin/view-admin/assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>admin/view-admin/assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>admin/view-admin/assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>admin/view-admin/assets/css/Billing-Table-with-Add-Row--Fixed-Header-Feature.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>admin/view-admin/assets/css/contents.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.31.2/css/theme.bootstrap_4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>admin/view-admin/assets/css/Table-with-search--sort-filters.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" />

    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo SERVERURL ?>elFinder/css/elfinder.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo SERVERURL ?>elFinder/css/theme.css">
    <script src="<?php echo SERVERURL ?>ckeditor/build/ckeditor.js"></script>
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- jQuery and jQuery-UI -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script> -->
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.min.css" /> -->
    <!-- <link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" /> -->
</head>

<body id="page-top">

    <?php
    require_once "./admin/controller-admin/vista.controlador.php";
    $vt = new VistaControladorAdm();
    $vistas = $vt->CtrMostrarVistas();
    if ($vistas == "login" || $vistas == "404") :
        if ($vistas == "login") {
            // header("Location:".SERVERURL."admin/view-admin/contenido/login-view.php");
            require_once "./admin/view-admin/contenido/login-view.php";
        } else {
            require_once "./admin/view-admin/contenido/404-view.php";
        }
    else :
        session_start(["name" => "ADM-MEJIA"]);
        require_once "./admin/controller-admin/login.controlador.php";
        $cerrar = new LoginControlador();

        if (!isset($_SESSION['adm_nombre']) || !isset($_SESSION['adm_correo'])) {
            // $cerrar->forzar_cierre_sesion_controlador();
            // $cerrar->cerrar_sesion_administrador_controlador();
        }

    ?>
        <div id="wrapper">
            <?php include 'modulos/navbar.php'; ?>

            <?php require_once $vistas; ?>


            <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        <?php endif; ?>

        </div>
        <!--====== Scripts -->
        <?php include 'modulos/script.php'; ?>


</body>

</html>