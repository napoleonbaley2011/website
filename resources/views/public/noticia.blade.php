@extends('layouts.app')

@section('metas')

    <meta property="og:type" content="website" />
    <meta property="og:title" content="{!! $noticia->titulo !!}" />
    <meta property="og:description" content="{!! $noticia->resumen !!}" />
    <meta property="fb:app_id" content="853213614848126" />
    @if ($noticia->tipo == 1)
        <meta property="og:url" content="https://www.marielabaldivieso.com/actividad/{!! $noticia->id !!}/ver" />
        <meta property="og:video" content="{!! $noticia->archivo !!}">
        <!-- @if (explode('/embed/', $noticia->archivo)[0] === 'https://www.youtube.com')
    <meta property="og:image"         content="{!! 'https://i.ytimg.com/vi/' . explode('/embed/', $noticia->archivo)[1] . '/hqdefault.jpg' !!}" />
    @endif
        @if (explode('.be/', $noticia->archivo)[0] === 'https://youtu')
    <meta property="og:image"         content="{!! 'https://i.ytimg.com/vi/' . explode('.be/', $noticia->archivo)[1] . '/hqdefault.jpg' !!}" />
    @endif
        @if (explode('/watch?v=', $noticia->archivo)[0] === 'https://www.youtube.com')
    )
         <meta property="og:image"         content="{!! 'https://i.ytimg.com/vi/' .
             explode('https://www.youtube.com/watch?v=', $noticia->archivo)[1] .
             '/hqdefault.jpg' !!}" />
    @endif -->
        @if ($noticia->key_video)
            <meta property="og:image" content="{!! 'https://i.ytimg.com/vi/' . $noticia->key_video . '/hqdefault.jpg' !!}" />
        @endif
    @else
        <meta property="og:url" content="https://www.marielabaldivieso.com/actividad/{!! $noticia->id !!}/ver" />
        <meta property="og:image" content="{!! asset('website/public/uploads/noticia/' . $noticia->archivo) !!}" />
    @endif
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
    <style>
        .section {
            margin-top: 270px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 100px !important;
            }
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area" style="min-height:800px">
        <div class="container" style="padding-top:50px;background-color: #fff;
    margin-top: 20px;">
            <div class="row">
                <div class="col-md-8 offset-md-2 p-3">

                    <div class="single-post mt-4">
                        <div class="image-wrapper">
                            @if ($noticia->tipo == 1)
                                <div class="plyr__video-embed" id="player">
                                    <iframe width="100%" height="300px" src="{!! $noticia->archivo !!}" allowfullscreen
                                        allowtransparency allow="autoplay"></iframe>
                                </div>
                                @if (count($galeria) > 0)
                                    <div class="col-md-12 col-sm-12 my-4">
                                        <div class="row">

                                            @foreach ($galeria as $item)
                                                <div class="col-md-3 col-sm-12 text-center p-1 ">
                                                    <a href="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}"
                                                        class="image-wrapper" data-fancybox
                                                        data-caption="{{ $item->id }}">
                                                        <img src="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}"
                                                            class="img-thumbnail"
                                                            style="width: 200px; height:150px;object-fit: cover">
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endif
                            @else
                                <div class="image-wrapper">
                                    <img src=" {!! asset('website/public/uploads/noticia/' . $noticia->archivo) !!}" alt="Blog Image">
                                </div>
                                @if (count($galeria) > 0)
                                    <div class="col-md-12 col-sm-12 my-4">
                                        <div class="row">

                                            @foreach ($galeria as $item)
                                                <div class="col-md-3 col-sm-12 text-center p-1 ">
                                                    <a href="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}"
                                                        class="image-wrapper" data-fancybox
                                                        data-caption="{{ $item->id }}">
                                                        <img src="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}"
                                                            class="img-thumbnail"
                                                            style="width: 200px; height:150px;object-fit: cover">
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endif
                            @endif

                        </div>
                        <h6 class="date mt-2">
                            <em>Tarija, {!! $noticia->fecha !!}</em>
                        </h6>
                        <h3 class="title text-justify">
                            <b class="light-color">{!! $noticia->titulo !!}</b>
                        </h3>
                        <div class="text-justify">{!! $noticia->cuerpo !!}</div>
                        <div class="col-12 " style="height: 50px; margin-top: 20px">
                            <div id="fb-root"></div>
                            <script async defer crossorigin="anonymous"
                                src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v17.0&appId=853213614848126&autoLogAppEvents=1"
                                nonce="Bid8EAzk"></script>
                            @if ($noticia->tipo == 1)
                                <div class="fb-share-button"
                                    data-href="https://www.marielabaldivieso.com/actividad/{!! $noticia->id !!}/ver"
                                    data-layout="box_count" data-size="">
                                </div>
                            @else
                                <div class="fb-share-button"
                                    data-href="https://www.marielabaldivieso.com/actividad/{!! $noticia->id !!}/ver"
                                    data-layout="box_count" data-size="">
                                </div>
                            @endif

                            <!-- Your share button code -->
                            <a class="btn float-right p-2" href=" {{ url()->previous() }} ">
                                <b>Volver</b>
                            </a>
                        </div>
                        <div class="col-12">
                            <div class="fb-comments"
                                data-href="https://www.marielabaldivieso.com/actividad/{!! $noticia->id !!}/ver"
                                data-width="100%" data-numposts="5">
                            </div>
                        </div>

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
