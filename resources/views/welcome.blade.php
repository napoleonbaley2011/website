@inject('carbon', 'Carbon\Carbon')
@extends('layouts.app')
@section('css')
    <style>
        .ad-modal {
            display: none;
            /* Oculto inicialmente */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
            /* Fondo oscuro */
        }

        .ad-modal-content {
            position: relative;
            margin: 10% auto;
            padding: 20px;
            width: 80%;
            max-width: 500px;
            background-color: white;
            border-radius: 10px;
            text-align: center;
        }

        .ad-close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .ad-close:hover,
        .ad-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        @media screen and (min-width: 0px) and (max-width: 400px) {
            .navWrap {
                display: block;
            }

            .navWrap2 {
                display: none;
            }
        }

        @media screen and (min-width: 400px) {
            .navWrap {
                display: none;
            }

            .navWrap2 {
                display: block;
            }
        }
    </style>
@endsection
@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.getElementById("adModal");
            var closeBtn = document.getElementsByClassName("ad-close")[0];

            // Mostrar el modal al cargar la página
            modal.style.display = "block";

            // Cerrar el modal al hacer clic en la "X"
            closeBtn.onclick = function() {
                modal.style.display = "none";
            }

            // Cerrar el modal si se hace clic fuera de la ventana modal
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        });
    </script>
