@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href=" {{ asset('assets/fileinput/css/fileinput.css') }} " />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
<style>
     .form-control {
        height: calc(2.52rem + 2px) !important;
    }
    .file-actions {
        display: none !important;
    }
    .file-footer-caption{
        margin-bottom: 0px !important;
    }
    .file-upload-indicator {
        display: none;
    }
    .section {
        margin-top: 200px !important;
    }
    @media only screen and (max-width: 479px) {
        .section {
        margin-top: 140px !important;
        }
    }
</style>
@endsection

@section('content')
<section class="section blog-area" style="margin-top: 200px;">
    
    <div class="container">
        <div class="col-md-12 col-sm-12 text-center">
            <a href=" {{ route('articulos.index', $post->id_barrio ) }} " class="btn btn-link">
                <i class="fa fa-angle-double-left fa-4x"></i>
                <p>Volver a las publicaciones</p>
            </a>
        </div>
        <div class="row">
            @if ($message = Session::get('success'))
            <div class="alert alert-success col-md-12 mb-4">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
            </div>
            @endif
            <form class="col-md-6 col-sm-12 col-xs-12" action=" {{ route('galeria.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body ">
                    <h5 class="text-center">AGREGAR IMAGENES A GALERIA DE</h5>
                    <h4 class="text-center text-primary">"{!!$post->titulo!!}"</h4>
                    <div class="form-group">
                        <input type="hidden" name="id_articulo" value="{!!$post->id!!}">
                        <label for="">SELECCIONE LAS IMAGEN</label>
                        <input type="file" name="imagen" class="form-control" id="imagen" accept="image/*" > 
                    </div>
                </div>
            </form>
            <div class="col-md-6 col-sm-12 mt-4">
                <div class="row">
                    <h4 class="text-center col-12">Lista de imagenes</h4>
                    @if (count($lista)>0)
                    @foreach ($lista as $item)
                    <div class="col-lg-4 col-md-6 col-sm-12 text-center m-2  p-0">
                        <a href="{{ asset('blog/public/uploads/galeria/'.$item->imagen) }}" data-fancybox="images" data-caption="Backpackers following a dirt trail">
                            <img src=" {{ asset('blog/public/uploads/galeria/'.$item->imagen) }} " class="img-thumbnail"/>
                        </a>
                        <br>
                        <form action=" {{ route('galeria.destroy') }} " method="POST" class="d-inline-block">
                            @csrf
                            <input type="hidden" name="id_articulo" value="{!!$post->id!!}">
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
@section('scripts')
<script src="{{ asset('assets/fileinput/js/fileinput.js') }}"></script>
<script src="{{ asset('assets/fileinput/js/locales/es.js') }}"></script>
<script src="{{ asset('assets/fileinput/themes/fas/theme.js')}}" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
    $('[data-fancybox="gallery"]').fancybox({});
    $("#imagen").fileinput({
        language:'es'
    });
</script>
@endsection
