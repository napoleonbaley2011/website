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
                        <div class="col-6 text-uppercase flex">
                            <h3 style="margin-top: .5em">Proyectos de Ley</h3>
                        </div>
                        <div class="card-container">
                            @foreach ($proyects as $proyect)
                                <div class="card">
                                    <img src="{{ asset('assets/images/perfil.webp') }}" alt="{{ $proyect->title }}"
                                        style="width: 350px;">
                                    <div class="card-content">
                                        <h2>{{ $proyect->title }}</h2>
                                        <p>{{ $proyect->description }}</p>
                                        <a href="{{ Storage::url($proyect->enlace_pdf) }}" download>Descargar PDF</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
