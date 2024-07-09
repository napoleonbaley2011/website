@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <form class="col-md-12" action=" {{ route('propuestas.store') }} " method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body ">
                        <h3 class="text-center">AGREGAR PROPUESTA</h3>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">ICONO</label>
                                <select name="icono" class="form-control text-center" required>
                                    <option value="fa fa-group">
                                        &#xf0c0;
                                    </option>
                                    <option value="fa fa-home">
                                        &#xf015;
                                    </option>
                                    <option value="fa fa-hospital">
                                        &#xf0f8;
                                    </option>
                                    <option value="fa fa-hand-peace-o">
                                        &#xf25b;
                                    </option>
                                    <option value="fa fa-thumbs-o-up">
                                        &#xf164;
                                    </option>
                                    <option value="fa fa-heart-o">
                                        &#xf004;
                                    </option>
                                    <option value="fa fa-cog">
                                        &#xf013;
                                    </option>
                                    <option value="fa fa-list">
                                        &#xf03a;
                                    </option>
                                    <option value="fa fa-save">
                                        &#xf0c7;
                                    </option>
                                    <option value="fa fa-bicycle">
                                        &#xf206;
                                    </option>
                                    <option value="fa fa-american-sign-language-interpreting">
                                        &#xf2a3;
                                    </option>
                                    <option value="fa fa-balance-scale">
                                        &#xf24e;
                                    </option>
                                    <option value="fa fa-book">
                                        &#xf02d;
                                    </option>
                                    <option value="fa fa-calendar-alt">
                                        &#xf073;
                                    </option>
                                    <option value="fa fa-child">
                                        &#xf1ae;
                                    </option>
                                    <option value="fa fa-clock-o">
                                        &#xf017;
                                    </option>
                                    <option value="fa fa-comments-o">
                                        &#xf086;
                                    </option>
                                    <option value="fa fa-female">
                                        &#xf182;
                                    </option>
                                    <option value="fa fa-gavel">
                                        &#xf0e3;
                                    </option>
                                    <option value="fa fa-paw">
                                        &#xf1b0;
                                    </option>
                                    <option value="fa fa-recycle">
                                        &#xf1b8;
                                    </option>
                                </select>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="">TITULO DE LA PROPUESTA</label>
                                    <input type="text" name="titulo" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">DETALLES DE LA PROPUESTA</label>
                            <textarea name="propuesta" cols="30" rows="5" class="form-control" minlength="20"></textarea>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary">Guardar</button>
                            <a href=" {{ route('propuestas.index') }} " class="btn btn-secondary">Volver</a>
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
