<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Barrios;
use App\Models\Galerias;

class Articulos extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function getAll($id)
    {
        $barrios = Barrios::find($id);
        $articulos = $this::where('id_barrio', $id)->get();

        return [
            'barrios' => $barrios,
            'articulos' => $articulos,
        ];
    }

    public function store(Request $request)
    {
        $fileName = $this->uploadFile($request, 'uploads/articulo');
        $articulo = $this->create([
            'imagen' => $fileName,
            'titulo' => Str::upper($request->titulo),
            'cuerpo' => $request->cuerpo,
            'resumen' => Str::limit($request->cuerpo, 100, '...'),
            'id_barrio' => $request->id_barrio
        ]);


        // $articulo->titulo = Str::upper($request->titulo);
        // $articulo->cuerpo = $request->cuerpo;
        // $articulo->resumen = Str::limit($request->cuerpo, 100, '...');
        // $articulo->id_barrio = $request->id_barrio;
        // $articulo->save();
        return $articulo;
    }

    public function getOne($id)
    {
        $articulo = Articulos::find($id);
        $lista = Galerias::where('id_articulo', $id)->get();
        return view('admin.articulos.show', compact('articulo', 'lista'));
    }

    public function update(Request $request)
    {
        $articulo = Articulos::find($request->id);

        $fileName = $this->uploadFile($request, 'uploads/articulo');
        if ($fileName) {
            $articulo->imagen = $fileName;
        }
        $articulo->titulo = strtoupper($request->titulo);
        $articulo->cuerpo = $request->cuerpo;
        $articulo->resumen = Str::limit($request->cuerpo, 100, '...');
        $articulo->save();

        return $articulo;
    }

    public function Delete(Request $request)
    {
        DB::table('articulos')->where('id', $request->id)->delete();

        return redirect()->route('articulos.index', ['id' => $request->id_barrio])
            ->with('success', 'Se eliminó correctamente.');
    }

    private function uploadFile(Request $request, $path)
    {
        if ($request->imagen) {
            $nombre = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path($path), $nombre);
            return $nombre;
        }

        return null;
    }

    public function ShowPublication($id)
    {
        $articulo = $this::find($id);
        $lista = Galerias::where('id_articulo', $id)->get();
        return view('public.barrios.ver_publicacion', compact('articulo', 'lista'));
    }

    public function Publication($id)
    {
        $barrio = Barrios::find($id);
        $lista = Articulos::where('id_barrio', $id)->get();

        return view('public.barrios.publicaciones', compact('lista', 'barrio'));
    }
}