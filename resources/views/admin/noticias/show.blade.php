@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
@endsection

@section('content')
    <section class="section blog-area" style="margin-top: 270px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">

                    <div class="single-post mt-4">
                        <div class="image-wrapper">
                            @if ($noticia->tipo == 1)
                                <div class="plyr__video-embed" id="player">
                                    <iframe width="100%" height="300px" src="{!! $noticia->archivo !!}" allowfullscreen
                                        allowtransparency allow="autoplay"></iframe>
                                </div>
                            @else
                                <div class="image-wrapper">
                                    <img src="{{ asset('website/public/uploads/noticia/' . $noticia->archivo) }}" alt="Blog Image">
                                </div>
                            @endif

                        </div>
                        <h6 class="date mt-2">
                            <em>Fecha: {!! $noticia->fecha !!}</em>
                        </h6>
                        <h3 class="title">
                            <a href="#">
                                <b class="light-color">{!! $noticia->titulo !!}</b>
                            </a>
                        </h3>
                        <p>{!! $noticia->cuerpo !!}</p>
                        <a class="btn btn-secondary mt-4 float-right" href=" {{ URL::previous() }} ">
                            <b>Volver</b>
                        </a>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 my-4">
                    <div class="row">
                        @if (count($galeria) > 0)
                            @foreach ($galeria as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12 text-center ">
                                    <a href="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}" class="image-wrapper"
                                        data-fancybox data-caption="{{ $item->id }}" style="width: 100%;">
                                        <img src="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}" class="img-thumbnail"
                                            style="height: 300px;object-fit: cover">
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <h4 class="text-center col-12"> ** No hay imagenes en galeria aún. **</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script></script>
@endsection

@section('js')
    <script src=" {{ asset('js/plyr.js') }} "></script>
    <script>
        const player = new Plyr('#player');
    </script>
@endsection
