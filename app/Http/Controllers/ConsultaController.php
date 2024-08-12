<?php

namespace App\Http\Controllers;
  
use App\Models\Consulta;

use Illuminate\Http\Request;
use App\Http\Requests\storeConsultaRequest;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Consulta::orderBy('created_at', 'desc')->get();
    } 
 
    /**
     * Store a newly created resource in storage.
     */ 
    public function store(storeConsultaRequest $request)
    {
        $validated = $request->validated();
        
        // return $validated['paciente_id'];
        
        Consulta::create($validated);
        //pode dar dando erro porque não tem pacientes no sistema
    }
}
