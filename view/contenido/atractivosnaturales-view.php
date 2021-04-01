<?php require_once './core/configGeneral.php';
$peticionAjax = false;
?>
<?php

require_once './../Turismo/admin/controller-admin/entrada.controlador.php';
$us = new EntradaControlador();
?>

<div class="container min-vh-100" style="padding: 120px 50px 20px;">
    <div class="intro" style="height: 69px;">
        <h2 class="text-center" style="color: rgb(49,52,55);">Atractivos naturales</h2>
    </div>


    <?php

    echo $us->CtrMostrarAtractivoNaturalPublic()

    ?>
    <!--     
    <div class="row">
        <div class="container-fluid" style="padding: 20px 70px 20px;">
            <div class="row">
                <div class="col-md-12">
                    <article class="single-item">

                        <header class="header">
                            <div class="titleAndAuthor">
                                <span class="title">
                                    Umbria
                                </span>
                            </div>
                        </header>


                        <div class="thumbnail-wrap">
                            <img class="grid-preview-image" loading="lazy" alt="" src="<?php echo SERVERURL ?>view/img/DSC00820.jpg">
                        </div>


                        <footer class="stats">
                            <button class="single-stat invisible-button loves heart-button loved-0" style="outline:none;">
                                <i class="fa fa-heart icon-heart heart" aria-hidden="true"></i>
                                <span class="count">0</span>
                            </button>

                            <a class="single-stat comments" href="/ansawi/details/ExYNKEE">
                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                <span class="count">0 </span>
                            </a>

                            <a class="single-stat views" href="/ansawi/full/ExYNKEE">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span class="count">0 </span>
                            </a>
                        </footer>


                    </article>
                </div>
            </div>
        </div>
    </div>


    <div class="row " style="padding-top: 5%;">
        <div class="container-fluid" style="padding: 20px 70px 20px;">
            <div class="row">
                <div class="col-md-12">

                    <article class="single-item">

                        <header class="header">

                            <div class="titleAndAuthor">
                                <span class="title">

                                    Umbria

                                </span>

                            </div>
                        </header>

                        <div class="thumbnail-wrap">
                            <img class="grid-preview-image" loading="lazy" alt="" src="<?php echo SERVERURL ?>view/img/DSC00820.jpg">


                        </div>

                        <footer class="stats">
                            <button class="single-stat invisible-button loves heart-button loved-0" style="outline:none;">

                                <i class="fa fa-heart icon-heart heart" aria-hidden="true"></i>
                                <span class="count">0</span>
                            </button>

                            <a class="single-stat comments" href="/ansawi/details/ExYNKEE">
                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                <span class="count">0 </span>
                            </a>

                            <a class="single-stat views" href="/ansawi/full/ExYNKEE">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                                <span class="count">0 </span>
                            </a>
                        </footer>

                    </article>

                </div>
            </div>
        </div>
    </div> -->



</div>