<aside class="sidebar bg-primary container-fluid p-0">
    <div class="sidebar-layer"></div>
    <div class="logo-sidebar text-center">
        <img src="{{ asset('img/imagotipo.svg') }}" id="sidebar-imagotipo" alt="imagotipo">
    </div>

    <hr class="text-white fw-bold border border-white border-2">

    <div class="navbar-links">

        <div class="row justify-content-center">
            <a class="sidebar-link catalogos-link py-2" data-bs-toggle="collapse" href="#catalogos" role="button" aria-expanded="true" aria-controls="catalogos">

                <div class="w-100 h-100 d-flex justify-content-between">

                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bookmark-star" viewBox="0 0 16 16">
                            <path d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                        </svg>
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
                    <a href="{{ route('empresas.index') }}" class="sidebar-link py-2">
                        <div class="col-11">
                            <div class="row w-100 align-items-center mx-auto justify-content-center">
                                <div class="col-4 p-0 text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                        <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                    </svg>
                                </div>
                                <div class="col-8 ps-0">
                                    <span>Empresas</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="{{ route('asesores_industriales.index') }}" class="sidebar-link py-2">
                        <div class="col-11">
                            <div class="row w-100 align-items-center mx-auto justify-content-center">
                                <div class="col-4 p-0 text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                        <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                    </svg>
                                </div>

                                <div class="col-8 ps-0">
                                    <span>Asesor Industrial</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="{{ route('asesores_academicos.index') }}" class="sidebar-link py-2">
                        <div class="col-11">
                            <div class="row w-100 align-items-center mx-auto justify-content-center">
                                <div class="col-4 p-0 text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                        <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                    </svg>
                                </div>
                                <div class="col-8 ps-0">
                                    <span>Asesores Academicos</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="{{ route('solicitudes.index') }}" class="sidebar-link py-2">
                        <div class="col-11">
                            <div class="row w-100 align-items-center mx-auto justify-content-center">
                                <div class="col-4 p-0 text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                        <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                    </svg>
                                </div>
                                <div class="col-8 ps-0">
                                    <span>Registro de Solicitud</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="">
                    <a href="{{ route('estatus.index') }}" class="sidebar-link py-2">
                        <div class="col-11">
                            <div class="row w-100 align-items-center mx-auto justify-content-center">
                                <div class="col-4 p-0 text-end">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bookmarks-fill" viewBox="0 0 16 16">
                                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4z" />
                                        <path d="M4.268 1A2 2 0 0 1 6 0h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L13 13.768V2a1 1 0 0 0-1-1H4.268z" />
                                    </svg>
                                </div>
                                <div class="col-8 ps-0">
                                    <span>Estancias Estatus</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>
        </div>
        
        <div class="row justify-content-center">
            <a class="sidebar-link reportes-link py-2" data-bs-toggle="collapse" href="#reportes" role="button" aria-expanded="true" aria-controls="reportes">

                <div class="w-100 h-100 d-flex justify-content-between">

                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-files" viewBox="0 0 16 16">
                            <path d="M13 0H6a2 2 0 0 0-2 2 2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7a2 2 0 0 0 2-2 2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 13V4a2 2 0 0 0-2-2H5a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1zM3 4a1 1 0 0 1 1-1h7a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V4z"/>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                        <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                        <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z"/>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-person-video2" viewBox="0 0 16 16">
                                        <path d="M10 9.05a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                        <path d="M2 1a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2H2ZM1 3a1 1 0 0 1 1-1h2v2H1V3Zm4 10V2h9a1 1 0 0 1 1 1v9c0 .285-.12.543-.31.725C14.15 11.494 12.822 10 10 10c-3.037 0-4.345 1.73-4.798 3H5Zm-4-2h3v2H2a1 1 0 0 1-1-1v-1Zm3-1H1V8h3v2Zm0-3H1V5h3v2Z"/>
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
    </div>
</aside>
