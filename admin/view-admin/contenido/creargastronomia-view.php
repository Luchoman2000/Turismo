<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h1 class="text-dark mb-1" style="margin-top: 30px;">Crear gastronomía</h1>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12" style="margin-top: 30px;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Nueva gastronomía</li>
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
                            <p class="text-primary m-0 font-weight-bold">Crear nueva entrada</p>
                        </div>

                        <div class="card-body">
                            <form novalidate class="FormularioAjax" method="POST" data-form="save" enctype="multipart/form-data" autocomplete="off" action="<?php echo SERVERURL ?>admin/ajax-admin/gastronomia.ajax.php">

                                <h4 class="text-left">Título</h4>
                                <div class="form-group">
                                    <input type="text" class="form-control" maxlength="30" name="tituloGas" placeholder="Título" required="" />
                                </div>

                                <h4 class="text-left">Imagen de presentación</h4>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    En caso de incluir varias imágenes estas se presentarán en un "<strong>carousel</strong>" de imágenes
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="form-group">
                                    <div class="container">
                                        <p id="imagenInfo" class="text-black-50">Ninguna imagen seleccionada</p>
                                        <div class="row text-center text-lg-left" id="listImages">



                                        </div>
                                    </div>


                                    <input type="hidden" id="imagenVistaRuta" readonly name="imagenPathGas" />


                                    <div>
                                        <button id="browse" type="button" class="btn btn-primary browse">Subir imagen</button>
                                        <button id="clearList" type="button" class="btn btn-danger browse">Vaciar lista</button>
                                        <div id="editor"></div>

                                    </div>

                                </div>
                                <h4 class="text-left">Información</h4>
                                <div class="form-group"><textarea required="" maxlength="400" class="form-control" name="contenidoGas" id="editorG" rows="12"></textarea></div>

                                <button class="btn btn-primary" id="submit" type="submit">Guardar</button>



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