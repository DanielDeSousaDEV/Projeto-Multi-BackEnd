<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
use App\Models\Consulta;

class Paciente extends Model
{
    use HasFactory; 
 
    protected $fillable = [
        'nome',
        'condicao',
        'dataNasc',
        'cpf',
        'telefone',
        'foto'
    ];

    public function consultas () {
        return $this->hasMany(Consulta::class);
    }
}
