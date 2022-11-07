<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GruposExamenes;

class TipoExamen extends Model
{
    use HasFactory;
    protected $fillable = [
                            'nombre',
                            'precio',
                            'estado',
                            'grupos_examenes_id',
                        ];
    protected $table = "tipo_examen";

    public function gruposexamenes()
    {
        return $this->belongsTo(GruposExamenes::class,'grupos_examenes_id','id');
    }

    public function empresas()
    {
        return $this->belongsToMany(Empresas::class)->withPivot(['precio_empresa']);
        // return $this->belongsToMany(Empresas::class,'empresas','id');
    }

}
