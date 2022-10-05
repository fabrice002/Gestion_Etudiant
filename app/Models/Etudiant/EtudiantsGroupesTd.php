<?php

namespace App\Models\Etudiant;

use App\Models\Admin\GroupeTd;
use App\Models\Etudiant\Etudiant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EtudiantsGroupesTd extends Model
{
    use HasFactory;
    protected $fillable=['etudiant_id', 'groupe_td_id'];

    public function etudiant(){
        return $this->belongsTo(Etudiant::class);
    }
    public function groupeTd(){
        return $this->belongsTo(GroupeTd::class);
    }
}
