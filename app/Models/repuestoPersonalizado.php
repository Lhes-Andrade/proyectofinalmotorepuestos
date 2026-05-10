<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class repuestoPersonalizado extends Model
{
    protected $table = 'solicitudes';
    protected $fillable = [
        'nombre',
        'correo',
        'telefono',
        'marca',
        'modelo',
        'anio',
        'descripcion',
        'imagen'
    ];
}

