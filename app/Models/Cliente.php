<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id_c';
    public $incrementing = true;
    protected $keyType = 'int';
    public $timestamps = true;
    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nombre_c', 'correo_c', 'telefono_c', 'direccion_c', 'clave_c',
    ];
}
