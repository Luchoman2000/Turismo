<?php
require_once "controller/sabiasque.controlador.php";
$infografia = buscar::BuscarsabiasQue();
$num = 0;
?>
<div class="container-fluid" style="padding: 7% 2% ;">
    <div class="photo-gallery">
        <div class="container-fluid">
            <div class="intro" style="height: 69px;">
                <h2 class="text-center" style="color: rgb(49,52,55);">¿Sabías que?</h2>
            </div>
            <div class="row" style=" align-items: center; justify-content: center;">
                <?php
                for ($i = 2; $i < count($infografia) + 2; $i++) {
                    $num++;
                ?>

                    <div class="col-sm-6 col-md-4 col-lg-3 m-4 sq-hover">
                        <div class="card shadow rounded-2">
                            <a data-lightbox="photos" href="../assets/images/sabias-que/<?php echo $infografia[$i] ?>">
                                <img loading="lazy" class="img-fluid rounded-2" src="../assets/images/sabias-que/<?php echo $infografia[$i] ?>">
                            </a>
                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
    <div class="photo-gallery"></div>
    <div class="simple-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper"></div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>
<script>
    // console.log(<?php print_r($infografia); ?>);
</script>