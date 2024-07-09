@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href=" {{ asset('assets/css/fileinput.min.css') }} " />
    <style>
        .input-group-btn.input-group-append .btn.btn-secondary {
            color: #000000 !important;
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area" style="margin-top: 270px;">

        <div class="container">
            <div class="row">
                <form class="col-md-12" action=" {{ route('portadas.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body ">
                        <h3 class="text-center">AGREGAR PORTADA</h3>
                        <div class="form-group">
                            <label for="">SELECCIONE LA IMAGEN</label>
                            <input type="file" name="imagen" class="form-control" id="imagen" accept="image/*">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('assets/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/es.js') }}"></script>
    <script>
        $("#imagen").fileinput({
            language: 'es'
        });
    </script>
@endsection
