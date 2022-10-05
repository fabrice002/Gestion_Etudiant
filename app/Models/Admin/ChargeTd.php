<?php

namespace App\Models\Admin;

use App\Models\Admin\ScienceTd;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChargeTd extends Model
{
    protected $fillable=['noms', 'telephone', 'email', 'password', ];
    use HasFactory;
    public function scienceTds(){
        return $this->hasMany(ScienceTd::class);
    }
}
