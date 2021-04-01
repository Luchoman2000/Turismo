
<!-- Preloader Inicio -->
<div class="preloader" id="preloader">

    <svg width="200" height="200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="lds-ripple" style="background:0 0">
        <circle cx="50" cy="50" r="4.719" fill="none" stroke="#1d3f72" stroke-width="2">
            <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="-1.5s" repeatCount="indefinite" />
            <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="-1.5s" repeatCount="indefinite" />
        </circle>
        <circle cx="50" cy="50" r="27.591" fill="none" stroke="#5699d2" stroke-width="2">
            <animate attributeName="r" calcMode="spline" values="0;40" keyTimes="0;1" dur="3" keySplines="0 0.2 0.8 1" begin="0s" repeatCount="indefinite" />
            <animate attributeName="opacity" calcMode="spline" values="1;0" keyTimes="0;1" dur="3" keySplines="0.2 0 0.8 1" begin="0s" repeatCount="indefinite" />
        </circle>
    </svg>

</div>
<!-- Preloader Fin -->




<!-- Vista principal 360 Inicio -->
<div id="viewer" style="height: 100vh; width: 100vw;">
    <!-- <header class="img_move"> -->
    <div class="intro-body test">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <h1 class="brand-heading">[Nombre de atractivo turistico]</h1>

                    <a class="btn btn-light btnObserbar" href="<?php echo SERVERURL ?>view/contenido/test-view.php" target="_newtab">
                        <span class="spanObserbar">Observar</span>
                        <!-- <i class="fa fa-chevron-right"></i> -->

                    </a>


                </div>
            </div>
        </div>
    </div>
    <!-- </header> -->
    <!-- <div class="clean-block test">
    <h1 class="brand-heading">El valle de los 9 volcanes</h1>

    <a class="btn btn-light" href="#about">
        Observar
        <i class="fa fa-chevron-right">
        </i>
    </a>
</div> -->
</div>
<!-- Vista principal 360 Fin -->




<section class="clean-block actividades">
    <div class="container">
        <div class="row justify-content-lg-center">

            <div class="col-xl-10 text-center">
                <a href="<?php echo SERVERURL?>atractivosnaturales"><h2  class="hover-target">Naturaleza</h2></a>
            </div>
            <div class="col-xl-10 text-center">
                <h2 class="and">y</h2>
            </div>
            <div class="col-xl-10 text-center">
                <a href="<?php echo SERVERURL?>atractivosculturales"><h2 class="travel hover-target">Cultura</h2></a>
            </div>
            <!-- <div class="col-xl-6 mt-4 text-center">
            <h2 class="fashion hover-target">fashion</h2>
        </div> -->
            <!-- <div class="col-xl-6 mt-4 text-center">
            <h2 class="culture hover-target">culture</h2>
        </div> -->
        </div>
    </div>
</section>




<!-- <div class="container-fluid">
<div class="row">
    <div class="col-md-12">
        <h2>
            Heading
        </h2>
        <p>
            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor
            mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna
            mollis euismod. Donec sed odio dui.
        </p>
        <p>
            <a class="btn" href="#">View details »</a>
        </p>
    </div>
</div>
</div> -->


<!-- Video -->
<section class="clean-block about-us">
    <div class="container" style="padding-top: 30px; padding-bottom: 100px;">
        <div class="row">
            <div class="col" style="border-style: none;">
                <div class="card clean-card text-center"><video controls preload="none" style="height: 600px;"></video>
                    <div class="card-body info">
                        <h4 class="card-title">Video 2</h4>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="article-clean">
    <div class="container">
        <div class="row">
            <div class="col" style="filter: brightness(11%) saturate(83%);">
                <div class="text">
                    <h1>¿Por qué visitar el cantón Mejía?</h1>
                    <p><br />Mejía está ubicado al al Sur Oriente de la provincia de Pichincha. Sus límites son: al
                        Norte: cantones, Quito y Rumiñahui; al Sur: Provincia de Cotopaxi; al Oriente: Provincia de
                        Napo y al Occidente: Provincia de Santo Domingo de los Tsáchilas. Tiene una superficie de
                        1.456km2; está conformado por ocho parroquias, siete rurales (Alóag, Aloasí, El Chaupi,
                        Cutuglagua, Manuel Cornejo Astorga (Tandapi), Tambillo y Uyumbicho), y una urbana, Machachi
                        que es la cabecera cantonal.<br /><br /></p>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- <div class="clean-block">
<div class="container">
    <div class="row">
        <div class="col">
            <div id="viewer"></div>
        </div>
    </div>
</div>

</div> -->




<!-- <style>
/* the viewer container must have a defined size */
#viewer {
    width: 100vw;
    height: 100vh;

}
</style> -->
<!-- Script de preloader -->

<script src="https://cdn.jsdelivr.net/npm/three/build/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uevent@2/browser.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/photo-sphere-viewer@4/dist/photo-sphere-viewer.min.js"></script>
<script>
    //check for navigation time API support

    var panoIndex = new PhotoSphereViewer.Viewer({

        container: document.querySelector('#viewer'),
        panorama: '<?php echo SERVERURL ?>view/img/pano_8.jpg',
        mousewheelCtrlKey: false,
        mousewheel: false,
        mousemove: false,
        navbar: false,
        autorotateSpeed: '1rpm',
        autorotateDelay: '1',
        minFov: '20',
        // navbar: [
        //     'hidden'
        // ]


    });
    panoIndex.loader.hide();

    function preloa() {
        const preloader = document.querySelector('.preloader');
        // window.addEventListener('load', setTimeout(function() {

        //         preloader.style.zIndex = '-999';
        //     },
        //     200,

        // ));
        // elem.addEventListener('load', fooFn);
        // setTimeout(function() {
        //     if (!preloader.style.opacity) {
        //         preloader.style.opacity = 1;
        //     }

        //     if (preloader.style.opacity > 0) {
        //         preloader.style.opacity -= 0.1;
        //     } else {
        //         clearInterval(fadeEffect);

        //     }
        // }, 200);

        var timeout = setTimeout(function() {
            if (!preloader.style.opacity) {
                preloader.style.opacity = 1;
            }

            if (preloader.style.opacity > 0) {
                preloader.style.opacity -= 0.1;
            } else {
                clearInterval(fadeEffect);

            }
            window.removeEventListener('load', foo);
            preloader.style.zIndex = '-999';
        }, 300);

        window.addEventListener('load', foo);

        function foo() {
            if (timeout) {
                window.addEventListener('load', timeout);
                clearTimeout(timeout);
                
            }
        }
    }

    panoIndex.once('ready', preloa);
    // panoIndex.once('ready', preloa);
    // document.querySelector('.preloader').style.zIndex = '-990';
    if (performance.navigation.type == 1) {
        panoIndex.once('ready', preloa);

    }
</script>