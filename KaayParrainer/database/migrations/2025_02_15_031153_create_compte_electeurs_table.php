<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('comptes_electeurs', function (Blueprint $table) {
            $table->string('telephone', 50)->primary();
            $table->string('email', 50)->unique()->nullable();
            $table->string('codeAuth', 50);
            $table->string('codeVerif', 50);
            $table->string('numFIve', 50)->nullable();
            $table->date('dateParrainage');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('comptes_electeurs');
}
};
