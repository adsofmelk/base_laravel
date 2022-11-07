<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamiento extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'estado',
        'empresas_id',
        'pacientes_id',
        'tipoestados_agendamientos_id'
    ];
    protected $table = "agendamiento";

    public function empresas()
    {
        return $this->belongsTo(Empresas::class, 'empresas_id', 'id');
        // return $this->belongsToMany(TipoDocumentos::class)->withPivot(['precio_empresa']);
    }

    public function pacientes()
    {
        return $this->belongsTo(Pacientes::class, 'pacientes_id', 'id');
        // return $this->belongsToMany(TipoDocumentos::class)->withPivot(['precio_empresa']);
    }

    public function tipoestasosAgendamientos()
    {
        return $this->belongsTo(TipoestadosAgendamientos::class, 'tipoestados_agendamientos_id', 'id');
        // return $this->belongsToMany(TipoDocumentos::class)->withPivot(['precio_empresa']);
    }
}
