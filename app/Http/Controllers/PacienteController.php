<?php

namespace App\Http\Controllers;
   
use App\Models\Paciente;

use Illuminate\Http\Request;

use Intervention\Image\Image;

use Illuminate\Support\Facades\Storage;
use App\Http\Requests\storePacienteRequest;
use App\Http\Resources\PatientResource;
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

        $bruteImg = $request['photo'];
        $newName = $bruteImg->hashName();
        
        $brutePath = $bruteImg->path();
        $imageManager = new ImageManager(new Driver());
        $image = $imageManager->read($brutePath);
        $image->coverDown(500,500);

        $imagePath = "../storage/app/public/fotos/$newName";

        $image->save($imagePath);

        $imageURL = asset('storage/fotos/'.$newName);
        $validated['photo'] = $imageURL;

        Paciente::create($validated);

        return response()->json([
            201=>'Paciente criado com sucesso!'
        ],201);;
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

        return new PatientResource($paciente);
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
            'condition'=>'string|required'
        ]);
        
        $paciente->update($validated);

        return new PatientResource($paciente);
    }

    /**
     * Display the consults of specified resource.
     */
    public function showConsultas($id)
    {
        $paciente = Paciente::where('id', $id)->first();

        if (!$paciente) {
            return response()->json([
                '404'=>'Resouce not found'
            ], 404);
        };        

        return $paciente->consults()->orderBy('created_at', 'desc')->get();
    }
}
