@extends('admin.c41.index')

@section('css')
    <style>
        .pagination .paginate_button a {
            color: #de3527 !important;
            background-color: #ffff !important;

        }

        .pagination .paginate_button.active a {
            color: #ffff !important;
            background-color: #de3527 !important;
            border-color: #de3527;
        }
    </style>
@endsection

@section('listas')
    <h3 class="text-center m-2">.:: Comunidades ::.</h3>
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th class="no-sort d-none d-md-block">#</th>
                <th class="no-sort">Barrio</th>
                <th class="no-sort d-none d-md-block">Subcentral</th>
                {{-- <th class="no-sort" width="20%;">Publicaciones</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($lista as $item)
                <tr>
                    <td class="d-none d-md-block"> {!! $item->id !!} </td>
                    <td> {!! $item->nombre !!} </td>
                    <td class="d-none d-md-block"> {!! $item->subcentral !!}</td>
                    {{-- <td>
                        <a href=" {{ route('articuloscom.index',$item->id) }} " class="btn btn-outline-success btn-sm">Ver publicaciones</a>
                    </td> --}}
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
