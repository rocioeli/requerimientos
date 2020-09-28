<?php

namespace App\Models\Presupuestos;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'finanzas.presup';

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
}
