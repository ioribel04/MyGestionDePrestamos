<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    protected $table = 'prestamos';

    protected $fillable = [
        'cliente_id',
        'monto',
        'interes',
        'saldo_capital',
        'fecha_prestamo',
        'estado',
        'observaciones'
    ];

   public function prestamos()
{
    return $this->hasMany(Prestamo::class);
}
}