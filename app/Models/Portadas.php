<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Portadas extends Model
{
    use HasFactory;

    protected $fillable = ['imagen'];
    public $timestamps = false;

    public function list()
    {
        return $this::get();
    }

    public function store($imagen)
    {
        $record = $this::create([
            'imagen' => $imagen
        ]);

        return $record;
    }

    public function getOne($id)
    {
        return $this::find($id);
    }

    public function modify()
    {

    }

    public function remove($id)
    {
        $record = $this::find($id);
        $record->delete();
    }


}