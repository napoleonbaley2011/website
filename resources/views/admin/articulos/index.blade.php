@extends('layouts.app')

@section('styles')
<style>
    .card {
    padding:0; 
    max-height:480px !important; 
    box-shadow:0px 10px 10px 5px rgb(0,0,0,.2);
    border-radius: 10px;
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
        <div class="row"> 

            <div class="col-md-6 col-sm-12 text-center">
                <a href=" {{ route('barrios.index') }} " class="btn btn-link">
                    <i class="fa fa-angle-double-left fa-4x"></i>
                    <p>Volver a los barrios</p>
                </a>
            </div>
            <div class="col-md-6 col-sm-12 mt-4">
                <h6 class="text-center">PUBLICACIONES DEL BARRIO :</h6>
                <h2 class="text-center"> {!! $barrio->nombre !!} <small class="text-primary" style="font-size: .5em;">( distrito: {!! $barrio->distrito !!} )</small></h2>
            </div>
            <div class="col-12">
                <hr>
            </div>
            
            <div class="col-md-4 offset-md-4 mb-4">
                <br>
                <a href=" {{ route('articulos.create',$barrio->id) }} " class="btn btn-light btn-block" style="border:1px solid grey;">
                    <i class="fa fa-plus"></i> Agregar publicacion</a>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success col-md-12">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
            @endif
            <div class="card-deck col-md-12">
            @if (count($lista)>0)
                @foreach ($lista as $item)
                <div class="col-md-4 mb-4">
                <div class="card" >
                    <img src=" {{ asset('blog/public/uploads/articulo/'.$item->imagen) }} " class="card-img-top" alt="..." style="max-height:200px;">
                    <div class="card-body" style="height:120px;">
                        <h6 class="card-title p-2">{{ $item->titulo }} </h6>
                        <small class="text-primary pl-2">fecha: {{ $item->fecha }}</small>
                    </div>
                    <div class="card-footer text-center" style="background: #fff;">
                        <form action="{{ route('articulos.destroy') }}" method="POST">
                            <a href="{{ route('galeria.index',$item->id) }}" class="btn btn-success">
                                <i class="fa fa-image"></i>
                            </a>
                            <a href="{{ route('articulos.show',$item->id) }}" class="btn btn-secondary">
                            ver
                            </a>
            
                            <a href="{{ route('articulos.edit',$item->id) }}" class="btn btn-primary">
                            editar
                            </a>
                            
                            @csrf
                                <input type="hidden" name="id" value="{{ $item->id}} ">
                                <input type="hidden" name="id_barrio" value="{{ $item->id_barrio}} ">
                                <button type="submit">
                                    <i class="fa fa-trash p-2 text-danger fa-lg "></i>
                                </button>
                            </form>
                    </div>
                </div>
                </div>
                @endforeach
            @else
                <h4 class="text-center col-12"> ** No hay registros aun. **</h4>
            @endif
               
            </div>

        </div>
    </div>
</section>
@endsection

@section('scripts')
@endsection