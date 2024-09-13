<div class="modal fade" id="editPassword" tabindex="-1"
    aria-labelledby="editPasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header myModal-header">
                <h1 class="myModal-header-font" id="editPasswordLabel">Cambiar contraseña</h1>
                <button type="button" class="btn-close nav-link" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body myModal-body">
                <form action="{{ route('updatepassword', Auth::user()->idadmin) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="col-12 col-lg-11 my-1">
                            <h6>Ingresa tu nueva contraseña:</h6>
                            <div class="form-floating my-0">
                                <input id="password" type="password" name="password" placeholder="Contraseña"
                                    data-index="1" autocomplete="off" @class([
                                        'form-control' => !$errors->first('password'),
                                        'form-control is-invalid' => $errors->first('password'),
                                    ])>

                                <!-- Errors Field -->
                                @if ($errors->first('password'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('password') }}</i>
                                    </div>
                                @endif
                                <!-- Errors Field End -->
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="col-12 col-lg-11 my-1">
                            <!-- Start Confirmar_password-->
                            <h6>Repite tu nueva contraseña:</h6>
                            <div class="form-floating my-0">
                                <input id="password_confirmation" type="password" name="password_confirmation"
                                    placeholder="Contraseña" data-index="6" autocomplete="off"
                                    @class([
                                        'form-control' => !$errors->first('password'),
                                        'form-control is-invalid' => $errors->first('password'),
                                    ])>
                                @if ($errors->first('password'))
                                    <div class="invalid-feedback">
                                        <i>{{ $errors->first('password') }}</i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div><br>
                    <button type="submit" class="btn btn-sm d-block w-50 text-white btn-primario mx-auto">
                        Cambiar contraseña
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>