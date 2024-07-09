<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Visitas extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['ip'];


    public function store(Request $request)
    {
        $visitas = $this->create([
            'ip' => $request->ip()
        ]);
        return $visitas;
    }
}