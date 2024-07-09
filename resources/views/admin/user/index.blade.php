@extends('layouts.app')

@section('css')
    <style>
        @media screen and (max-width: 320px) {
            table {
                display: block;
                overflow-x: auto;
            }
        }

        .section {
            margin-top: 265px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 170px !important;
            }
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area">

        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 mb-4">
                    <h3 class="text-center p-4">ADMINISTRADORES</h3>
                    <br>
                    <a href=" {{ route('user.create') }} " class="btn btn-light btn-block">
                        <i class="fa fa-plus"></i> Agregar administrador</a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success col-md-12">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-md-12">
                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th class="no-sort">Nombre y Apellidos</th>
                                <th class="no-sort d-none d-md-block">Correo electrónico</th>
                                <th class="no-sort" width="30px;">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista as $item)
                                <tr>
                                    <td> {!! $item->nombre !!} {!! $item->apellidos !!} </td>
                                    <td> {!! $item->email !!}</td>
                                    <td width="30px;">
                                        <form action="{{ route('user.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            {{-- <input type="hidden" name="id" value=" {!! $item->id !!} "> --}}
                                            <button type="submit">
                                                <i class="fa fa-trash p-2 text-danger fa-lg "></i>
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

@section('js')
@endsection
