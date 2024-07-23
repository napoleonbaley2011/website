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

        .form-group {
            margin-bottom: 15px;
        }

        .btn {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area" style="margin-top: 267px !important">
        <div class="container">
            <h1>Crear Proyecto</h1>
            <form action="{{ route('proyectos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Título</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea name="description" id="description" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="introduction_date">Fecha de Introducción</label>
                    <input type="date" name="introduction_date" id="introduction_date" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <input type="text" name="estado" id="estado" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="enlace_pdf">Enlace PDF</label>
                    <input type="file" name="enlace_pdf" id="enlace_pdf" class="form-control" accept="application/pdf" required>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <input type="text" name="categoria" id="categoria" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="comentarios">Comentarios</label>
                    <textarea name="comentarios" id="comentarios" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Crear</button>
            </form>
        </div>
    </section>
@endsection

@section('js')
@endsection
