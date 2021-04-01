

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/dogs/image3.jpeg&quot;);"></div>
                            </div> -->
                            <div class="col-auto flex-fill">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Iniciar Sesión</h4>
                                    </div>
                                    <form action="" class="user" method="POST" autocomplete="off">
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="text" id="UserName" aria-describedby="emailHelp" placeholder="Usuario" name="admUser">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="password" id="UserPass" placeholder="Contraseña" name="admPass">
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Remember Me</label></div>
                                            </div>
                                        </div> -->
                                        <button class="btn btn-primary btn-block text-white btn-user" type="submit">Ingresar</button>
                                      
                                    </form>
                                    <br>
                                    <!-- <div class="text-center"><a class="small" href="forgot-password.html">¿Olvidó su clave?</a></div> -->
                                    <!-- <div class="text-center"><a class="small" href="register.html">Create an Account!</a></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_POST['admUser']) && isset($_POST['admPass'])) {
        require_once './../Turismo/admin/controller-admin/login.controlador.php';

        $ins_login = new loginControlador();
        $ins_login->iniciar_sesion_administrador_controlador();
    } ?>