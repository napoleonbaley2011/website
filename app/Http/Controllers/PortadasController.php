<?php

namespace App\Http\Controllers;

use App\Models\Portadas;
use Illuminate\Http\Request;

class PortadasController extends Controller
{
    private $portadaService;
    public function __construct()
    {
        $this->middleware('auth');
        $this->portadaService = new Portadas();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = $this->portadaService->list();
        return view('admin.portadas.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.portadas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('imagen')) {
            $nombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('uploads/portada'), $nombre);
            $this->portadaService->store($nombre);
        }
        return redirect()->route('portadas.index')
            ->with('success', 'Se guardo correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portadas  $portadas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->portadaService->remove($id);
        return redirect()->route('portadas.index')
            ->with('success', 'Se eliminó correctamente.');
    }
}