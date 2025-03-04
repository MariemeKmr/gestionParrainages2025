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
        Schema::create('erreurs_electeurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fichier_electeur_id')->constrained('fichiers_electeurs')->onDelete('cascade');
            $table->string('numero_carte_electeur');
            $table->text('description_erreur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('erreurs_electeurs');
    }
};
