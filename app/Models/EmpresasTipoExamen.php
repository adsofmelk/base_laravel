<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresasTipoExamen extends Model
{
    use HasFactory;

    protected $fillable = [
        'porcentaje_descuento',
        'precio_empresa',
    ];

}
