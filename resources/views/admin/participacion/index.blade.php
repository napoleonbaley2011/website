@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<style>
    @media screen and (max-width: 320px) {
     table {
       display: block;
       overflow-x: auto;
     }
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
            <h4 class="text-center col-12">PARTICIPACION CIUDADANA</h4>
            <br>
            <div class="col-md-12">
                <table class="table table-bordered" id="example">
                    <thead>
                        <tr>
                            <th class="no-sort" width="15%;">Nombre y correo</th>
                            <th class="no-sort">Comentario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lista as $item)
                        <tr>
                            <td> {!! $item->nombre !!} <br><small class="text-primary"> {!! $item->email !!} </small> </td>
                            <td>
                                {!! $item->propuesta !!}
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
           
        </div>
    </div>
</section>
@endsection

@section('scripts')
    
@endsection