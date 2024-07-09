<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barrios extends Model
{
    use HasFactory;


    public function list()
    {
        return $this::get();
    }

    public function getBarrios()
    {
        return $this::orderBy('nombre', 'ASC')->get();
    }
}