<nav class="navbar navbar-expand-lg navbar-dark p-1 fixed-top" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('index') }}">
            <img src="{{ asset('img/logo.svg') }}" alt="logo" width="30" height="24" class="d-inline-block align-text-top">
            <span class="d-none text-white">Universidad Politectnica Metropolitana de Puebla</span>
            <span class="text-white">UPMP</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-center">
                <li class="nav-item dropdown">
                    @auth
                    <a class="nav-link dropdown-toggle p-0 px-2 h-100 w-100" href="#" id="userData" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{asset(Auth::user()->foto)}}" alt="user-image" class="rounded-pill" width="35px">
                        {{ Auth::user()->nombre. ' ' . Auth::user()->apellido_paterno . ' ' . Auth::user()->apellido_materno }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="userData">
                        <li>
                            <a href="{{ route('perfil') }}" class="btn d-block btn-light w-100">
                                Perfil
                            </a>
                        </li>
                        <li>
                            <button type="button" class="btn d-block btn-light w-100" data-bs-toggle="modal"
                                data-bs-target="#editPassword">
                                Cambiar Contraseña
                            </button>
                        </li>
                        <li>
                            <button type="button" class="btn d-block btn-light w-100" data-bs-toggle="modal"
                                data-bs-target="#editPhoto">
                                Cambiar Foto
                            </button>
                        <li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                @method('POST')
                                <button type="submit" class="dropdown-item user-option">Cerrar Sesion</button>
                            </form>
                        </li>
                    </ul>
                    @endauth
                </li>
                <li class="nav-item d-lg-none">
                    <a class="sidebar-link catalogos-link py-2 mx-auto" data-bs-toggle="collapse" href="#catalogos" role="button" aria-expanded="true" aria-controls="catalogos">
                        <div class="w-100 h-100 d-flex justify-content-between">
                            <span>
                                Catálogos
                            </span>
                            <div id="inactive-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                    <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                </svg>
                            </div>
                            <div class="d-none" id="active-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                </svg>
                            </div>
                        </div>
                    </a>
                    <div class="collapse collapse-catalogos" id="catalogos">
                        <div class="">
                            <a href="{{ route('prueba.index') }}" class="sidebar-link py-2">
                                <div class="col-11">
                                    <div class="row w-100 align-items-center mx-auto justify-content-center">
                                        <div class="col-4 p-0 text-end">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                                <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                                <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                            </svg>
                                        </div>
                                        <div class="col-8 ps-0">
                                            <span>Prueba</span>
                                        </div>
                                    </div>
                                </div>
                            </a>

                        </div>

                        <div class="">
                                <a href="{{ route('estudiantes.index') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                                    <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                                    <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Estudiantes</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            
                            

                    </div>
                    <div class="row justify-content-center">
                        <a class="sidebar-link reportes-link py-2" data-bs-toggle="collapse" href="#reportes" role="button" aria-expanded="true" aria-controls="reportes">

                            <div class="w-100 h-100 d-flex justify-content-between">

                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                                        <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
                                        <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                                    </svg>
                                    Reportes
                                </span>
                                <div id="inactive-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-right-fill" viewBox="0 0 16 16">
                                        <path d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                    </svg>
                                </div>
                                <div class="d-none" id="active-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="collapse collapse-reportes" id="reportes">
                            <div class="">
                                <a href="{{ route('consulta') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Solicitudes pendientes</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="collapse collapse-reportes" id="reportes">
                            <div class="">
                                <a href="{{ route('consulta_completadas') }}" class="sidebar-link py-2">
                                    <div class="col-11">
                                        <div class="row w-100 align-items-center mx-auto justify-content-center">
                                            <div class="col-4 p-0 text-end">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                                                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z" />
                                                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z" />
                                                </svg>
                                            </div>
                                            <div class="col-8 ps-0">
                                                <span>Solicitudes completadas</span>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
@include('layouts.partials.change-image')
@include('layouts.partials.change-password')
