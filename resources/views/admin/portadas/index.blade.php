@extends('layouts.app')

@section('css')
    <style>
        .section {
            margin-top: 267px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 165px !important;
            }
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area" style="margin-top: 270px;">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 offset-md-3 mb-4">
                        <h3 class="text-center p-4">PORTADAS</h3>
                        <br>
                        <a href=" {{ route('portadas.create') }} " class="btn btn-delete btn-block">
                            <i class="fa fa-plus"></i> Agregar portada
                        </a>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success col-md-12 p-4">
                            <strong>{{ $message }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                </div>
                @if (count($lista) > 0)
                    @foreach ($lista as $item)
                        <div class="col-md-3 col-sm-12 text-center mb-4">
                            <a href="{{ asset('website/public/uploads/portada/' . $item->imagen) }}" data-fancybox="images"
                                data-caption="Backpackers following a dirt trail">
                                <img src=" {{ asset('website/public/uploads/portada/' . $item->imagen) }} "
                                    style="height: 250px; object-fit: cover" />
                            </a>
                            <br>
                            <form action=" {{ route('portadas.destroy', $item->id) }} " method="POST">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <button class="btn btn-delete mt-1" type="submit">
                                    <i class="fa fa-trash"></i> Eliminar imagen
                                </button>
                            </form>
                        </div>
                    @endforeach
                @else
                    <h4 class="text-center col-12"> ** No hay registros aun. **</h4>
                @endif

            </div>
        </div>
    </section>
@endsection
@section('js')
@endsection
