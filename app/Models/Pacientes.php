<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pacientes extends Model
{
    use HasFactory;

    protected $fillable = [
                    'nombre1',
                    'nombre2',
                    'apellido1',
                    'apellido2',
                    'documento',
                    'telefono',
                    'email',
                    'tipo_documentos_id',
                ];


    public function tipodocumentos()
    {
        return $this->belongsTo(TipoDocumentos::class,'tipo_documentos_id','id');
        // return $this->belongsToMany(TipoDocumentos::class)->withPivot(['precio_empresa']);
    }
}
