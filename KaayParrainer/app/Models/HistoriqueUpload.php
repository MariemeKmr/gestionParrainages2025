<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoriqueUpload extends Model {
    use HasFactory;

    protected $table = 'historique_uploads';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['utilisateurUpload', 'dateUpload', 'adresseIp', 'agentDGE_id'];

    public function agentDGE() {
        return $this->belongsTo(AgentDGE::class, 'agentDGE_id','id');}
}