@endsection
@section('content')
    <div id="adModal" class="ad-modal">
        <div class="ad-modal-content">
            <span class="ad-close">&times;</span>
            <img src="{{ asset('assets/images/logos/logan.png') }}" alt="Publicidad" style="width: 50%; max-height: 100vh; ">
        </div>
    </div>
    <div class="main-slider ">
        <div id="slider">
            <!--  <div class="ls-slide "
                            data-ls="bgsize:contain; bgposition:50% 20%; duration:4000; transition2d:104; kenburnsscale:0.00;">
                            <img src="{!! asset('assets/images/slider/slider-1.webp') !!}" class="ls-bg" alt=""  />
                        </div>
                        <div class="ls-slide"
                            data-ls="bgsize:cover; bgposition:50% 20%; duration:4000; transition2d:104; kenburnsscale:0.00;">
                            <img src="{!! asset('assets/images/slider/slider-2.webp') !!}" class="ls-bg" alt="" />
                           <div class="slider-contents ls-l" style="top:50%; left:20%;padding:5px"
                                data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
                                <img src="{!! asset('assets/images/logos/logo-nuevo2.png') !!}" style="width: 200px; border-radius:10px; border:10px solid white">
                            </div>
                        </div>
                -->
            @foreach ($portadas as $p)
                <div class="ls-slide"
                    data-ls="bgsize:cover; bgposition:50% 20%; duration:4000; transition2d:104; kenburnsscale:0.00;">
                    <img src="{!! asset('uploads/portada/' . $p->imagen) !!}" class="ls-bg" alt="" />
                    <div class="slider-contents ls-l" style="top:50%; left:20%;padding:5px"
                        data-ls="offsetyin:100%; offsetxout:-50%; durationin:800; delayin:100; durationout:400; parallaxlevel:0;">
                        <img src="{!! asset('assets/images/logos/logo-nuevo2.png') !!}"
                            style="width: 200px; border-radius:10px; border:10px solid white">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <section class="section blog-area">
        <div class="container p-0">
            <div class="about-author pt-3 mt-1">
                <div class="col-12 text-center text-uppercase">
                    Número de visitas <h3 class="text-danger" style="font-family: 'Calibri'; font-weight:bold">
                        {{ $visitas->id }}</h3>
                </div>
                <h6 class="quoto text-justify">
                    <em>
                        <i class="ion-quote text-warning"></i> Mariela Baldivieso es la Fundadora de Little Hand una
                        fundación de ayuda social para niños y familias de escasos recursos de Tarija, activista por los
                        derechos humanos, fue partícipe del programa PROTAGONISTAS de Idea Internacional, ganadora de
                        varios premios y reconocimientos entre ellos del Gobierno Municipal, Concejo Municipal, Gobierno
                        Autónomo Departamental de la ciudad de Tarija,
                        del Club de Leones, Premio TOYP de la JCI por su labor social en favor de los niños y mujeres en
                        condiciones de vulnerabilidad. <br>

                        Actual Diputada Nacional Uninominal por la Circunscripción 41 por el departamento de Tarija, de La
                        Alianza Comunidad Ciudadana gestión 2020-2025.
                    </em>
                </h6>
            </div>
        </div>
        <div class="container" style="padding: 2em">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-posts">
                        <div class="row">
                            <div class="col-12 d-flex" style="align-items: center">
                                @if ($isSearch)
                                    <h3 class="">
                                        COINCIDENCIAS ENCONTRADAS
                                    </h3>
                                    <a href="{{ route('public.index') }}" class=""
                                        style="margin: 10px; padding: 5px; color: #f74e4e; border: 1px solid #f74e4e;">
                                        <i class="fa fa-times"></i>
                                        Quitar filtro
                                    </a>
                                @else
                                    <h3>ÚLTIMAS PUBLICACIONES</h3>
                                @endif

                            </div>
                            @if (count($videos) > 0)
                                @foreach ($noticias as $noticia)
                                    <div class="col-lg-12 col-md-12">
                                        <div class="single-post">
                                            <a href="{{ asset('uploads/noticia/' . $noticia->archivo) }}"
                                                class="image-wrapper" data-fancybox data-caption="{{ $noticia->titulo }}"
                                                style="width: 100%;">
                                                <img src="{{ asset('uploads/noticia/' . $noticia->archivo) }}"
                                                    alt="{{ $noticia->titulo }}" style="height: 350px;object-fit: cover">
                                            </a>
                                            <div class="icons" style="margin: 10px 0 10px">
                                                <div id="fb-root"></div>
                                                <script async defer crossorigin="anonymous"
                                                    src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v17.0&appId=853213614848126&autoLogAppEvents=1"
                                                    nonce="G0qUkzbx"></script>
                                                <div class="left-area">
                                                    <span class="category"><b>{{ $noticia->categoria }}</b></span>
                                                </div>
                                                <ul class="right-area social-icons">
                                                    <li>
                                                        <a href="{{ route('public.noticias.ver', $noticia->id) }}">
                                                            <i class="fa fa-comment"></i>
                                                            <span class="fb-comments-count"
                                                                data-href="https://www.marielabaldivieso.com/noticias/{!! $noticia->id !!}/ver"></span>
                                                            comentarios
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <h6 class="date">
                                                <em>
                                                    Publicado:
                                                    {{ $carbon::parse($noticia->fecha)->toFormattedDateString() }}
                                                </em>
                                            </h6>
                                            <h4 class="title">
                                                <b class="light-color"> {{ $noticia->titulo }}</b>
                                            </h4>
                                            <p>
                                                {!! $noticia->resumen !!}
                                            </p>
                                            <a class="btn read-more-btn"
                                                href="{{ route('public.noticias.ver', $noticia->id) }}"><b>LEER
                                                    MÁS</b></a>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5 class="text-center col-12 p-2">Sin resultados que mostrar</h5>
                            @endif
                        </div>
                        <div class="text-center">
                            <a class="btn load-more-btn" href="{{ route('public.noticias', 'nacional') }}">VER MÁS
                                PUBLICACIONES</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="sidebar-section src-area col-12 d-none d-sm-block">
                        <form action="{{ route('public.search') }}" method="post">
                            @csrf
                            <input class="src-input" type="text" placeholder="Buscar publicación" name="search"
                                value="{{ old('search') }}" required>
                            <button class="src-btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                        </form>
                    </div>
                    <div class="sidebar-area">
                        <div class="sidebar-section category-area">
                            <h4 class="title"><b class="light-color">Categorías</b></h4>
                            <div class="">
                                @foreach ($categorias as $cat)
                                    <form action="{{ route('public.search') }}" method="post" class=""
                                        style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="categoria" value="{{ $cat->nombre }}">
                                        <button class="btn category-btn mt-1" type="submit"
                                            style=" max-width:100%;  white-space: initial;">
                                            <h6 class="name">{{ $cat->nombre }}</h6>
                                        </button>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                        <div class="sidebar-section latest-post-area">
                            <h4 class="title"><b class="light-color">Últimos videos</b></h4>
                            @if (count($videos) > 0)
                                @foreach ($videos as $video)
                                    <div class="latest-post" href="#">
                                        <div class="">
                                            <div class="plyr__video-embed" id="player">
                                                <iframe width="100%" src="{!! $video->archivo !!}" allowfullscreen
                                                    allowtransparency>
                                                </iframe>
                                            </div>
                                        </div>
                                        <div class="">
                                            <div class="category">{{ $video->categoria }}</div>
                                            <h5>
                                                <a href="{{ route('public.noticias.ver', $video->id) }}"
                                                    class="read-more-link">
                                                    <b class="light-color">{{ $video->titulo }}</b>
                                                </a>
                                            </h5>
                                            <h6 class="date">
                                                <em>Publicado:
                                                    {{ $carbon::parse($video->fecha)->toFormattedDateString() }}
                                                </em>
                                            </h6>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h5>Sin resultados que mostrar</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
