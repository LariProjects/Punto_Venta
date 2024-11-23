<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla (si no sigue la convención de Laravel)
    protected $table = 'venta_productos';

    // Definir los campos que pueden ser asignados en masa
    protected $fillable = [
        'venta_id', // ID de la venta
        'producto_id', // ID del producto
        'monto_total', // Monto total de los productos vendidos
        'cant_vendida', // Cantidad de productos vendidos
    ];

    // Relación: La tabla intermedia pertenece a una venta
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'venta_id');
    }

    // Relación: La tabla intermedia pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
