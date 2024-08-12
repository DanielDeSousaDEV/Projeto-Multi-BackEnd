<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Paciente; 

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado',
        'freqCard',
        'freqResp',
        'paciente_id',
        'sintomas'
    ];

    public function paciente () {
        return $this->belongsTo(Paciente::class);
    }
}
