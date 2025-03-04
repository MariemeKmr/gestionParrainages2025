<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();  // Colonne 'id' par défaut
            $table->string('subject');  // Sujet du message
            $table->text('content');  // Contenu du message
            $table->unsignedBigInteger('sender_id');  // ID de l'expéditeur
            $table->unsignedBigInteger('receiver_id');  // ID du destinataire
            $table->enum('status', ['sent', 'read', 'archived'])->default('sent');  // Statut du message
            $table->unsignedBigInteger('user_id'); // Ajout de la colonne user_id pour lier le message à l'utilisateur
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Contrainte de clé étrangère avec la table 'users'
            $table->timestamps();  // Colonne created_at et updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
