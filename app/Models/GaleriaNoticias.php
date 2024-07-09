<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriaNoticias extends Model
{
    use HasFactory;

    public function list($id_noticia)
    {
        return $this::where('id_noticia', $id_noticia)->get();
    }
}