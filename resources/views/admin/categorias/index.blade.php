@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .section {
            margin-top: 265px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 165px !important;
            }
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area">

        <div class="container">
            <div class="row">
                <div class="col-md-12 p-2">
                    <h3 class="text-center col-12 p-4">CATEGORIAS</h3>
                    <div class="col-md-4 offset-md-4 mb-4">
                        <br>
                        <a href=" {{ route('categorias.create') }} " class="btn btn-light btn-block">
                            <i class="fa fa-plus"></i> Agregar categoria</a>
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
                <div class="sidebar-area col-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th style="width: 200px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista as $item)
                                <tr>
                                    <td> {{ $item->nombre }} </td>
                                    <td>
                                        <form action="{{ route('categorias.destroy', $item->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('categorias.edit', $item->id) }}" class="btn btn-primary">
                                                editar
                                            </a>
                                            <input type="hidden" name="id" value=" {{ $item->id }} ">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
