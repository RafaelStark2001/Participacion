<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    /** @use HasFactory<\Database\Factories\AlumnoFactory> */
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'codigo'];

    public function secciones()
    {
        return $this->belongsToMany(Seccion::class);
    }
}
