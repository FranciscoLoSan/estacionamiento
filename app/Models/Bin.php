<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bin extends Model
{
    protected $fillable = [
        'modelo',
        'placas',
        'cajon',
        'hora_entrada',
        'fecha_entrada',
        'hora_salida',
        'fecha_salida',
        'total_pago',
        'estado'
    ];
}
