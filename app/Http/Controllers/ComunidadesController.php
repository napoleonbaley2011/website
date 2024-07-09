<?php

namespace App\Http\Controllers;

use App\Models\Comunidades;
use Illuminate\Http\Request;

class ComunidadesController extends Controller
{

    protected $comunidadesService;

    public function __construct()
    {
        $this->middleware('auth')->except('comunidades');

        $this->comunidadesService = new Comunidades();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = $this->comunidadesService->list();
        return view('admin.comunidades.index', compact('lista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function show(Comunidades $comunidades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function edit(Comunidades $comunidades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comunidades $comunidades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comunidades  $comunidades
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comunidades $comunidades)
    {
        //
    }

    public function comunidades()
    {
        $lista = $this->comunidadesService->getComunidades();
        return view('public.c41.comunidades', compact('lista'));
    }
}