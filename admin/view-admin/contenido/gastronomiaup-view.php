<?php
require_once './../Turismo/admin/controller-admin/gastronomia.controlador.php';
$us = new GastronomiaControlador();
$us = $us->CtrEditarGastronomia();
?>

<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h1 class="text-dark mb-1" style="margin-top: 30px;">Actualizar gastronomía</h1>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="margin-top: 30px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Actualizar gastronomía</li>
                            <li class="breadcrumb-item"><a href="<?php echo  SERVERURL; ?>admin/listgastronomia">Lista de gastronomías</a></li>
                        </ol>
                    </nav>
                    <!-- <div class="container-fluid">
                        <ul class="breadcrumb-item breadcrumb">
                            <li>
                                <a href="<?php echo  SERVERURL; ?>admin/creargastronomia" class="btn btn-info">
                                    <i class="zmdi zmdi-plus"></i> &nbsp; 
                                </a>
                            </li>
                            <li>
                                <a href="" class="btn btn-success">
                                    <i class="zmdi zmdi-format-list-bulleted"></i> &nbsp; 
                                </a>
                            </li>
                        </ul>
                    </div> -->
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Actualizar entrada</p>
                        </div>

                        <div class="card-body">
                            <form novalidate class="FormularioAjax" method="POST" data-form="update" enctype="multipart/form-data" autocomplete="off" action="<?php echo SERVERURL ?>admin/ajax-admin/gastronomia.ajax.php">
                                <input type="hidden" name="idGasUp" value="<?php echo mainModel::encryption($us['gas_id']) ?>">

                                <h4 class="text-left">Título</h4>
                                <div class="form-group">
                                    <input type="text" class="form-control" maxlength="30" name="tituloGasUp" placeholder="Título" required="" value="<?php echo $us['gas_titulo'] ?>" />
                                </div>

                                <h4 class="text-left">Imagen de presentación</h4>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    En caso de incluir varias imágenes estas se presentarán en un "<strong>carousel</strong>" de imágenes
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <!-- <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <strong>Tip:</strong> Haz click en la imagen para borrarla de la lista
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div> -->
                                <div class="form-group">
                                    <div class="container">
                                        <p id="imagenInfo" class="text-black-50"></p>
                                        <div class="row text-center text-lg-left" id="listImages">
                                            <?php
                                            $paths = $us['gas_path_imagen'];
                                            // echo '<script>console.log("$paths")</script>';
                                            $arrayPaths = explode(",", $paths);
                                            // var_dump($arrayPaths);
                                            for ($i = 0; $i < count($arrayPaths); $i++) {
                                            ?>
                                                <div class="col-lg-3 col-md-4 col-6">
                                                    <a class="d-block mb-4 h-100">
                                                        <img name="imgP" class="imgP img-fluid img-thumbnail" src="<?php echo $arrayPaths[$i]; ?>" alt="">
                                                    </a>
                                                </div>

                                            <?php }

                                            ?>
                                        </div>
                                    </div>
                                    <!-- <div class="clear"></div> -->

                                    <!-- /Turismo/elFinder/php/../../assets/images/gastronomia/account.png ; ,/Turismo/elFinder/php/../../ass -->

                                    <input type="hidden" id="imagenVistaRuta" readonly name="imagenPathGasUp" value="<?php echo $us['gas_path_imagen'] ?>" />
                                    <!--
                                    <div class="button-group">
                                        <button type="button" class="browse" id="imageUpload"> Browse </button>
                                    </div> -->



                                    <div>
                                        <!-- <input type="text" id="finder" name="" value=""> -->
                                        <button id="browseUpdate" type="button" class="btn btn-primary browse">Subir imagen</button>
                                        <button id="clearList" type="button" class="btn btn-danger browse">Vaciar lista</button>
                                        <div id="editor"></div>
                                        <!-- <input type="file" class="form-control-file custom-file-input" id="imagenPortada" accept="image/*" name="imagenPortada" /> -->
                                        <!-- <div class="text-center">
                                            <label id="imagenPortadaLabel" for="imagenPortada">
                                                <i class="fas fa-upload"></i> Elegir una imagen o varias de presentación
                                            </label>
                                        </div>
                                        <div class="text-center mt-2"></div> -->
                                    </div>

                                </div>
                                <h4 class="text-left">Información</h4>
                                <div class="form-group">
                                    <textarea required="" class="form-control" name="contenidoGasUp" id="editorGn" maxlength="400" rows="12">

                                <?php echo $us['gas_contenido'] ?>
                                </textarea>
                                </div>

                                <button class="btn btn-primary" id="submit" type="submit">Actualizar</button>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <script>
    ClassicEditor
        .create(document.querySelector('#editorG'), {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'link',
                    'bulletedList',
                    'numberedList',
                    'blockQuote',
                    'undo',
                    'redo'
                ]
            },

            language: 'es'
        })

        .catch(error => {
            console.error(error);
        });
</script> -->