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
    <div class="container mt-5">
        <h1 class="mb-4">Editar Proyecto</h1>
        <form action="{{ route('proyectos.update', $proyect->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Título</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $proyect->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $proyect->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="introduction_date">Fecha de Introducción</label>
                <input type="date" name="introduction_date" id="introduction_date" class="form-control"
                    value="{{ old('introduction_date', $proyect->introduction_date) }}" required>
                @error('introduction_date')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" name="estado" id="estado" class="form-control"
                    value="{{ old('estado', $proyect->estado) }}" required>
                @error('estado')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="enlace_pdf">Enlace PDF</label>
                <input type="text" name="enlace_pdf" id="enlace_pdf" class="form-control"
                    value="{{ old('enlace_pdf', $proyect->enlace_pdf) }}" required>
                @error('enlace_pdf')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="categoria">Categoría</label>
                <input type="text" name="categoria" id="categoria" class="form-control"
                    value="{{ old('categoria', $proyect->categoria) }}" required>
                @error('categoria')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea name="comentarios" id="comentarios" class="form-control" rows="4">{{ old('comentarios', $proyect->comentarios) }}</textarea>
                @error('comentarios')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
@endsection

@section('js')
@endsection
