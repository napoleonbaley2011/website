@extends('layouts.app')

@section('content')
    <section class="section blog-area" style="margin-top: 270px;">
        <div class="container">
            <div class="row p-2">
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="text-center">Editar datos</h5>
                        <div class="card-body">
                            <form action=" {{ route('user.update', Auth::id()) }} " method="POST">
                                @method('patch')
                                @csrf
                                <input type="hidden" name="id" value="{{ Auth::id() }}">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <br>
                                    <strong> {{ Auth::user()->email }}</strong>
                                </div>
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" name="nombre" class="form-control"
                                        value="{{ Auth::user()->nombre }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Apellidos</label>
                                    <input type="text" name="apellidos" class="form-control"
                                        value="{{ Auth::user()->apellidos }}" required>
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-outline-primary" type="submit">Editar datos</button>
                                    <a class="btn btn-outline-secondary" href="{{ route('home') }}">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="text-center">Cambiar solo contraseña</h5>
                        <div class="card-body">
                            <form action=" {{ route('user.password') }} " method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="">Escribe tu contraseña actual</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="">Ahora tu nueva contraseña</label>
                                    <input type="password" name="passwordn" class="form-control" minlength="8" required
                                        id="password">
                                </div>
                                <div class="form-group">
                                    <label for="">Repite tu nueva contraseña</label>
                                    <input type="password" class="form-control" minlength="8" required
                                        id="confirm_password">
                                </div>
                                <div class="text-center">
                                    <button class="btn btn-outline-primary" type="submit">Cambiar contraseña</button>
                                    <a class="btn btn-outline-secondary" href="{{ route('home') }}">Cancelar</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


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
