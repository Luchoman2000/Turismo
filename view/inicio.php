<?php
$peticionAjax = false;
include 'core/configGeneral.php';
require_once 'model/usuarioi.modelo.php';

$log = new UsuarioInvitadoModelo();
if (isset($_COOKIE['USERINV']) && !empty(isset($_COOKIE['USERINV']))) {
    session_start();
    $idcookie = $_COOKIE['USERINV'];
    $log = $log->MdlMostrarUsuarioInv($idcookie);
    $_SESSION['userinv'] = $log['id_u_invitado'];

    //$log['id_u_invitado'];
    // setcookie('USERINV',  . "," . $idcookie , time() + 365 * 24 * 60 * 60);

} else {
    $randomNumber = rand(99, 999999);  //Numero Random
    $token = dechex(($randomNumber * $randomNumber));  //Cast a Hexadecimal
    $idc = sha1($token . $randomNumber);

    setcookie('USERINV', $idc, time() + 365 * 24 * 60 * 60);

    $ins = new UsuarioInvitadoModelo();
    $ins->MdlInsertarUsuarioInvCookie($idc);

    // Not logged in :(
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turismo - 360</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/photo-sphere-viewer@4/dist/photo-sphere-viewer.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.8.2/css/lightbox.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/nav.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/footer.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/styles.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/style.index.css">
    <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/contents.css">
    <!-- <link rel="stylesheet" href="<?php echo SERVERURL ?>view/css/Article-Dual-Column.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="<?php echo SERVERURL ?>panoramas/test/pano2vr_player.js"></script>


</head>

<body>

    <?php
    require_once "./controller/vista.controlador.php";
    $vt = new VistaControlador();
    $vistas = $vt->CtrMostrarVistas();
    if ($vistas == "404") {
        require_once "./view/contenido/404-view.php";
    } else {
        include 'modulos/navbar.php';
        if ($vistas == "home") {
            require_once "./view/contenido/home-view.php";
        } else {
            require_once $vistas;
        }

        include 'modulos/footer.php';
        include 'modulos/scripts.php';
    }


    ?>





</body>

</html>