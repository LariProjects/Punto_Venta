<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraProducto extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla (si no sigue la convención de Laravel)
    protected $table = 'compra_productos';

    // Define los campos que pueden ser asignados en masa (mass assignable)
    protected $fillable = [
        'COMPRA_ID',
        'PRODUCTO_ID',
        'monto_total',
        'cant_comprada',
    ];

    // Relación: La tabla intermedia pertenece a una compra
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'COMPRA_ID');
    }

    // Relación: La tabla intermedia pertenece a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'PRODUCTO_ID');
    }
}
