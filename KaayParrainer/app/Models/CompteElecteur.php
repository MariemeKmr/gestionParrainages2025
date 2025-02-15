<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompteElecteur extends Model {
    use HasFactory;

    protected $table = 'comptes_electeurs';
    protected $primaryKey = 'telephone';
    public $incrementing = false;
    protected $fillable = ['email', 'codeAuth', 'codeVerif', 'numFIve', 'dateParrainage', 'status'];

    public function electeur() {
        return $this->hasOne(Electeur::class, 'telephone', 'telephone');}
}
