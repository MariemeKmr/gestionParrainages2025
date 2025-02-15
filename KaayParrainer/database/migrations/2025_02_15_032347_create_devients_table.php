<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('devient', function (Blueprint $table) {
            $table->string('numeroCarteElecteur', 100);
            $table->unsignedBigInteger('numTentative');

            // Définition de la clé primaire composite
            $table->primary(['numeroCarteElecteur', 'numTentative']);

            // Définition des clés étrangères
            $table->foreign('numeroCarteElecteur')->references('numeroCarteElecteur')->on('electeurs')->onDelete('cascade');
            $table->foreign('numTentative')->references('numTentative')->on('temp_electeurs')->onDelete('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('devient');
}
};
