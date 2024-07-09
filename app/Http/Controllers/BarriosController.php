<?php

namespace App\Http\Controllers;

use App\Models\Barrios;
use Illuminate\Http\Request;

class BarriosController extends Controller
{
    protected $barriosService;


    public function __construct()
    {
        $this->middleware('auth')->except('barrios');

        $this->barriosService = new Barrios();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = $this->barriosService->list();
        return view('admin.barrios.index', compact('lista'));
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
     * @param  \App\Models\Barrios  $barrios
     * @return \Illuminate\Http\Response
     */
    public function show(Barrios $barrios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barrios  $barrios
     * @return \Illuminate\Http\Response
     */
    public function edit(Barrios $barrios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barrios  $barrios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barrios $barrios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barrios  $barrios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barrios $barrios)
    {
        //
    }

    public function barrios()
    {
        $lista = $this->barriosService->getBarrios();
        return view('public.c41.barrios', compact('lista'));
    }
}