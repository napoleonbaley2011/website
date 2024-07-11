<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyect extends Model
{
    use HasFactory;

    protected $table = 'proyects';
    protected $fillable = [
        'title',
        'description',
        'introduction_date',
        'estado',
        'enlace_pdf',
        'categoria',
        'comentarios',
    ];
}
