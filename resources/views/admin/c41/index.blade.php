@extends('layouts.app')

@section('css')
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

        

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 140px !important;
            }
        }

        .c41 a.btn.btn-active {
            color: #de3527;
            background-color: #ffffff !important;
            border-color: #de3527 !important;
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area"   style="margin-top: 267px !important">
        <div class="container" >
            <div class="row">
                <div class="col-md-12 text-center p-4 c41">
                    <a href="{{ route('barrios.index') }}"
                        class="btn {{ Request::path() == 'barrios' ? 'btn-active' : '' }} mr-2"
                        style="width: 150px;">Barrios</a>
                    <a href="{{ route('comunidades.index') }}"
                        class="btn ml-2 {{ Request::path() == 'comunidades' ? 'active' : '' }}"
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
