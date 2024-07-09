@extends('layouts.app')


@section('content')
<section class="section blog-area" style="margin-top: 200px;"> 
    <div class="container">
        <div class="row">
            <form class="col-md-12" action=" {{ route('articulos.update') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body ">
                    <input type="hidden" name="id_barrio" value="{!! $articulo->id_barrio !!}">
                    <input type="hidden" name="id" value="{!! $articulo->id !!}">
                    <h3 class="text-center">Editar publicacion:</h3>
                    <h2 class="text-center text-primary"> {!! $barrio->nombre !!} <small class="text-primary" style="font-size: .5em;">( distrito: {!! $barrio->distrito !!} )</small></h2>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            IMAGEN ACTUAL
                            <img src="{{ asset('blog/public/uploads/articulo/'.$articulo->imagen) }}" alt="">
                        </div>
                        <div class="col-md-6">
                            <label>CAMBIAR IMAGEN</label> 
                            <input type="file" class="form-control" name="imagen" accept="image/*">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">TITULO</label>
                        <input type="text" name="titulo" class="form-control" value="{!! $articulo->titulo !!}">
                    </div>
                    <div class="form-group">
                        <label for="">CONTENIDO</label>
                        <textarea name="cuerpo" cols="30" rows="10" class="form-control" minlength="200">
                           {!! $articulo->cuerpo !!}
                        </textarea>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary">Guardar</button>
                        <a href=" {{route('articulos.index',$articulo->id_barrio)}} " class="btn btn-secondary">Volver</a>
                    </div>
                </div>
            </form>
                
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
   CKEDITOR.replace( 'cuerpo',{
        toolbarGroups: [{
          "name": "basicstyles",
          "groups": ["basicstyles"]
        }
      ],
      // Remove the redundant buttons from toolbar groups defined above.
      removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
    } );
</script>
@endsection