@extends('public.c41')

@section('listas')
    <h3 class="text-center text-warning m-2">.:: Comunidades ::.</h3>
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th class="no-sort">Comunidades</th>
                <th class="no-sort d-none d-md-block">Subcentral</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($lista as $item)
                <tr>
                    <td> {!! $item->nombre !!} </td>
                    <td class="d-none d-md-block"> {!! $item->subcentral !!}</td>

                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
