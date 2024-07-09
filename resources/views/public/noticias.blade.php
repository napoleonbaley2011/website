@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')

@section('css')
    <style>
        .section {
            margin-top: 160px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 100px !important;
            }

            header {
                position: fixed !important;
            }

        }

        img {
            object-fit: cover;
        }

        .overhoul a {
            padding: .2em .7em !important;
            background: #de3527 !important;
            color: white;
        }

        .overhoul .relative span {
            padding: .2em .7em !important;
        }

        .resumen {
            margin-bottom: 20px
        }

        .btn-news:hover {
            color: #de3527
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area">
        <div class="container" style="padding-top:20px;margin-top: 100px;">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-area d-none d-md-block p-2" id="perfil">
                        <div class="sidebar-section center-text">
                            <div class="author-image">
                                <img src="{{ asset('assets/images/foto.webp') }}" alt="Autohr Image">
                            </div>
                            <h4 class="author-name">
                                <b class="light-color">Mariela Baldivieso</b>
                            </h4>
                            <p class="text-justify">Mariela Baldivieso es la Fundadora de Little Hand,
                                activista en defensa de los derechos humanos en favor de los niños y mujeres en condiciones
                                de vulnerabilidad.
                                Candidata a Diputada Uninominal C41, por Comunidad Ciudadana.</p>

                            <div class="signature-image">
                                <img src="{{ asset('assets/images/firma.webp') }}" style="width: 200px">
                            </div>
                            <a class="read-more-link" href="/perfil">
                                <b>Saber más</b>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="blog-posts">
                        <div class="row" style="margin-bottom: 1.5em">
                            <div class="col-6 text-uppercase flex">
                                <h3 style="margin-top: .5em">
                                    @if($tipo == 'nacional')
                                    NACIONAL
                                    @elseif( $tipo == 'regional')
                                    REGIONAL
                                    @else
                                    CIRCUNSCRIPCION 41
                                    @endif
                                </h3>
                                @if (str_contains($tipo, 'COINCIDENCIAS'))
                                    <a href="{{ route('public.noticias', 'nacional') }}" class=""
                                        style="margin: 10px; padding: 5px; color: #f74e4e; border: 1px solid #f74e4e;">
                                        <i class="fa fa-times"></i>
                                        Quitar filtro
                                    </a>
                                @endif
                            </div>
                            <div class="col-6 src-area ">
                                <form action="{{ route('public.noticias.search') }}" method="post">
                                    @csrf
                                    <input class="src-input" type="text" placeholder="Buscar" name="search"
                                        value="{{ old('search') }}" required>
                                    <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                        </div>
                        @foreach ($lista as $noticia)
                            <div class="single-post p-3" style="border-radius: 0.3em;box-shadow: 0px 0px 10px #a1a1a18c">
                             
                                @if ($noticia->tipo == 1)
                                    <div class="plyr__video-embed" id="player">
                                        <iframe src="{!! $noticia->archivo !!}" allowfullscreen allowtransparency
                                            allow="autoplay"></iframe>
                                    </div>
                                @else
                                    @section('metas')
                                        <meta property="og:type" content="website" />
                                        <meta property="og:title" content="{!! $noticia->titulo !!}" />
                                        <meta property="og:description" content="{!! $noticia->resumen !!}" />
                                        <meta property="fb:app_id" content="853213614848126" />
                                        @if ($noticia->tipo == 1)
                                                <meta property="og:url"           content="https://www.marielabaldivieso.com/actividad/{!!$noticia->id!!}/ver" />
                                                <meta property="og:video"         content="{!!$noticia->archivo!!}">
                                                @if(explode('/embed/', $noticia->archivo)[0] === 'https://www.youtube.com')
                                                <meta property="og:image"         content="{!! 'https://i.ytimg.com/vi/'. explode('/embed/', $noticia->archivo)[1] .'/hqdefault.jpg' !!}" />
                                                @endif
                                                @if(explode('.be/', $noticia->archivo)[0] === 'https://youtu')
                                                <meta property="og:image"         content="{!! 'https://i.ytimg.com/vi/'. explode('.be/', $noticia->archivo)[1] .'/hqdefault.jpg' !!}" />
                                                @endif
                                                
                                        @else
                                            <meta property="og:url"           content="https://www.marielabaldivieso.com/actividad/{!!$noticia->id!!}/ver" />
                                            <meta property="og:image"         content="{!! asset('website/public/uploads/noticia/'.$noticia->archivo) !!}" />
                                        @endif
                                    @endsection
                                    <a href="{{ asset('website/public/uploads/noticia/' . $noticia->archivo) }}" class="image-wrapper"
                                        data-fancybox data-caption="{{ $noticia->titulo }}" style="width: 100%;">
                                        <img src="{{ asset('website/public/uploads/noticia/' . $noticia->archivo) }}"
                                            alt="{{ $noticia->titulo }}" style="height: 400px;object-fit: cover">
                                    </a>
                                @endif
                                <div class="icons">
                                    <div id="fb-root"></div>
                                    <script async defer crossorigin="anonymous"
                                        src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v17.0&appId=853213614848126&autoLogAppEvents=1"
                                        nonce="G0qUkzbx"></script>
                                    <div class="left-area">
                                        <span class="btn caegory-btn"><b>{{ $noticia->categoria }}</b></span>
                                    </div>
                                    <ul class="right-area social-icons">
                                        <li>

                                            <a href="{{ route('public.noticias.ver', $noticia->id) }}">
                                                <i class="fa fa-comment"></i><span class="fb-comments-count"
                                                    data-href="https://www.marielabaldivieso.com/actividad/{!! $noticia->id !!}/ver"></span>
                                                comentarios
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <h6 class="date mt-2">
                                    <em>
                                        Publicado:
                                        {{ $carbon::parse($noticia->fecha)->toFormattedDateString() }}
                                    </em>
                                </h6>
                                <h4 class="title">
                                    <b class="light-color"> {{ $noticia->titulo }}</b>
                                </h4>
                                <div class="resumen" id="resumen">
                                    {!! $noticia->resumen !!}
                                </div>
                                <div class="mt-2" style="height: 40px">
                                    <div id="fb-root"></div>
                                    <script>
                                        (function(d, s, id) {
                                            var js, fjs = d.getElementsByTagName(s)[0];
                                            if (d.getElementById(id)) return;
                                            js = d.createElement(s);
                                            js.id = id;
                                            js.src = "https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.0";
                                            fjs.parentNode.insertBefore(js, fjs);
                                        }(document, 'script', 'facebook-jssdk'));
                                    </script>

                                    <!-- Your share button code -->
                                    <div class="fb-share-button"
                                        data-href="https://www.marielabaldivieso.com/actividad/{!! $noticia->id !!}/ver"
                                        data-layout="box_count">
                                    </div>
                                    <a class="btn btn-news float-right p-2" href="{{ route('public.noticias.ver', $noticia->id) }}">
                                        <b>LEER MÁS</b>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        <div style="margin:20px" class="text-center overhoul">
                            {{ $lista->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        
    </script>
@endsection
