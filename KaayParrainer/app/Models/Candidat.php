<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model {
    use HasFactory;

    protected $table = 'candidats';
    protected $primaryKey = 'numCarteElecteur';
    public $incrementing = false;
    protected $fillable = ['numCarteElecteur', 'telephone', 'email', 'nomPartiPolitique', 'slogan', 'photo', 'troisCouleursParti', 'urlPageInfos'];
}

