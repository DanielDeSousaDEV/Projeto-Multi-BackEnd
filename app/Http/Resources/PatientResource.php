<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'name'=> $this->name,
            'condition'=> $this->condition,
            'birthDate'=>$this->birthDate,
            'cpf'=>$this->cpf,
            'telephone'=>$this->telephone,
            'photo'=>$this->photo,
            'consults'=>$this->consults,//talvez e tenha que usar o resource da consultas aqui e tbm da erro
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
