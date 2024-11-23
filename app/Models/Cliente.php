<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla (opcional si sigue la convención)
    protected $table = 'clientes';

    // Define los campos que pueden ser asignados en masa
    protected $fillable = [
        'rfc',
        'nombre',
        'ap',       // Apellido paterno
        'calle',
        'num',
        'colonia',
    ];

    // Relación: Un cliente tiene muchas ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'CLIENTE_rfc', 'rfc');
    }
}


