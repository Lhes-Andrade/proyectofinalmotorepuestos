<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RepuestoPersonalizado extends Model
{
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'marca',
        'modelo',
        'anio',
        'descripcion',
        'imagen',
    ];
}