@extends('layouts.app')

@section('css')
    <style>
        @media screen and (max-width: 320px) {
            table {
                display: block;
                overflow-x: auto;
            }
        }

        .dataTables_length {
            display: none !important;
            width: 0px !important;
        }

        @media only screen and (max-width: 479px) {
            .section {
                margin-top: 140px !important;
            }
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .btn {
            margin: 2px;
        }
    </style>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <section class="section blog-area" style="margin-top: 267px !important">
        <div class="container">
            <h1>Proyectos</h1>
            <a href="{{ route('proyectos.create') }}" class="btn btn-primary mb-3">Crear Proyecto</a>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="proyectosTable">
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Descripción</th>
                            <th>Fecha de Introducción</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proyects as $proyect)
                            <tr>
                                <td>{{ $proyect->title }}</td>
                                <td>{{ $proyect->description }}</td>
                                <td>{{ $proyect->introduction_date }}</td>
                                <td>{{ $proyect->estado }}</td>
                                <td>
                                    <a href="{{ route('proyectos.show', $proyect->id) }}" class="btn btn-info">Ver</a>
                                    <a href="{{ route('proyectos.edit', $proyect->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('proyectos.destroy', $proyect->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#proyectosTable').DataTable({
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                }
            });
        });
    </script>
@endsection
