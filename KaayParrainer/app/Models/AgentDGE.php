<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AgentDGE extends Authenticatable
{
    use HasFactory;

    protected $table = 'agentDGE';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'nom', 'prenom', 'email', 'motDePasse'];
}