<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Presupuesto;

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
}
