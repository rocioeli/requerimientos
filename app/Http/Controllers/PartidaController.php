<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuestos\Partida;

class PartidaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function store()
    {
        $data = Partida::create([
                'id_presup' => request('id_presup'),
                'codigo' => request('codigo'),
                'descripcion' => strtoupper(request('descripcion')),
                'cod_padre' => request('cod_padre'),
                'importe_total' => request('importe_total'),
                'fecha_registro' => date('Y-m-d H:i:s'),
                'estado' => 1
            ]);

        return response()->json($data);
    }

    public function update()
    {
        $partida = Partida::findOrFail(request('id_partida'));
        $partida->update([
            'descripcion' => strtoupper(request('descripcion')),
            'importe_total' => strtoupper(request('importe_total')),
        ]);

        return response()->json($partida);
    }

    public function destroy($id)
    {
        $partida = Partida::findOrFail($id);
        $partida->update(['estado' => 7]);

        return response()->json($partida);
    }
}
