<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\GaleriaNoticias;
use App\Models\Noticias;
use Illuminate\Http\Request;

class NoticiasController extends Controller
{
    private $noticiaService;
    private $categoriaService;
    private $galerianService;

    public function __construct()
    {
        $this->middleware('auth')->except('publico', 'ver', 'publicoSearch');
        $this->noticiaService = new Noticias();
        $this->categoriaService = new Categorias();
        $this->galerianService = new GaleriaNoticias();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lista = $this->noticiaService->list();
        return view('admin.noticias.index', compact('lista'))->with('i');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->categoriaService->list();
        return view('admin.noticias.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->noticiaService->store($request);
        return redirect()->route('noticias.index')
            ->with('success', 'Se guardo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $noticia = $this->noticiaService->get($id);
        $galeria = $this->galerianService->list($id);
        return view('admin.noticias.show', compact('noticia', 'galeria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = $this->noticiaService->get($id);
        $categorias = $this->categoriaService->list();
        return view('admin.noticias.edit', compact('noticia', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticias $noticias)
    {
        $this->noticiaService->modify($request->id, $request);
        return redirect()->route('noticias.index')
            ->with('success', 'Se modifico correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticias  $noticias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->noticiaService->remove($id);
        return redirect()->route('noticias.index')
            ->with('danger', 'Se eliminó correctamente.');
    }

    public function publico($tipo)
    {
        $lista = $this->noticiaService->getNewsByType($tipo);

        return view('public.noticias', compact('lista', 'tipo'))->with('i');
    }

    public function publicoSearch(Request $request)
    {
        $lista = $this->noticiaService->getNewsByText($request->search);
        $tipo = 'COINCIDENCIAS CON "' . $request->search . '"';
        return view('public.noticias', compact('lista', 'tipo'))->with('i');
    }

    public function ver($id)
    {
        $noticia = $this->noticiaService->get($id);
        $galeria = $this->galerianService->list($id);
        return view('public.noticia', compact('noticia', 'galeria'));
    }
}