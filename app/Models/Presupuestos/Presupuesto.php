<?php

namespace App\Models\Presupuestos;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'finanzas.presup';

    protected $primaryKey = 'id_presup';

    protected $fillable = [
        "id_empresa",
        "id_grupo",
        "fecha_emision",
        "codigo",
        "descripcion",
        "moneda",
        "responsable",
        "unid_program",
        "cantidad",
        "estado",
        "fecha_registro"
    ];

    public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'id_grupo');
    }

    public function monedaSeleccionada()
    {
        return $this->belongsTo(Moneda::class, 'moneda');
    }

    public function Partidas()
    {
        return $this->hasMany(Partida::class, 'id_presup');
    }

    public function Titulos()
    {
        return $this->hasMany(Titulo::class, 'id_presup', 'id_presup');
    }
}
