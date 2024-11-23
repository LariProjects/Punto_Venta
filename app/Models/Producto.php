<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Especificar los campos que pueden ser asignados en masa
    protected $fillable = [
        'nombre', // Campo de nombre del producto
        'descripcion', // Campo de descripción
        'categoria_id', // Relación con la categoría (clave foránea)
        'precio', // Precio del producto
        'stock', // Cantidad en stock
        'codigo', // Código del producto
        // Agregar más campos si es necesario
    ];

    // Relación: Un producto pertenece a una categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    // Relación: Un producto puede estar en muchas compras
    public function compras()
    {
        return $this->belongsToMany(Compra::class, 'compra_productos')
                    ->withPivot('monto_total', 'cant_comprada');
    }

    // Relación: Un producto puede estar en muchas ventas
    public function ventas()
    {
        return $this->belongsToMany(Venta::class, 'venta_productos')
                    ->withPivot('monto_total', 'cant_vendida');
    }
}
