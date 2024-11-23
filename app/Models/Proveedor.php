<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // Especificar los campos que pueden ser asignados en masa
    protected $fillable = [
        'rfc', // RFC del proveedor
        'nombre', // Nombre del proveedor
        'direccion', // Dirección del proveedor
        'telefono', // Teléfono de contacto del proveedor
        'email', // Correo electrónico del proveedor
        'contacto', // Persona de contacto del proveedor
        // Agregar más campos si es necesario
    ];

    // Relación: Un proveedor tiene muchos teléfonos
    public function telefonos()
    {
        return $this->hasMany(Telefono::class, 'PROVEEDOR_rfc', 'rfc');
    }

    // Relación: Un proveedor tiene muchas compras
    public function compras()
    {
        return $this->hasMany(Compra::class, 'PROVEEDOR_rfc', 'rfc');
    }
}

