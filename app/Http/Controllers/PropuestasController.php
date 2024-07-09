<?php

namespace App\Http\Controllers;

use App\Models\Propuestas;
use Illuminate\Http\Request;

class PropuestasController extends Controller
{
    private $propService;
    public function __construct()
    {
        $this->middleware('auth')->except('listaPublica');
        $this->propService = new Propuestas();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = $this->propService->list();
        return view('admin.propuestas.index', compact('lista'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.propuestas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->propService->store($request);
        return redirect()->route('propuestas.index')
            ->with('success', 'Se guardo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $p = $this->propService->getOne($id);
        return view('admin.propuestas.edit', compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $p = $this->propService->getOne($id);
        return view('admin.propuestas.edit', compact('p'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->propService->modify($request, $id);
        return redirect()->route('propuestas.index')
            ->with('success', 'Se modificó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propuestas  $propuestas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->propService->deleteOne($id);
        return redirect()->route('propuestas.index')
            ->with('success', 'Se eliminó correctamente.');
    }
}