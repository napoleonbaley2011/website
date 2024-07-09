@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
@endsection

@section('content')
<section class="section blog-area" style="margin-top: 200px;"> 
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">

                <div class="single-post mt-4">
                    <div class="image-wrapper">
                        <div class="image-wrapper">
                            <img src="{!! asset('blog/public/uploads/articulo_comunidad/'.$articulo->imagen) !!}" alt="Blog Image">
                        </div>
                    </div>
                    
                    <h6 class="date mt-2">
                        <em>Fecha: {!! $articulo->fecha !!}</em>
                    </h6>
                    <h3 class="title">
                        <a href="#">
                            <b class="light-color">{!! $articulo->titulo !!}</b>
                        </a>
                    </h3>
                    <p>{!! $articulo->cuerpo !!}</p>
                    <a class="btn btn-secondary mt-4 float-right" href=" {{ route('articuloscom.index',['id' => $articulo->id_comunidad]) }} ">
                        <b>Volver</b>
                    </a>
                </div>
            </div>
            <div class="row col-md-12">
                <h4 class="text-center col-12">Lista de imagenes</h4>
                @if (count($lista)>0)
                @foreach ($lista as $item)
                <div class="col-lg-4 col-md-6 col-sm-12 text-center m-2  p-0">
                    <a href="{{ asset('blog/public/uploads/galeriac/'.$item->imagen) }}" data-fancybox="images" data-caption="Backpackers following a dirt trail">
                        <img src=" {{ asset('blog/public/uploads/galeriac/'.$item->imagen) }} " class="img-thumbnail"/>
                    </a>
                </div>
                @endforeach
            @else
                <h4 class="text-center col-12"> ** No hay imagenes en galeria aún. **</h4>
            @endif
            </div>
        </div>
    </div>
</section>
<script>
</script>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script>
    $('[data-fancybox="gallery"]').fancybox({
	// Options will go here
        });
</script>
@endsection
