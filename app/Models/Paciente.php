<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
  
use App\Models\Consulta;

class Paciente extends Model
{
    use HasFactory; 

    protected $table = 'patients';
 
    protected $fillable = [
        'name',
        'condition',
        'birthDate',
        'cpf',
        'telephone',
        'photo'
    ];

    public function consults () {
        return $this->hasMany(Consulta::class);
    }
}
