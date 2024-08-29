<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('consultas', function (Blueprint $table) {
            $table->renameColumn('estado', 'condition');
            $table->renameColumn('freqCard', 'heartRate');
            $table->renameColumn('freqResp', 'respiratoryRate');
            $table->renameColumn('paciente_id', 'patient_id');

            $table->rename('consults');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('consults', function (Blueprint $table) {
            $table->renameColumn('condition', 'estado');
            $table->renameColumn('heartRate', 'freqCard');
            $table->renameColumn('respiratoryRate', 'freqResp');
            $table->renameColumn('patient_id', 'paciente_id');

            $table->rename('consultas');
        });
    }
};
