<?php

namespace App\Models\Admin;

use App\Models\Admin\Td;
use App\Models\Admin\TdSpecial;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant\EtudiantsGroupesTd;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GroupeTd extends Model
{
    use HasFactory;
    protected $fillable=['td_id', 'td_special_id', 'intitule'];

    public function td(){
        return $this->belongsTo(Td::class);
    }
    public function tdSpecial(){
        return $this->belongsTo(TdSpecial::class);
    }
    public function etudiantGroupeTds(){
        return $this->hasMany(EtudiantsGroupesTd::class);
    }
}
