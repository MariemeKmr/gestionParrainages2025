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
        Schema::create('messages', function (Blueprint $table) {
            $table->id(); // ID unique pour chaque message
            $table->unsignedBigInteger('candidat_id'); // ID du candidat lié au message
            $table->text('contenu'); // Contenu du message
            $table->timestamps(); // Ajoute created_at et updated_at

            // Ajout de la clé étrangère pour la relation avec la table des candidats
            $table->foreign('candidat_id')->references('id')->on('candidats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages'); // Supprime la table 'messages' si elle existe
    }
};
