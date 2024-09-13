<div class="modal fade" id="editPhoto" tabindex="-1" aria-labelledby="editPhotoLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header myModal-header">
                <h1 class="myModal-header-font" id="editPhotoLabel">Cambiar Foto</h1>
                <button type="button" class="btn-close nav-link" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body myModal-body">
                <form action="{{ route('updatefoto', Auth::user()->idadmin) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <div class="col-12 col-lg-11 my-1">
                            <!-- Start Confirmar_password-->
                            <h6>Foto:</h6>
                            <div class="form-floating my-0">
                                <input type='file' name="foto" id="foto">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm d-block w-50 text-white btn-primario mx-auto">
                        Cambiar Foto
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>