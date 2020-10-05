<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuestos\Presupuesto;
use App\Models\Presupuestos\Grupo;
use App\Models\Presupuestos\Moneda;

class PresupuestoController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $presupuestos = Presupuesto::all()->where('estado',1);
    
        return view('presupuestos.index',compact('presupuestos'));
    }

    public function create()
    {
        $presupuesto = new Presupuesto;
        $grupos = Grupo::all();
        $monedas = Moneda::all();
        $presupuestos = Presupuesto::all()->where('estado',1);
        
        return view('presupuestos.create', compact('presupuesto','grupos','monedas','presupuestos'));
    }

    public function mostrarPartidas($id)
    {
        $presup = Presupuesto::findOrFail($id);
        $presup->grupo;
        $presup->monedaSeleccionada;
        $presup->titulos;
        $presup->partidas;

        return response()->json($presup);
    }

    public function store()
    {
        $codigo = $this->presupNextCodigo(  request('id_grupo'),
                                            request('fecha_emision') );

        $data = Presupuesto::create([
            'id_empresa' => 4,
            'id_grupo' => request('id_grupo'),
            'fecha_emision' => request('fecha_emision'),
            'codigo' => $codigo,
            'descripcion' => strtoupper(request('descripcion')),
            'moneda' => request('moneda'),
            // 'responsable' => request('responsable'),
            // 'unid_program' => request('unid_program'),
            // 'cantidad' => request('cantidad'),
            'fecha_registro' => date('Y-m-d H:i:s'),
            'estado' => 1
        ]);

        return response()->json($data);
    }

    public function presupNextCodigo($id_grupo,$fecha)
    {
        $yyyy = date('Y',strtotime($fecha));
        $anio = date('y',strtotime($fecha));

        $grupo = Grupo::findOrFail($id_grupo);
        
        $correlativo = Presupuesto::where([ ['id_grupo','=',$id_grupo],
                                            ['estado','=',1] ])
                                    ->whereYear('fecha_emision', '=', $yyyy)
                                    ->count();

        $next = $this->leftZero(3,$correlativo+1);

        return 'P'.$grupo->abreviatura.$anio.$next;
    }

    public function leftZero($lenght, $number){
        $nLen = strlen($number);
        $zeros = '';
        for($i=0; $i<($lenght-$nLen); $i++){
            $zeros = $zeros.'0';
        }
        return $zeros.$number;
    }
}
