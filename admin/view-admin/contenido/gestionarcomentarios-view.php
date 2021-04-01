<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h1 class="text-dark mb-1" style="margin-top: 30px;">Gestionar comentarios</h1>
        </div>
        <div class="container-fluid" style="margin-top: 20px;">

            <!-- <div class="card" id="TableSorterCard">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-striped table tablesorter" id="ipi-table">
                                <thead class="thead-dark">
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Título</th>
                                        <th class="text-center">Vistas</th>
                                        <th class="text-center">Likes</th>
                                        <th class="text-center filter-false sorter-false">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    <tr>
                                        <td>Ana</td>
                                        <td>Diseñador</td>
                                        <td>Diseño</td>
                                        <td>2</td>
                                        <td class="text-center">
                                            <a class="btn btn-primary" role="button" style="margin: 2px;">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a class="btn btn-success" role="button" style="background: rgb(11,171,56);margin: 2px;">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a class="btn btn-danger" role="button" style="margin: 2px;">
                                                <i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Fer<br /></td>
                                        <td>Desarrollador</td>
                                        <td>Development</td>
                                        <td>3</td>
                                        <td class="text-center"><a class="btn btn-primary" role="button" style="margin: 2px;"><i class="far fa-eye"></i></a><a class="btn btn-success" role="button" style="background: rgb(11,171,56);margin: 2px;"><i class="fas fa-pencil-alt"></i></a><a class="btn btn-danger" role="button" style="margin: 2px;"><i class="fas fa-trash"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="card shadow">
                <div class="card-header py-3">
                    <p class="text-primary m-0 font-weight-bold">Lista de comentarios</p>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 text-nowrap">
                            <!-- <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                <label>Mostrar&nbsp;
                                    <select class="form-control form-control-sm custom-select custom-select-sm">
                                        <option value="10" selected="">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>&nbsp;</label>
                            </div> -->
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="text-md-right dataTables_filter" id="dataTable_filter"><label><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Buscar"></label></div>
                        </div> -->
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>

                                    <th class="text-left">Tema</th>
                                    <th class="text-center">comentario</th>
                                    <th class="text-center">fecha de creación</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>

                                    <td class="text-left">Umbría</td>
                                    <td>Bonito lugar</td>
                                    <td>2008/11/28</td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" role="button" style="margin: 2px;">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a class="btn btn-danger" role="button" style="margin: 2px;">
                                            <i class="fas fa-trash"></i></a>
                                    </td>

                                </tr>
                                <tr>

                                    <td class="text-left">Iglesia Machachi</td>
                                    <td>Quiero conocer</td>
                                    <td>2009/10/09<br></td>
                                    <td class="text-center">
                                        <a class="btn btn-primary" role="button" style="margin: 2px;">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a class="btn btn-danger" role="button" style="margin: 2px;">
                                            <i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            </tbody>
                            <!-- <tfoot>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td><strong>Position</strong></td>
                                            <td><strong>Office</strong></td>
                                            <td><strong>Age</strong></td>
                                            <td><strong>Start date</strong></td>
                                            <td><strong>Salary</strong></td>
                                        </tr>
                                    </tfoot> -->
                        </table>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                                Showing 1 to 10 of 27</p>
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>