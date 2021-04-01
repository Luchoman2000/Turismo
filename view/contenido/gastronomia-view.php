<?php require_once './core/configGeneral.php';
$peticionAjax = false;
?>
<?php

require_once './../Turismo/admin/controller-admin/gastronomia.controlador.php';
$us = new GastronomiaControlador();
?>

<div class="container-fluid" style="padding: 7% 2% 20%;">
    <div class="intro" style="height: 69px;">
        <h2 class="text-center" style="color: rgb(49,52,55);">Gastronomía</h2>
    </div>

    <!-- <div class="row text-center" style="width: 1214px;height: 400px;padding-left:15%;">
        <div class="col text-center" style="width: 1038px;height: 400px;">
            <div class="carousel slide" data-ride="carousel" id="carousel-1" style="max-height: 400px;">
                <div class="carousel-inner" role="listbox" style="max-height: 400px;">
                    <div class="carousel-item active" style="max-height: 400px;"><img class="w-100 d-block" style="max-height: 400px;" src="<?php echo SERVERURL ?>view/img/platos/fritada1.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/gallina1.jpg" alt="Slide Image"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/hornado.jpg" alt="Slide Image"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>
                    <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>
            </div>
        </div>
    </div> -->
    <br>

    <!-- <div class="row">


        <div class="col">
            <div class="card shadow mb-4">

                <div class="carousel slide" data-ride="carousel" id="carousel-2">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/gallina.jpg"></div>
                        <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/gallina1.jpg " alt="Slide Image"></div>
                    </div>
                    <div><a class="carousel-control-prev" href="#carousel-2" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-2" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-2" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-2" data-slide-to="1"></li>

                    </ol>
                </div>


                <p>Este plato se prepara cocinando la gallina entera con sal, cebolla, apio, zanahoria y hierbas. Luego se le agrega arrocillo y papa o yuca. Al momento de servir se coloca una presa en cada plato y se agrega picadillo de cebolla y culantro. En su forma más tradicional, se prepara con gallina criolla, criada en el campo.</p>
            </div>
        </div>
        <div class="col align-self-center">
            <h1 class="display-3 text-center"><span> Caldo de gallina</span></h1>
        </div>


    </div>
    <br>
    <div class="row">
        <div class="col text-center align-self-center">
            <h1 class="display-3 text-center"><span> Locro de papa</span></h1>
        </div>
        <div class="col derecho">
            <div class="carousel slide" data-ride="carousel" id="carousel-3">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/locropapa.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/locropapa1.jpg" alt="Slide Image"></div>

                </div>
                <div><a class="carousel-control-prev" href="#carousel-3" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-3" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-3" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-3" data-slide-to="1"></li>

                </ol>
            </div>
            <p>El locro es un plato de origen preincaico, cuya presencia se extiende por toda la cordillera de los Andes. En el Ecuador se lo realiza a base de una variedad de papas, una parte de ellas muy cocidas y disueltas que se mezclan con otras más duras. Los conocedores aseguran que lo ideal es utilizar tres tipos de papas (uvilla, súper chola y chaucha) para asegurar la consistencia adecuada. Se sirve con pedacitos de queso y una rodaja de aguacate.</p>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col izquierda">
            <div class="carousel slide" data-ride="carousel" id="carousel-4">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/locrocuy.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/locrocuy1.jpg" alt="Slide Image"></div>

                </div>
                <div><a class="carousel-control-prev" href="#carousel-4" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-4" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-4" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-4" data-slide-to="1"></li>

                </ol>
            </div>
            <p>El locro del cuy tiene la misma base del locro de papa. Al cuy se lo cocina con las papas, y se incorpora hierbas nativas como el tipo, paico y hierbabuena para ensalzar el sabor. Al servir se acompaña de tostado, un tajo de aguacate, tomate y cebolla larga picada. La porción por plato corresponde a un cuarto del cuy.</p>
        </div>
        <div class="col text-center align-self-center">
            <h1 class="display-3 text-center"><span> Locro de Cuy</span></h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col text-center align-self-center">
            <h1 class="display-3 text-center"><span> Yaguarlocro </span></h1>
        </div>
        <div class="col derecho">
            <div class="carousel slide" data-ride="carousel" id="carousel-5">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/yaguarlocro.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/yaguarlocro1.jpg" alt="Slide Image"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-5" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-5" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-5" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-5" data-slide-to="1"></li>
                    <li data-target="#carousel-5" data-slide-to="2"></li>
                </ol>
            </div>
            <p>Yaguarlocro proviene del kichwa y se traduce como locro de sangre. El yaguarlocro contiene la misma base de papa que los anteriores locros y se complementa con menudo (panza, librillo y tripas) de borrego. La sangre de borrego se prepara cocinándola primero en agua, y luego agregándola a un refrito que incluye cebolla, perejil y condimentos. Al momento de servir se coloca la sangre en un plato aparte con aguacate, cebolla curtida y tomate. Este plato solo existe en el Ecuador y se cree que tiene origen colonial.</p>
        </div>

    </div>
    <br>
    <div class="row">
        <div class="col izquierda">
            <div class="carousel slide" data-ride="carousel" id="carousel-6">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/chacarrero.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/chacarrero1.jpg" alt="Slide Image"></div>

                </div>
                <div><a class="carousel-control-prev" href="#carousel-6" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-6" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-6" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-6" data-slide-to="1"></li>

                </ol>
            </div>
            <p>Conocido como el plato representativo de los chagras, todos sus ingredientes son extraídos de los páramos del cantón. Puede servirse solo, aunque muchas veces se presenta como acompañante de otros platos. El cocinado contiene habas, papa chaucha, mellocos y un choclo entero. Todos estos ingredientes son cocinados (de ahí el nombre) y servidos en un mismo plato con un poco de queso fresco. El ají de piedra es un gran complemento para este nutritivo platillo.</p>
        </div>
        <div class="col text-center align-self-center">
            <h1 class="display-3 text-center"><span> Cocinado chacarero</span></h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col text-center align-self-center">
            <h1 class="display-3 text-center"><span> Tortillas con hornado</span></h1>
        </div>
        <div class="col derecho">
            <div class="carousel slide" data-ride="carousel" id="carousel-1">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/hornado.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/hornado1.jpg" alt="Slide Image"></div>
                </div>
                <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-1" data-slide-to="1"></li>

                </ol>
            </div>
            <p>Las tortillas de papa también sirven como complemento del popular hornado, para obtener una carne suave y una corteza crujiente, se cocina el cerdo en horno de leña ya a fuego lento. Para servir, se corta la carne en trozos pequeños y se incluye unos pedazos de cuerto crujiente. Se acompaña de tortillas de papa, mote y “agrio” (especie de ají muy aguado con sal cebolla picada).</p>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col izquierda">
            <div class="carousel slide" data-ride="carousel" id="carousel-7">
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/fritada.jpg"></div>
                    <div class="carousel-item"><img class="w-100 d-block" src="<?php echo SERVERURL ?>view/img/platos/fritada1.jpg" alt="Slide Image"></div>

                </div>
                <div><a class="carousel-control-prev" href="#carousel-7" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-7" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
                <ol class="carousel-indicators">
                    <li data-target="#carousel-7" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-7" data-slide-to="1"></li>

                </ol>
            </div>
            <p>Para su preparación se corta la carne en cuadraditos y se los aliña con ajo, cebolla y sal. Se pone a cocinar en paila de bronce hasta que el agua se evapore por completo. Entonces, la carne de cerdo se empieza a freír en su propia manteca. La grasa que en el proceso se tuesta en la paila se conoce como mapahuira (del kichwa “manteca sucia”) y se usa para freír el maduro o las papas que acompañan al plato de fritada. Para equilibrar el gusto fuerte de la fritada se suele servir con mote, tortilla de papa o papas cocinadas y choclo.</p>
        </div>
        <div class="col text-center align-self-center">
            <h1 class="display-3 text-center"><span> Fritada</span></h1>
        </div>

    </div> -->


    <section>

        <?php echo $us->CtrMostrarGastronomiaPublic() ?>

        <!-- <div class="row photo-card mt-5 mb-5">
                <div class="col align-self-start col-lg-6">
                    <div class="photo-details" style="width: 100%;">

                        <h2 class="display-4">Lorem ipsum</h2>

                        <p class="lead text-break text-dark" style="width: 436px;color: rgb(0,0,0);">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras sodales elementum mi non hendrerit. Proin tempor facilisis felis nec ultrices. Duis nec ultrices neque. Proin semper ultricies turpis, vel faucibus velit sodales vitae. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. llllllllllllllllggggggggggggggggggggggggggggggggggggasdddddddddddddddddddddddddddddddddddddddddddddddddddasdasdasdadasddasdasdasddddddddddddddddddasasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd</p>

                        <div style="text-align: center;margin-top: 30px;margin-bottom: 15px;">
                            <a class="btn btn-primary like-counter" role="button" href="#" style="border-radius: 21px;">

                                <i class="fa fa-thumbs-up"></i> | <span id="clicks-1" class="click-text"></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col align-self-center col-lg-6">
                    <div id="carouselExampleControls" class="carousel slide clearpaddin" data-ride="carousel">
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <img class="d-block w-100" src="blob:file:///f374adb6-9b2c-4e19-af12-d64e2f7ec9e4" alt="First slide" />
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="blob:file:///f374adb6-9b2c-4e19-af12-d64e2f7ec9e4" alt="Second slide" />
                            </div>

                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleControls" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" data-slide="next">
                            <span class="carousel-control-next-icon">
                            </span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>


            </div> -->




    </section>
</div>
