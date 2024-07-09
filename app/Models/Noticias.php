<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class Noticias extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['titulo', 'cuerpo', 'resumen', 'archivo', 'tipo', 'fecha', 'categoria', 'tipo_publicacion','key_video'];


    public function list()
    {
        return $this::orderBy('id', 'DESC')->paginate(10);
    }

    public function store(Request $request)
    {
        $fileName = $this->uploadFile($request);
        $nohtml = strip_tags($request->cuerpo);
        $noticia = $this::create([
            'titulo' => $request->titulo,
            'cuerpo' => $request->cuerpo,
            'resumen' => Str::limit($nohtml, 300, '...'),
            'archivo' => $fileName ? $fileName : $request->archivo,
            'tipo' => $fileName ? 2 : 1,
            'key_video' =>$request->key_video,
            'tipo_publicacion' => $request->tipo_publicacion,
            'categoria' => $request->categoria,
            'fecha' => now()
        ]);
        return $noticia;
    }

    public function get($id)
    {
        return $this::find($id);
    }

    public function modify($id, Request $request)
    {
        $noticia = $this::find($id);
        $noticia->titulo = $request->titulo;
        $noticia->cuerpo = $request->cuerpo;
        $noticia->tipo_publicacion = $request->tipo_publicacion;
        $noticia->categoria = $request->categoria;
        $noticia->key_video = $request->key_video;
        $nohtml = strip_tags($noticia->cuerpo);
        $noticia->resumen = Str::limit($nohtml, 300, '...');
        if ($request->hasFile('archivo')) {
            $fileName = $this->uploadFile($request);
            $noticia->archivo = $fileName ? $fileName : $request->archivo;
        }
        $noticia->save();
        return $noticia;
    }

    public function remove($id)
    {
        $noticia = $this::find($id);
        $noticia->delete();
    }

    public function getDepNews()
    {
        return $this::orderBy('id', 'DESC')->simplePaginate(5);
    }

    public function getNewsByType($tipo = 'todas', $search = '')
    {

        return $this::where('tipo_publicacion', '=', $tipo)
            ->where('titulo', 'like', '%' . $search . '%')
            ->orderBy('id', 'DESC')
            ->simplePaginate(10);
    }

    public function getNewsByText($search = '')
    {

        return $this::where('titulo', 'like', '%' . $search . '%')->orderBy('id', 'DESC')->simplePaginate(10);
    }

    public function getLastNews($search = '', $categoria = '')
    {

        $search = $this->quitar_tildes($search);

        if ($categoria != '' || $categoria != null) {
            return $this::select('noticias.*')
                ->where('tipo', '2')
                ->where('categoria', '=', $categoria)
                ->orderBy('id', 'DESC')
                ->limit(5)
                ->get();
        }
        return $this::select('noticias.*')
            ->where('tipo', '2')
            ->where('titulo', 'like', "%{$search}%")
            ->orderBy('id', 'DESC')
            ->limit(5)
            ->get();
    }

    public function getLastVideos($search = '', $categoria = '')
    {
         $search = $this->quitar_tildes($search);

        if ($categoria != '' || $categoria != null) {
            return $this::select('noticias.*')
                ->where('tipo','1')
                ->where('categoria', '=', $categoria)
                ->orderBy('id', 'DESC')
                ->limit(6)
                ->get();
        }
        return $this::select('noticias.*')
            ->where('tipo', '1')
            ->where('titulo', 'like',"%{$search}%")
            ->orderBy('id', 'DESC')
            ->limit(6)
            ->get();
    }

    private function uploadFile(Request $request)
    {
        if ($request->hasFile('archivo')) {
            $nombre = time() . '.' . $request->archivo->extension();
            $request->archivo->move(public_path('uploads/noticia'), $nombre);
            return $nombre;
        }

        return null;
    }

    function quitar_tildes($cadena) {
        $no_permitidas= array ("á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹");
        $permitidas= array ("a","e","i","o","u","A","E","I","O","U","n","N","A","E","I","O","U","a","e","i","o","u","c","C","a","e","i","o","u","A","E","I","O","U","u","o","O","i","a","e","U","I","A","E");
        $texto = str_replace($no_permitidas, $permitidas ,$cadena);
        $lower = strtolower($texto);

     return $lower;
    }
}