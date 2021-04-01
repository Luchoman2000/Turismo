<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h1 class="text-dark mb-1" style="margin-top: 30px;">Gestionar gastronomía</h1>
        </div>
        <div class="container-fluid" style="margin-top: 20px;">
            <div class="col-md-12" style="margin-top: 30px;">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo  SERVERURL; ?>admin/creargastronomia">Nueva gastronomía</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lista de gastronomías</li>
                    </ol>
                </nav>


                <div class="card shadow">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 font-weight-bold">Lista de gastronomías </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 text-nowrap">
                            </div>

                        </div>
                        <?php require_once './../Turismo/admin/controller-admin/gastronomia.controlador.php';
                        $i = new GastronomiaControlador();
                        ?>
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <?php
                            echo $i->CtrMostrarGastronomia();
                            
                            ?>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>