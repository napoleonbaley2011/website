<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    private $categoriaService;
    public function __construct()
    {
        // $this->middleware('auth')->except('listaPublica');
        $this->categoriaService = new Categorias();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = $this->categoriaService->list();
        return view('admin.categorias.index', compact('lista'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->categoriaService->store($request);
        return redirect()->route('categorias.index')
            ->with('success', 'Se guardo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p = $this->categoriaService->getOne($id);
        return view('admin.categorias.edit', compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = $this->categoriaService->getOne($id);
        return view('admin.categorias.edit', compact('p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->categoriaService->modify($request, $id);
        return redirect()->route('categorias.index')
            ->with('success', 'Se modificó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorias  $categorias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoriaService->deleteOne($id);
        return redirect()->route('categorias.index')
            ->with('success', 'Se eliminó correctamente.');
    }
}