<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    // Especificar los campos que pueden ser asignados en masa
    protected $fillable = [
        'numero', // Campo que será asignado en masa
        'PROVEEDOR_rfc', // Relación con el proveedor (clave foránea)
    ];

    // Relación: Un teléfono pertenece a un proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'PROVEEDOR_rfc', 'rfc');
    }
}

