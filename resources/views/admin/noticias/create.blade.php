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
                <form class="col-md-12" action=" {{ route('noticias.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body ">
                        <h3 class="text-center">Agregar noticia</h3>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">¿A QUE CATEGORIA PERTENECE?</label>
                                <select class="form-control" name="categoria" required>
                                    @foreach ($categorias as $cat)
                                        <option value="{{ $cat->nombre }}">{{ $cat->nombre }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">¿QUE TIPO DE NOTICIA ES?</label>
                                <select class="form-control" name="tipo_publicacion">
                                    <option value="nacional" selected>NACIONAL</option>
                                    <option value="regional">REGIONAL</option>
                                    <option value="c41">CIRCUNSCRIPCION 41</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">¿QUE TIPO DE ARCHIVO DESEA MOSTRAR?</label>
                            <select id="tipo" class="form-control" onchange="getvalue(this.value)">
                                <option value="1">Video</option>
                                <option value="2">Imagen</option>
                            </select>
                        </div>
                        <div class="form-group" id="content"></div>
                        <div class="form-group">
                            <label for="">TITULO</label>
                            <input type="text" name="titulo" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">CONTENIDO</label>
                            <textarea name="cuerpo" cols="30" rows="10" class="form-control" minlength="200"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary">Guardar</button>
                            <a href=" {{ URL::previous() }} " class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script src="{{ asset('assets/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/js/es.js') }}"></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('cuerpo');
            getvalue(1);
        });

        function getvalue(params) {
            console.log(params)
            if (params == 1) {
                $('#content').html(
                    ` <label>INGRESA LA URL DEL VIDEO</label> <input type="url" class="form-control" name="archivo" required> <br/>
                      <label>INGRESA EL ID DEL VIDEO</label> <input type="text" class="form-control" name="key_video" > `
                )
            } else {
                $('#content').html(
                    ' <label>ELIGE LA IMAGEN</label> <input id="imagen" type="file" class="form-control" name="archivo"  required accept="image/*"> '
                )
            }
        }
        $("#imagen").fileinput({
            language: 'es'
        });
    </script>
@endsection
