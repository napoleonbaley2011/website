@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/plyr.css') }}">
    <style>
        .card {
            padding: 0;
            max-height: 480px !important;
            box-shadow: 0px 0px 10px 5px rgb(0, 0, 0, .2);
            border-radius: 10px;
        }

        .section {
            margin-top: 265px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 170px !important;
            }
        }

        .overhoul a {
            padding: 0.2em 0.5em 0.2em 0.5em !important;
            background: #ff4c4c;
            color: #ff4c4c
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 mb-4">
                    <h3 class="text-center p-4">NOTICIAS</h3>
                    <br>
                    <a href=" {{ route('noticias.create') }} " class="btn btn-light btn-block">
                        <i class="fa fa-plus"></i> Agregar noticia</a>
                </div>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success col-md-12 p-4">
                        <strong>{{ $message }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="card-deck col-md-12">
                 <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th>TITULO</th>
                                <th>TITULO</th>
                                <th style="width:120px">FECHA</th>
                                <th>TIPO</th>
                                <th>CATEGORIA</th>
                                <th style="width:300px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lista as $item)
                                <tr>
                                    <td>
                                    @if ($item->tipo == 1)
                                        <div class="plyr__video-embed" id="player">
                                            <iframe src="{!! $item->archivo !!}" allowfullscreen allowtransparency
                                                allow="autoplay" width="200" height="200"></iframe>
                                        </div>
                                    @else
                                        <img src="{{ asset('website/public/uploads/noticia/' . $item->archivo) }}" class="card-img-top"
                                            alt="..." style="width:200px;height:200px;object-fit: cover">
                                    @endif
                                    </td>
                                    <td>
                                     {{ $item->titulo }} 
                                     </td>
                                    <td> {{ $item->fecha }} </td>
                                    <td> {{ $item->tipo_publicacion }} </td>
                                    <td> {{ $item->categoria }} </td>
                                    <td>
                                     <!--   <form action="{{ route('categorias.destroy', $item->id) }}" method="POST">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('categorias.edit', $item->id) }}" class="btn btn-primary">
                                                editar
                                            </a>
                                            <input type="hidden" name="id" value=" {{ $item->id }} ">
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>-->

                                         <form action="{{ route('noticias.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('noticias.show', $item->id) }}" class="btn btn-primary">
                                               <i class="fa fa-eye"></i>
                                            </a>
                                            <a href="{{ route('noticias.edit', $item->id) }}" class="btn btn-primary">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="{{ route('galeria_noticia.edit', $item->id) }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-image"></i>
                                            </a>
                                            <button type="submit" class="btn float-right">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                     <div style="width: 100%" class="text-center overhoul mb-2">
                            {{ $lista->links() }}
                        </div>
                  <!--  @if (count($lista) > 0)
                        @foreach ($lista as $item)
                            <div class="col-md-6 mb-4">
                                <div class="card">
                                    @if ($item->tipo == 1)
                                        <div class="plyr__video-embed" id="player">
                                            <iframe src="{!! $item->archivo !!}" allowfullscreen allowtransparency
                                                allow="autoplay"></iframe>
                                        </div>
                                    @else
                                        <img src="{{ asset('website/public/uploads/noticia/' . $item->archivo) }}" class="card-img-top"
                                            alt="..." style="max-height:250px;object-fit: cover">
                                    @endif
                                    <div class="card-body" style="height:100%">
                                        <div class="row text-success">
                                            <span class="col-6">CATEGORIA: {{ $item->categoria }} </span>
                                            <span class="col-6">TIPO: {{ $item->tipo_publicacion }}</span>
                                        </div>
                                        <h6 class="card-title p-2">{{ $item->titulo }} </h6>
                                        <small class="text-primary p-2">fecha: {{ $item->fecha }}</small>
                                    </div>
                                    <div class="card-footer text-center" style="background: #fff;">
                                        <form action="{{ route('noticias.destroy', $item->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <a href="{{ route('noticias.show', $item->id) }}" class="btn btn-secondary">
                                                ver
                                            </a>
                                            <a href="{{ route('noticias.edit', $item->id) }}" class="btn btn-primary">
                                                editar
                                            </a>
                                            <a href="{{ route('galeria_noticia.edit', $item->id) }}"
                                                class="btn btn-primary">
                                                <i class="fa fa-image"></i>
                                            </a>
                                            {{-- <input type="hidden" name="id" value=" {{ $item->id }} "> --}}
                                            <button type="submit" class="btn float-right">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div style="height:60px; width: 100%" class="text-center overhoul">
                            {{ $lista->links() }}
                        </div>
                    @else
                        <h4 class="text-center col-12"> ** No hay registros aun. **</h4>
                    @endif
                -->
                </div>

            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src=" {{ asset('js/plyr.js') }} "></script>
    <script>
        const players = Array.from(document.querySelectorAll('#player')).map(p => new Plyr(p));
    </script>
@endsection
