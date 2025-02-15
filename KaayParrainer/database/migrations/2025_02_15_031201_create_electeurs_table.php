<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('electeurs', function (Blueprint $table) {
            $table->string('numeroCarteElecteur', 100)->primary();
            $table->string('numeroCarteIdentite', 50)->unique()->nullable();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->bigInteger('numeroBureauVote');
            $table->date('dateNaissance');
            $table->string('lieuNaissance', 50);
            $table->enum('sexe', ['Masculin', 'Féminin']);
            $table->string('telephone', 50)->unique()->nullable();
            $table->foreign('telephone')->references('telephone')->on('comptes_electeurs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('electeurs');
}
};
