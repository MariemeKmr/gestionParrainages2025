<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('periode_parrainages', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('periode_parrainages');
}
};
