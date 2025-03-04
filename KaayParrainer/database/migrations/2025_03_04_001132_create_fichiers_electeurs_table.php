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
        Schema::create('fichiers_electeurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('empreinte_sha256');
            $table->timestamp('date_upload');
            $table->string('utilisateur_upload');
            $table->string('adresse_ip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fichiers_electeurs');
    }
};
