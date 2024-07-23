<?php
namespace App\Http\Controllers;


use App\Models\Proyect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProyectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyects = Proyect::all();
        return view('admin.proyectos.index', compact('proyects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(Proyect $proyect)
    {
        return view('admin.proyectos.show', compact('proyect'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyect $proyect)
    {
        return view('admin.proyectos.edit', compact('proyect'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyect $proyect)
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

        $proyect->update($request->all());

        return redirect()->route('proyects.index')
                        ->with('success', 'Proyecto actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Proyect $proyect)
    {
        $proyect->delete();

        return redirect()->route('proyects.index')
                        ->with('success', 'Proyecto eliminado exitosamente.');
    }
}
