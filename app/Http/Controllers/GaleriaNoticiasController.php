<?php

namespace App\Http\Controllers;

use App\Models\GaleriaNoticias;
use App\Models\Noticias;
use Illuminate\Http\Request;

class GaleriaNoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $id = $request->id_noticia;
        $files = [];
        if ($request->file('imagen')) {
            foreach ($request->file('imagen') as $key => $file) {
                $file_name = time() . rand(1, 99) . '.' . $file->extension();
                $file->move(public_path('uploads/galerian'), $file_name);
                $files[]['name'] = $file_name;
            }
        }

        foreach ($files as $key) {
            $galeria = new GaleriaNoticias();
            $galeria->imagen = $key['name'];
            $galeria->id_noticia = $id;
            $galeria->save();
        }
        // if ($request->hasFile('imagen')) {
        //     $img = $request->file('imagen');
        //     $nombre = time() . '.' . $img->extension();
        //     $img->move(public_path('uploads/galerian'), $nombre);
        //     $galeria->imagen = $nombre;
        //     $galeria->id_noticia = $id;
        //     $galeria->save();
        // }
        return redirect()->route('galeria_noticia.edit', $id)
            ->with('success', 'Se guardo correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GaleriaNoticias  $galeriaNoticias
     * @return \Illuminate\Http\Response
     */
    public function show(GaleriaNoticias $galeriaNoticias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GaleriaNoticias  $galeriaNoticias
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticias::find($id);
        $lista = GaleriaNoticias::where('id_noticia', $id)->get();
        return view('admin.galerian.index', compact('noticia', 'lista'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GaleriaNoticias  $galeriaNoticias
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GaleriaNoticias $galeriaNoticias)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GaleriaNoticias  $galeriaNoticias
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = GaleriaNoticias::find($id);
        $noticiId = $imagen->id_noticia;
        $imagen->delete();

        return redirect()->route('galeria_noticia.edit', $noticiId)
            ->with('success', 'Se eliminó correctamente.');
    }
}