<?php

namespace App\Http\Controllers;
   
use App\Models\Paciente;

use Illuminate\Http\Request;

use Intervention\Image\Image;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\storePacienteRequest;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\ImageManager;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        return Paciente::orderBy('created_at', 'desc')->get();
    } 
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(storePacienteRequest $request)
    {
        $validated = $request->validated();

        $bruteImg = $request['foto'];
        $newName = $bruteImg->hashName();
        
        $brutePath = $bruteImg->path();
        $imageManager = new ImageManager(new Driver());
        $image = $imageManager->read($brutePath);
        $image->coverDown(500,500);

        $imagePath = storage_path('app\\public').'\\fotos\\'.$newName;

        $image->save($imagePath);

        $imageURL = asset('storage/fotos/'.$newName);
        $validated['foto'] = $imageURL;

        Paciente::create($validated);

        return response()->json([201=>'Paciente criado com sucesso!'],201);;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return response()->json([
                '404'=>'Resouce not found'
            ], 404);
        }

        return $paciente;
    }

    /*
     * Update the specified resource.
     */
    public function update($id, Request $request)
    {
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return response()->json([
                '404'=>'Resouce not found'
            ], 404);
        }
        
        $validated = $request->validate([
            'condicao'=>'string|required'
        ]);

        $paciente->update($validated);

        return $paciente;
    }

    /**
     * Display the consults of specified resource.
     */
    public function showConsultas($id)
    {
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return response()->json([
                '404'=>'Resouce not found'
            ], 404);
        }

        return $paciente->consultas()->orderBy('created_at', 'desc')->get();
    }
}
