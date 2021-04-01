<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
    <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-laugh-wink"></i></div>
            <div class="sidebar-brand-text mx-3"><span>Mejia360</span></div>
        </a>
        <hr class="sidebar-divider my-0" />
        <ul class="navbar-nav text-light" id="accordionSidebar">
            <li class="nav-item"><a class="nav-link" href="<?php echo SERVERURL ?>admin/home"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item"></li>
            <li class="nav-item menu-open"></li>
            <li class="nav-item"><a class="nav-link active" href="<?php echo SERVERURL ?>admin/crearentrada/"><i class="fa fa-plus"></i><span>Crear atractivo</span></a></li>
            <li class="nav-item"><a class="nav-link active" href="<?php echo SERVERURL ?>admin/creargastronomia"><i class="fa fa-plus"></i><span>Crear gastronomía</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo SERVERURL ?>admin/gestionargaleria"><i class="fa fa-image"></i><span>Gestionar imágenes</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo SERVERURL ?>admin/gestionarcomentarios"><i class="fas fa-table"></i><span>Gestionar comentarios</span></a></li>
            <!-- <li class="nav-item"><a class="nav-link" href="login.html"><i class="far fa-user-circle"></i><span>Login</span></a></li> -->
            <!-- <li class="nav-item"><a class="nav-link" href="register.html"><i class="fas fa-user-circle"></i><span>Register</span></a></li> -->
            <li class="nav-item"><a class="nav-link" href="<?php echo SERVERURL ?>admin/usuarios"><i class="fas fa-user"></i><span>Usuarios</span></a></li>
            <li class="nav-item"><a class="nav-link" onclick="cerrar_sesion_administrador()"><i class="fa fa-sign-out"></i><span>Salir</span></a></li>
            <li class="nav-item"></li>
        </ul>
        <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
    </div>
</nav>
