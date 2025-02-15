<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('historique_uploads', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('utilisateurUpload', 50)->nullable();
            $table->date('dateUpload')->nullable();
            $table->string('adresseIp', 50)->nullable();
            $table->string('agentDGE_id', 50);
            $table->foreign('agentDGE_id')->references('id')->on('agents_dge')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('historique_uploads');
}
};;
