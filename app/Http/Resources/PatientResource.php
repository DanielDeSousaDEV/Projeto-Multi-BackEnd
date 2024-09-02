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
            'created_at'=>$this->created_at,
            'updated_at'=>$this->updated_at
        ];
    }
}
//err no all do pacientes porque precisa  do consultas 