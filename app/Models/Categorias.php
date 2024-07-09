<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nombre'];

    public function list()
    {
        return $this::orderBy('id', 'DESC')->get();
    }

    public function store($request)
    {
        $res = $this::create([
            'nombre' => strtoupper($request->nombre),
        ]);
        return $res;
    }

    public function getOne($id)
    {
        $res = $this::find($id);
        return $res;
    }

    public function modify($request, $id)
    {
        $res = $this::find($id);
        $res->nombre = strtoupper($request->nombre);
        $res->save();
        return $res;
    }

    public function deleteOne($id)
    {
        $res = $this::find($id);
        $res->delete();
    }
}