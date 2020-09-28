<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presupuestos\Presupuesto;
use App\Models\Presupuestos\Grupo;

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
        
        return view('presupuestos.create', compact('presupuesto','grupos'));
    }
}
