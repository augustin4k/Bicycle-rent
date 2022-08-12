<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    
    protected $fillable = [
        'hora_reserva',
        'hora_inicial',
        'hora_final',
        'custo',
        'cliente_id',
        'bicicleta_id',
        'posto_id',
        'estado'
    ];
}