<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla (opcional, ya que Laravel lo infiere por convención)
    protected $table = 'compras';

    // Define los campos que pueden ser asignados en masa
    protected $fillable = [
        'PROVEEDOR_rfc',    // Relación con el proveedor
        'fecha_compra',     // Fecha de la compra
        'total_compra',     // Total de la compra
    ];

    // Relación: Una compra pertenece a un proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'PROVEEDOR_rfc', 'rfc');
    }

    // Relación: Una compra incluye muchos productos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'compra_productos')
                    ->withPivot('monto_total', 'cant_comprada')  // Campos adicionales en la tabla pivot
                    ->withTimestamps(); // Si se desea guardar las fechas de creación y actualización de la tabla pivot
    }
}
