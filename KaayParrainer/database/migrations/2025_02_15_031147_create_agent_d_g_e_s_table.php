<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('agents_dge', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('nom', 50);
            $table->string('prenom', 50);
            $table->string('email', 50)->unique();
            $table->string('motDePasse', 255);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('agents_dge');
}
};
