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
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('numero_carte_electeur')->unique();
            $table->string('adresse_email')->unique();
            $table->string('numero_telephone')->unique();
            $table->string('nom_parti_politique')->nullable();
            $table->string('slogan')->nullable();
            $table->string('photo')->nullable();
            $table->string('trois_couleurs_parti')->nullable();
            $table->string('url_page_infos')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
