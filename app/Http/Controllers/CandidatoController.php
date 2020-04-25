<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Candidato;

class CandidatoController extends Controller
{
    public function index(){
        return Candidato::with('eleccion')->get();
    }
     public function create(Request $request)
    {
        $candidato = new Candidato;
        $candidato->nombre = $request->nombre;
        $candidato->apellido_paterno = $request->apellido_paterno;
        $candidato->apellido_materno = $request->apellido_materno;
        $candidato->eleccion_id = $request->eleccion_id;
        $candidato->fecha_nacimiento = $request->fecha_nacimiento;
        $candidato->propuestas = $request->propuestas;
        $candidato->imagen_path = 'public/storage';
        $candidato->save();
        return $candidato;
    }
}
