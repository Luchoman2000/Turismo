<div class="d-flex flex-column" id="content-wrapper" >
    <div id="content">
        <div class="container-fluid">
            <div class="d-sm-flex justify-content-between align-items-center mb-4" style="margin-top: 30px;">
                <h1 class="text-dark mb-0" >Dashboard</h1>
                <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#">
                    <i class="fas fa-download fa-sm text-white-50"></i>Generar reporte
                </a>
            </div>
            <div class="row">
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Total visitas al sitio (mes)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>No Asignado</span></div>
                                </div>
                                <div class="col-auto"><i class="fa fa-eye fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-success py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Total Likes (mes)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>No asignado</span></div>
                                </div>
                                <div class="col-auto"><i class="fa fa-thumbs-o-up fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3 mb-4">
                    <div class="card shadow border-left-warning py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col mr-2">
                                    <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>Total comentarios (mes)</span></div>
                                    <div class="text-dark font-weight-bold h5 mb-0"><span>No asignado</span></div>
                                </div>
                                <div class="col-auto"><i class="fas fa-comments fa-2x text-gray-300"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary font-weight-bold m-0">Resumen de actividad</h6>
                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false" data-toggle="dropdown" type="button"><i class="fas fa-ellipsis-v text-gray-400"></i></button>
                                <div class="dropdown-menu shadow dropdown-menu-right animated--fade-in">
                                    <p class="text-center dropdown-header">filtrar por:</p>
                                    <a class="dropdown-item" href="#">Año</a>
                                    <a class="dropdown-item" href="#">Mes</a>
                                    <a class="dropdown-item" href="#">Dia</a>
                                    <!-- <div class="dropdown-divider"></div> -->
                                    <a class="dropdown-item" href="#">Desde el inicio</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area"><canvas height="320" style="display: block; width: 364px; height: 320px;" width="364"></canvas></div>
                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>