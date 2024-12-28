@extends('main.plantilla')

@section('title', 'Login')

@section('content')

   <!-- Page Wrapper -->
   <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <!--<i class="fas fa-laugh-wink"></i>-->
                <i class="bi bi-book-fill"></i>
            </div>
            <div class="sidebar-brand-text mx-3">El Arbol de Fuego</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="index.html">
                <!--<i class="fas fa-fw fa-tachometer-alt"></i>-->
                <i class="bi bi-book"></i>
                <span>Libreria Arbol de Fuego</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Componentes
        </div>

        <!-- Nav Item - Usuarios -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Usuarios</span></a>
        </li>

        <!-- Nav Item - Catalogo -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('catalogo.inicio')}}">
                <i class="fas fa-fw fa-table"></i>
                <span>Catalogo</span></a>
        </li>

        <!-- Nav Item - Lanzamientos -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-table"></i>
                <span>Lanzamientos</span></a>
        </li>

        <!-- Nav Item - Lanzamientos -->
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-table"></i>
                <span>Configuracion</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Search -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                            aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Kevin Sanchez</span>
                            <img class="img-profile rounded-circle"
                                src="https://placehold.co/100">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Perfil
                            </a>
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Configuracion
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Salir
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Content Row -->
                <div class="container">
                    <div class="row">
                        <div class="container">

                            <div class="card o-hidden border-0 shadow-lg my-5">
                                <div class="card-body p-0">
                                    <!-- Nested Row within Card Body -->
                                    <div class="row">
                                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                                        <div class="col-lg-7">
                                            <div class="p-5">
                                                <div class="text-center">
                                                    <h1 class="h4 text-gray-900 mb-4">Crear Usuario</h1>
                                                </div>
                                                <!-- FORM -->
                                                @if ( session('mensaje') )
                                                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                                                @endif
                                                <form class="user" method="post" action="{{ route('create.users') }}">
                                                    @csrf

                                                    @error('name_user')
                                                        <div class="alert alert-danger">
                                                            El nombre es obligatorio
                                                        </div>
                                                    @enderror

                                                    @error('select_cargo')
                                                        <div class="alert alert-danger">
                                                            El cargo es obligatorio
                                                        </div>
                                                    @enderror

                                                    @error('select_rol')
                                                        <div class="alert alert-danger">
                                                            El Rol es obligatorio
                                                        </div>
                                                    @enderror

                                                    @error('select_sucursal')
                                                        <div class="alert alert-danger">
                                                            Sucursal es obligatorio
                                                        </div>
                                                    @enderror

                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="text" class="form-control form-control-user" id="name_user"
                                                                placeholder="Nombre" name="name_user">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control form-control-user" id="lastname_user"
                                                                placeholder="Apellido" name="lastname_user">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <input type="text" class="form-control form-control-user" id="username"
                                                            placeholder="Nombre de usuario" name="username">
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <input type="password" class="form-control form-control-user"
                                                                id="userpassword" placeholder="Contraseña" name="userpassword">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="password" class="form-control form-control-user"
                                                                id="userpassword_repeat" placeholder="Confirmar contraseña" name="userpassword_repeat">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                                            <select class="form-select" aria-label="Default select example" id="select_cargo" name="select_cargo">
                                                                <option selected>Elija su cargo</option>
                                                                <option value="1">Jefe</option>
                                                                <option value="2">Administrador</option>
                                                                <option value="3">Dependiente de tienda</option>
                                                                <option value="4">Gerente</option>
                                                              </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="form-select" aria-label="Default select example" id="select_rol" name="select_rol">
                                                                <option selected>Elija su rol</option>
                                                                <option value="1">Jefe</option>
                                                                <option value="2">Administrador</option>
                                                                <option value="3">Dependiente de tienda</option>
                                                              </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <select class="form-select" aria-label="Default select example" id="select_sucursal" name="select_sucursal">
                                                            <option selected>Elija Sucursal</option>
                                                            <option value="1">Sucursal Central</option>
                                                            <option value="2">Sucursal Guazapa</option>
                                                            <option value="3">Todos</option>
                                                          </select>
                                                    </div>
                                                    <button class="btn btn-primary btn-user btn-block" type="submit">
                                                        Registrate
                                                    </button>
                                                    <hr>
                                                </form>
                                                <!--END FORM -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                 </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>El Libro &copy; de Fuego 2024</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@endsection
