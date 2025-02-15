<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('temp_electeurs', function (Blueprint $table) {
            $table->id('numTentative');
            $table->binary('data');
            $table->string('adresseIp', 50)->nullable();
            $table->string('checksum', 50)->nullable();
            $table->date('dateUpload')->nullable();
            $table->string('encodage', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('temp_electeurs');
}
};
