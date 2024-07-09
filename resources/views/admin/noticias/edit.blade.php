@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
@endsection

@section('content')
    <section class="section blog-area" style="margin-top: 270px;">
        <div class="container">
            <div class="row">
                <form class="col-md-12" action="{{ route('noticias.update', $noticia->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body ">
                        <h3 class="text-center">EDITAR NOTICIA</h3>
                        <input type="hidden" name="id" value="{!! $noticia->id !!}">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">¿A QUE CATEGORIA PERTENECE?</label>
                                <select class="form-control" name="categoria" required>
                                    @foreach ($categorias as $cat)
                                        @if ($noticia->categoria === $cat->nombre)
                                            <option value="{{ $cat->nombre }}" selected>{{ $cat->nombre }}</option>
                                        @else
                                            <option value="{{ $cat->nombre }}">{{ $cat->nombre }}</option>
                                        @endif
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">¿QUE TIPO DE NOTICIA ES?</label>
                                <select class="form-control" name="tipo_publicacion">
                                    @if ($noticia->tipo_publicacion === 'nacional')
                                        <option value="nacional" selected>NACIONAL</option>
                                        <option value="regional">REGIONAL</option>
                                    @else
                                        <option value="nacional">NACIONAL</option>
                                        <option value="regional" selected>REGIONAL</option>
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            @if ($noticia->tipo == 1)
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        VIDEO ACTUAL
                                        <div class="plyr__video-embed" id="player">
                                            <iframe width="100%" height="300px" src="{!! $noticia->archivo !!}"
                                                allowfullscreen allowtransparency allow="autoplay"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>CAMBIAR VIDEO</label>
                                        <input type="url" class="form-control" name="archivo"
                                            placeholder="Pega la nueva direccion del video" value="{{ $noticia->archivo }}">
                                        <br/>
                                        <label>INGRESA EL ID DEL NUEVO VIDEO</label>
                                        <input type="text" class="form-control" name="key_video" value="{{ $noticia->key_video }}"
                                            placeholder="Id del video">
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-6">
                                        IMAGEN ACTUAL
                                        <img src="{{ asset('website/public/uploads/noticia/' . $noticia->archivo) }}" alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <label>CAMBIAR IMAGEN</label>
                                        <input type="file" class="form-control" name="archivo" accept="image/*">
                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <label for="">TITULO</label>
                            <input type="text" name="titulo" id="" class="form-control"
                                value=" {!! $noticia->titulo !!} ">
                        </div>
                        <div class="form-group">
                            <label for="">CONTENIDO</label>
                            <textarea name="cuerpo" cols="30" rows="10" class="form-control" required minlength="200"> 
                             
                            {!! $noticia->cuerpo !!}

                        </textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary">Guardar cambios</button>
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
    <script src=" {{ asset('js/plyr.js') }} "></script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('cuerpo');
            const player = new Plyr('#player');
        });

        function getvalue(params) {
            console.log(params)
            if (params == 1) {
                $('#content').html(
                    ` <label>INGRESA LA URL DEL VIDEO</label> <input type="url" class="form-control" name="archivo" required> <br/> 
                      <label>INGRESA EL ID DEL VIDEO</label> <input type="text" class="form-control" name="key_video" >
                    `
                )
            } else {
                $('#content').html(
                    ' <label>ELIGE LA IMAGEN</label> <input type="file" class="form-control" name="archivo"  required> '
                )
            }
        }
    </script>
@endsection
