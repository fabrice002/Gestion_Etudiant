<?php

namespace App\Models\Admin;

use App\Models\Admin\ChargeTd;
use App\Models\Admin\GroupeTd;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\PresencesSceancesTd;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScienceTd extends Model
{
    use HasFactory;
    protected $fillable=['groupe_td_id', 'charge_td_id', 'intitule', 'description', 'date', 'heureDebut', 'heureFin', 'salle'];

    public function groupeTd(){
        return $this->belongsTo(GroupeTd::class);
    }
    public function chargeTd(){
        return $this->belongsTo(ChargeTd::class);
    }
    public function presenceScienceTds(){
        return $this->hasMany(PresencesSceancesTd::class);
    }
}
