<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propuestas extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['propuesta', 'titulo', 'icono'];

    public function list()
    {
        return $this::orderBy('id', 'DESC')->get();
    }

    public function store($request)
    {
        $res = $this::create([
            'icono' => $request->icono,
            'titulo' => strtoupper($request->titulo),
            'propuesta' => $request->propuesta,
        ]);
        return $res;
    }

    public function getOne($id)
    {
        $p = $this::find($id);
        return $p;
    }

    public function modify($request, $id)
    {
        $p = $this::find($id);
        $p->titulo = strtoupper($request->titulo);
        $p->propuesta = $request->propuesta;
        $p->save();
        return $p;
    }

    public function deleteOne($id)
    {
        $p = $this::find($id);
        $p->delete();
    }
}