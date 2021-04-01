<?php require_once './../Turismo/admin/controller-admin/usuario.controlador.php';
$i = new UsuarioControlador();
$adm = $i->CtrMostrarUsuarioAdm();
?>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <div class="container-fluid">
            <h1 class="text-dark mb-4" style="margin-top: 15px;">Usuarios</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Administradores</li>
                    <li class="breadcrumb-item"><a href="<?php echo  SERVERURL; ?>admin/listuvisitante">Lista de usuarios visitantes</a></li>
                </ol>
            </nav>
            <div class="row mb-3">
                <!-- <div class="col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body text-center shadow" style="height: 231px;"><img class="rounded-circle mb-3 mt-4" src="<?php echo SERVERURL ?>assets/files/account.png" width="100" height="100" style="margin: 0px;padding: 0px;" loading="lazy" /></div>
                    </div>
                </div> -->
                <div class="col-lg-4">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <p class="text-primary m-0 font-weight-bold">Información de usuario actual</p>

                                </div>
                                <div class="card-body">
                                    <p><strong>Nombre: </strong><?php echo $adm['usu_nombre'] ?></p>
                                    <p><strong>Apellido: </strong><?php echo $adm['usu_apellido'] ?></p>
                                    <p><strong>Correo: </strong><?php echo $adm['usu_correo'] ?></p>
                                    <p><strong>Fecha de registro: </strong><?php echo $adm['usu_fecha_registro'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function fillform(id) {
                        $('#ActualizarUsu' + id).on('click', function(e) {
                            e = e || window.event;
                            var data = [];
                            var target = e.srcElement || e.target;
                            while (target && target.nodeName !== "TR") {
                                target = target.parentNode;
                            }
                            if (target) {
                                var cells = target.getElementsByTagName("td");
                                for (var i = 0; i < cells.length; i++) {
                                    data.push(cells[i].innerHTML);
                                }
                            }
                            // alert(data);
                            $('#idUsuario').val(data[0]);
                            $('#nombre').val(data[1]);
                            $('#apellido').val(data[2]);
                            $('#email').val(data[3]);
                            $('#usuario').val(data[4]);

                            var elem = document.getElementById("submit");
                            if (elem.value == "Guardar") elem.value = "Actualizar";
                            else elem.value = "Actualizar";
                            var b = document.getElementById("formUser");
                            b.setAttribute('data-form', 'update')
                        });
                    }
                </script>
                <div class="col-lg-8">
                    <!-- <div class="row mb-3 d-none">
                        <div class="col">
                            <div class="card text-white bg-primary shadow">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="m-0">Peformance</p>
                                            <p class="m-0"><strong>65.2%</strong></p>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                    </div>
                                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i> 5% since last month</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card text-white bg-success shadow">
                                <div class="card-body">
                                    <div class="row mb-2">
                                        <div class="col">
                                            <p class="m-0">Peformance</p>
                                            <p class="m-0"><strong>65.2%</strong></p>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                    </div>
                                    <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i> 5% since last month</p>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col d-block">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 font-weight-bold">Crear usuario</p>
                                </div>
                                <div class="card-body">
                                    <form  id="formUser" class="FormularioAjax" method="POST" data-form="save" enctype="multipart/form-data" autocomplete="off" action="<?php echo SERVERURL ?>admin/ajax-admin/usuarios.ajax.php">

                                        <input type="hidden" name="idUsuario" id="idUsuario" value="">
                                        <div class="form-row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <div class="form-group"><label for="nombre"><strong>Nombre</strong></label><input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombreAdm" /></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="apellido"><strong>Apellido</strong><br /></label><input type="test" class="form-control" id="apellido" placeholder="Apellido" name="apellidoAdm" /></div>
                                            </div>

                                        </div>
                                        <div class="form-row" style="margin-bottom: 10px;">
                                            <div class="col-lg-12">
                                                <div class="form-group"><label for="email"><strong>Correo</strong></label><input type="text" class="form-control" id="email" placeholder="Email" name="correoAdm" /></div>
                                            </div>
                                        </div>
                                        <div class="form-row" style="margin-bottom: 10px;">
                                            <div class="col">
                                                <div class="form-group"><label for="username"><strong>Usuario</strong></label><input type="text" class="form-control" id="usuario" placeholder="Usuario" name="usuarioAdm" /></div>
                                            </div>
                                            <div class="col">
                                                <div class="form-group"><label for="email"><strong>Contraseña</strong><br /></label><input type="password" class="form-control" id="password" placeholder="*********" name="claveAdm" /></div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!-- <button class="btn btn-danger " type="submit">Editar</button> -->
                                            <!-- <button id="submit" class="btn btn-success"  type="submit">Guardar</button> -->
                                            <input id="submit" class="btn btn-success" type="submit" value="Guardar"></input>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            echo $i->CtrMostrarUsuariosAdm();
            ?>
            <!--<div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 font-weight-bold">Usuaros</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label>Show <select class="form-control form-control-sm custom-select custom-select-sm">
                                                <option value="10" selected>10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select></label></div>
                                </div>
                               
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar1.jpeg" />Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar2.jpeg" />Angelica Ramos</td>
                                            <td>Chief Executive Officer(CEO)</td>
                                            <td>London</td>
                                            <td>47</td>
                                            <td>2009/10/09<br /></td>
                                            <td>$1,200,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar3.jpeg" />Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>66</td>
                                            <td>2009/01/12<br /></td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar4.jpeg" />Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>41</td>
                                            <td>2012/10/13<br /></td>
                                            <td>$132,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar5.jpeg" />Brenden Wagner</td>
                                            <td>Software Engineer</td>
                                            <td>San Francisco</td>
                                            <td>28</td>
                                            <td>2011/06/07<br /></td>
                                            <td>$206,850</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar1.jpeg" />Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td>New York</td>
                                            <td>61</td>
                                            <td>2012/12/02<br /></td>
                                            <td>$372,000</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar2.jpeg" />Bruno Nash<br /></td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>38</td>
                                            <td>2011/05/03<br /></td>
                                            <td>$163,500</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar3.jpeg" />Caesar Vance</td>
                                            <td>Pre-Sales Support</td>
                                            <td>New York</td>
                                            <td>21</td>
                                            <td>2011/12/12<br /></td>
                                            <td>$106,450</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar4.jpeg" />Cara Stevens</td>
                                            <td>Sales Assistant</td>
                                            <td>New York</td>
                                            <td>46</td>
                                            <td>2011/12/06<br /></td>
                                            <td>$145,600</td>
                                        </tr>
                                        <tr>
                                            <td><img class="rounded-circle mr-2" width="30" height="30" src="avatars/avatar5.jpeg" />Cedric Kelly</td>
                                            <td>Senior JavaScript Developer</td>
                                            <td>Edinburgh</td>
                                            <td>22</td>
                                            <td>2012/03/29<br /></td>
                                            <td>$433,060</td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</div>