@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href=" {{ asset('assets/fileinput/css/fileinput.css') }} " />
    <style>
        .form-control {
            height: calc(2.52rem + 2px) !important;
        }

        .file-actions {
            display: none !important;
        }

        .file-footer-caption {
            margin-bottom: 0px !important;
        }

        .file-upload-indicator {
            display: none;
        }

        .section {
            margin-top: 270px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 140px !important;
            }
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area" style="margin-top: 270px;">

        <div class="container">
            <div class="row">
                <div class="col-12 mt-2">
                    <a href="{{ route('noticias.index') }}" class="btn btn-primary">
                        << Volver</a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success col-md-12 m-2">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <form class="col-md-12 col-sm-12 col-xs-12" action=" {{ route('galeria_noticia.store') }} " method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body ">
                        <h5 class="text-center">AGREGAR IMAGENES A GALERIA DE</h5>
                        <h4 class="text-justify text-secondary">"{{ $noticia->titulo }}"</h4>
                        <div class="form-group">
                            <input type="hidden" name="id_noticia" value="{{ $noticia->id }}">
                            <label for="">SELECCIONE LAS IMAGEN</label>
                            <input type="file" name="imagen[]" multiple class="form-control" id="imagen"
                                accept="image/*">
                        </div>
                    </div>
                </form>
                <div class="col-md-12 col-sm-12 my-4">
                    <div class="row">
                        @if (count($lista) > 0)
                            @foreach ($lista as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12 text-center ">
                                    {{-- <a href="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}" data-fancybox="images">
                                        <img src=" {{ asset('website/public/uploads/galerian/' . $item->imagen) }} "
                                            class="img-thumbnail" />
                                    </a> --}}
                                    <a href="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}" class="image-wrapper"
                                        data-fancybox data-caption="{{ $item->id }}" style="width: 100%;">
                                        <img src="{{ asset('website/public/uploads/galerian/' . $item->imagen) }}" class="img-thumbnail"
                                            style="height: 300px;object-fit: cover">
                                    </a>
                                    <br>
                                    <form action=" {{ route('galeria_noticia.destroy', $item->id) }} " method="post"
                                        class="d-inline-block">
                                        @method('delete')
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button class="text-danger" type="submit">
                                            <i class="fa fa-times"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        @else
                            <h4 class="text-center col-12"> ** No hay imagenes en galeria aún. **</h4>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
@section('js')
    <script src="{{ asset('assets/fileinput/js/fileinput.js') }}"></script>
    <script src="{{ asset('assets/fileinput/js/locales/es.js') }}"></script>
    <script src="{{ asset('assets/fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
    <script>
        $("#imagen").fileinput({
            language: 'es',
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg", ],
            minImageWidth: 50,
            minImageHeight: 50
        });
    </script>
@endsection
