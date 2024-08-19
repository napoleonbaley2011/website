<?php

namespace App\Http\Controllers;

use App\Models\Proyect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyectController extends Controller
{
    public function index()
    {
        $proyects = Proyect::all();
        return view('admin.proyectos.index', compact('proyects'));
    }

    public function create()
    {
        return view('admin.proyectos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'introduction_date' => 'required|date',
            'estado' => 'required|string|max:255',
            'enlace_pdf' => 'required|file|mimes:pdf|max:2048',
            'categoria' => 'required|string|max:255',
            'comentarios' => 'nullable|string',
        ]);

        if ($request->hasFile('enlace_pdf')) {
            $file = $request->file('enlace_pdf');
            $filePath = $file->store('pdfs', 'public');
            $request->merge(['enlace_pdf' => $filePath]);
        }

        Proyect::create($request->all());

        return redirect()->route('proyectos.index')
            ->with('success', 'Proyecto creado exitosamente.');
    }

    public function show($id_proyect)
    {
        $proyect = Proyect::where('id', '=', $id_proyect)->first();
        return view('admin.proyectos.show', compact('proyect'));
    }

    public function edit($id_proyect)
    {
        $proyect = Proyect::where('id', '=', $id_proyect)->first();
        return view('admin.proyectos.edit', compact('proyect'));
    }

    public function update(Request $request, $id_proyect)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'introduction_date' => 'required|date',
            'estado' => 'required|string|max:255',
            'enlace_pdf' => 'required|string|max:255',
            'categoria' => 'required|string|max:255',
            'comentarios' => 'nullable|string',
        ]);

        $proyect = Proyect::where('id', '=', $id_proyect)->first();

        if ($proyect) {
            $proyect->update($request->all());
            return redirect()->route('proyectos.index')
                ->with('success', 'Proyecto actualizado exitosamente.');
        } else {
            return redirect()->route('proyectos.index')
                ->with('error', 'Proyecto no encontrado.');
        }
    }

    public function destroy($id_proyect)
    {
        $proyect = Proyect::where('id', '=', $id_proyect)->first();

        if ($proyect) {
            $proyect->delete();
            return redirect()->route('proyectos.index')
                ->with('success', 'Proyecto eliminado exitosamente.');
        } else {
            return redirect()->route('proyectos.index')
                ->with('error', 'Proyecto no encontrado.');
        }
    }

    public function presentacion()
    {
        $proyects = Proyect::all();
        return view('public.proyecto', compact('proyects'));
    }
}
