<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    // Especificar los campos que pueden ser asignados en masa
    protected $fillable = [
        'CLIENTE_rfc', // RFC del cliente
        'fecha', // Fecha de la venta
        'total', // Total de la venta
        // Agregar más campos si es necesario
    ];

    // Relación: Una venta pertenece a un cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'CLIENTE_rfc', 'rfc');
    }

    // Relación: Una venta incluye muchos productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'venta_productos')
                    ->withPivot('monto_total', 'cant_vendida');
    }
}


