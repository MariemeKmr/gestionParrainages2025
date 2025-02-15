<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('gerer', function (Blueprint $table) {
            $table->unsignedBigInteger('numTentative'); // Correspond à temp_electeurs
            $table->string('agentDGE_id', 50); // Correspond à agents_dge

            // Définition de la clé primaire composite
            $table->primary(['numTentative', 'agentDGE_id']);

            // Clé étrangère vers temp_electeurs
            $table->foreign('numTentative')->references('numTentative')->on('temp_electeurs')->onDelete('cascade');

            // Clé étrangère vers agents_dge (vérifie que la table est bien agents_dge)
            $table->foreign('agentDGE_id')->references('id')->on('agents_dge')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('gerer');
}
};
