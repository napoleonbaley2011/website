@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <style>
        @media screen and (max-width: 320px) {
            table {
                display: block;
                overflow-x: auto;
            }
        }

        .dataTables_length {
            display: none !important;
            width: 0px !important;
        }

        .section {
            margin-top: 270px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 140px !important;
            }
        }

        .btn.btn-warning.active {
            color: #f26524 !important;
            background-color: #ffffff !important;
            border-color: #f26524 !important;
        }

        .page-link {
            color: #de3527;
        }

        .page-item.active .page-link {
            color: #fff;
            background-color: #de3527;
            border-color: #de3527;
        }
    </style>
@endsection


@section('content')
    <section class="section blog-area">
        <div class="container">
            <div class="row">
                <br>
                <h4 class="text-center col-12">CIRCUNSCRIPCION-41</h4>
                <em class="desc p-4">Una circunscripción electoral, distrito electoral o distrito legislativo es una
                    subdivisión territorial para elegir miembros a un cuerpo legislativo.
                    Generalmente, solo los votantes (constituyentes) que residen dentro del distrito tienen permitido votar
                    en una elección celebrada allí.<br> Nosotros como candidatos a la circunscripcion 41 represenatamos a
                    los siguiente barrios</em>
                <br>
                <div class="col-md-12 text-center">
                    <a href="{{ route('c41.barrios') }}"
                        class="btn btn-warning mr-2 {{ Request::path() == 'c41/barrios' ? 'active' : '' }}"
                        style="width: 170px;">Barrios</a>
                    <a href="{{ route('c41.comunidades') }}"
                        class="btn btn-warning ml-2 {{ Request::path() == 'c41/comunidades' ? 'active' : '' }}"
                        style="width: 200px;">Comunidades</a>
                </div>
                <br>
                <div class="col-md-12">
                    @yield('listas')
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
@endsection
