@extends('layouts.app')

@section('css')
    <style>
        select {
            font-family: 'FontAwesome'
        }
    </style>
@endsection
@section('content')
    <section class="section blog-area" style="margin-top: 270px;">
        <div class="container">
            <div class="row">
                <form class="col-md-12" action=" {{ route('categorias.update', $p->id) }} " method="POST"
                    enctype="multipart/form-data">
                    @method('patch')
                    @csrf
                    <div class="card-body ">
                        <h3 class="text-center">EDITAR CATEGORIA</h3>
                        <input type="hidden" name="id" value="{!! $p->id !!}">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">NOMBRE DE LA CATEGORIA</label>
                                    <input type="text" name="nombre" class="form-control" required
                                        value="{!! $p->nombre !!}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary">Guardar</button>
                            <a href=" {{ route('categorias.index') }} " class="btn btn-secondary">Volver</a>
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
        CKEDITOR.replace('propuesta', {
            toolbarGroups: [{
                "name": "basicstyles",
                "groups": ["basicstyles"]
            }],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar'
        });
    </script>
@endsection
