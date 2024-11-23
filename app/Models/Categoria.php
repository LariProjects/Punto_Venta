<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Especifica el nombre de la tabla (opcional si sigue la convención de Laravel)
    protected $table = 'categorias';

    // Define los campos que pueden ser asignados en masa (mass assignable)
    protected $fillable = [
        'descripcion',
    ];

    // Relación: Una categoría tiene muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
