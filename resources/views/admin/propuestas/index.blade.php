@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .section {
            margin-top: 267px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 180px !important;
            }
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center col-12 p-4">PROPUESTAS</h3>
                    <div class="col-md-4 offset-md-4 mb-4">
                        <br>
                        <a href=" {{ route('propuestas.create') }} " class="btn btn-light btn-block">
                            <i class="fa fa-plus"></i> Agregar propuesta</a>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success col-md-12">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                @if (count($lista) > 0)
                    @foreach ($lista as $item)
                        <div class="sidebar-area col-md-4">
                            <div class="sidebar-section about-author p-3"
                                style="margin-bottom: 10px;box-shadow: 0px 0px 20px rgba(0,0,0,.2);width: 100%;">
                                <div class="text-center">
                                    <i class="{!! $item->icono !!}" style=" zoom: 2"></i>
                                    <h5 class="text-primary" style="font-weight:bold;">
                                        {!! $item->titulo !!}
                                    </h5>
                                </div>

                                <div style="max-height: 250px; overflow: auto">
                                    <p class="text-justify">
                                        {!! $item->propuesta !!}
                                    </p>
                                </div>
                                <div class="my-2 text-center">
                                    <form action="{{ route('propuestas.destroy', $item->id) }}" method="POST">
                                        @method('delete')
                                        @csrf
                                        <a href="{{ route('propuestas.edit', $item->id) }}" class="btn btn-primary">
                                            editar
                                        </a>
                                        <input type="hidden" name="id" value=" {{ $item->id }} ">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </form>
                                </div>

                            </div><!-- sidebar-section about-author -->
                        </div><!-- about-author -->
                    @endforeach
                @else
                    <h4 class="text-center col-12"> ** No hay registros aun. **</h4>
                @endif
            </div>
        </div>
    </section>
@endsection
