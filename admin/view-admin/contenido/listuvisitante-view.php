<div class="d-flex flex-column" id="content-wrapper">
    <div id="content">
        <div class="container-fluid">
            <h1 class="text-dark mb-1" style="margin-top: 30px;">Gestionar atractivos turísticos </h1>
        </div>
        <div class="container-fluid" style="margin-top: 20px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo  SERVERURL; ?>admin/usuarios">Administradores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Lista usuarios visitantes</li>
                </ol>
            </nav>


            <?php require_once './../Turismo/admin/controller-admin/usuario.controlador.php';
            $i = new UsuarioControlador();
            ?>


            <?php
            echo $i->CtrMostrarUsuariosVisitantes();

            ?>
            <!-- <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>

                                    <th class="text-left">Titulo</th>
                                    <th class="text-center">Vistas</th>
                                    <th class="text-center">Likes</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">fecha de creación</th>
                                    <th class="text-center">Acción</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <tr>

                                    <td class="text-left">Umbría</td>
                                    <td>33</td>
                                    <td>10</td>
                                    <td>Atractivo natural</td>
                                    <td>2008/11/28</td>
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
                        
                            </tbody>
                        </table> -->



        </div>

    </div>
</div>