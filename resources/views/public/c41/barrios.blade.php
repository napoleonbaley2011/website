@extends('public.c41')

@section('listas')
    <h3 class="text-center text-warning m-2">.:: Barrios ::.</h3>
    <table class="table table-bordered" id="example">
        <thead>
            <tr>
                <th class="no-sort">Barrios</th>
                <th class="no-sort d-none d-md-block">Distrito municipal</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($lista as $item)
                <tr>
                    <td> {{ $item->nombre }} </td>
                    <td class="d-none d-md-block"> {{ $item->distrito }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
