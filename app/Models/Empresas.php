<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;
    protected $fillable = [
                            'nombre',
                            'nit',
                            'telefono',
                            'email',
                            'nombre_contacto',
                            'direccion',
                            'estado',
                        ];

    public function tipoexamen()
    {
        return $this->belongsToMany(TipoExamen::class)->withPivot('tipo_examen_id','id');;
    }
}
