<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use function Laravel\Prompts\table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('pacientes', function (Blueprint $table) {
            //renomeando os campos
            $table->renameColumn('nome', 'name');
            $table->renameColumn('condicao', 'condition');
            $table->renameColumn('dataNasc', 'birthDate');
            $table->renameColumn('telefone', 'telephone');
            $table->renameColumn('foto', 'photo');
            
            $table->rename('patients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->renameColumn('name', 'nome');
            $table->renameColumn('condition', 'condicao');
            $table->renameColumn('birthDate', 'dataNasc');
            $table->renameColumn('telephone', 'telefone');
            $table->renameColumn('photo', 'foto');

            $table->rename('pacientes');
        });
    }
};
