<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempElecteur extends Model {
    use HasFactory;

    protected $table = 'temp_electeurs';
    protected $primaryKey = 'numTentative';
    public $incrementing = true;
    protected $fillable = ['data', 'adresseIp', 'checksum', 'dateUpload','encodage'] ;
}

