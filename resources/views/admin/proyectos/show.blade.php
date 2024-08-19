@extends('layouts.app')

@section('css')
    <style>
        .project-details {
            margin-top: 20px;
        }
        .project-details .form-group label {
            font-weight: bold;
        }
        .btn {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <section class="section blog-area" style="margin-top: 267px !important">
        <div class="container">
            <h1>Detalle del Proyecto</h1>
            <div class="project-details">
                <div class="form-group">
                    <label for="title">Título</label>
                    <p id="title">{{ $proyect->title }}</p>
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <p id="description">{{ $proyect->description }}</p>
                </div>
                <div class="form-group">
                    <label for="introduction_date">Fecha de Introducción</label>
                    <p id="introduction_date">{{ $proyect->introduction_date }}</p>
                </div>
                <div class="form-group">
                    <label for="estado">Estado</label>
                    <p id="estado">{{ $proyect->estado }}</p>
                </div>
                <div class="form-group">
                    <label for="categoria">Categoría</label>
                    <p id="categoria">{{ $proyect->categoria }}</p>
                </div>
                <div class="form-group">
                    <label for="comentarios">Comentarios</label>
                    <p id="comentarios">{{ $proyect->comentarios }}</p>
                </div>
                <div class="form-group">
                    <label for="enlace_pdf">Enlace PDF</label>
                    <p id="enlace_pdf"><a href="{{ Storage::url($proyect->enlace_pdf) }}" target="_blank">Ver PDF</a></p>
                </div>
                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </section>
@endsection
