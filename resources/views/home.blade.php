@extends('layouts.app')

@section('content')
    <section class="section blog-area">
        <div class="container" style="margin-top: 300px; height:500px">
            <div class="row text-center flex items-center">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success col-md-12">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if ($message = Session::get('error'))
                    <div class="alert alert-danger col-md-12">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <h4 class="col-12 mt-4">Bienvenid@</h4>
                <h2 class="col-12"> {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }} </h2>
                <br>
                <br>
                <div class="col-md-6 offset-md-3 mt-4">
                    <a class="btn btn-outline-warning" href="{{ route('user.edit', Auth::id()) }}">Editar perfil</a>

                    <form action=" {{ route('logout') }} " method="POST" class="d-inline-block">
                        @csrf
                        <button class="btn btn-warning" type="submit">SALIR</button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
