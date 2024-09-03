<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Paciente; 

class Consulta extends Model
{
    use HasFactory;

    protected $table = 'consults';

    // protected $primaryKey = 'consults_id';

    protected $fillable = [
        'condition',
        'heartRate',
        'respiratoryRate',
        'patient_id',
        'symptoms'
    ];

    public function patient () {
        return $this->belongsTo(Paciente::class, 'id');
    }
}
