@extends('layouts.app')
@section('content')
    <section class="section blog-area" style="margin-top: 270px;">
        <div class="container">
            <div class="row">
                <form class="col-md-6 offset-md-3" action=" {{ route('user.store') }} " method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body ">
                        <h3 class="text-center">Agregar Administrador</h3>
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" name="nombre" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="" required>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Contraseña</label>
                            <input type="password" name="password" class="form-control" minlength="8" required
                                id="password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Repite Contraseña</label>
                            <input type="password" name="password_confirmation" class="form-control" minlength="8" required
                                id="confirm_password">

                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary">Guardar</button>
                            <a href=" {{ route('user.index') }} " class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        var password = document.getElementById("password"),
            confirm_password = document.getElementById("confirm_password");

        function validatePassword() {
            if (password.value != confirm_password.value) {
                confirm_password.setCustomValidity("No confirmaste la contraseña");
            } else {
                confirm_password.setCustomValidity('');
            }
        }

        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
    </script>
@endsection
