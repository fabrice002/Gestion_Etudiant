<?php

namespace App\Models\Admin;

use App\Models\Admin\ScienceTd;
use App\Models\Etudiant\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PresencesSceancesTd extends Model
{
    use HasFactory;
    protected $fillable=['etudiant_id', 'science_td_id', 'status'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
    public function scienceTd(){
        return $this->belongsTo(ScienceTd::class);
    }
}
