<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('candidats', function (Blueprint $table) {
            $table->string('numCarteElecteur', 50)->primary();
            $table->string('telephone', 50)->unique()->nullable();
            $table->string('email', 50)->nullable();
            $table->string('nomPartiPolitique', 50);
            $table->string('slogan', 50);
            $table->string('photo', 50);
            $table->string('troisCouleursParti', 50)->nullable();
            $table->string('urlPageInfos', 50);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('candidats');
}
};
