<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodesParrainge extends Model {
    use HasFactory;

    protected $table = 'periode_parrainages';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['dateDebut','dateFin'];
}
