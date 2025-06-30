<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Administratif extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable =['voiture_id','assurance_debut','assurance_expire_le','effectue_le','visite_expire_le','vignet','vignet_expire_le'];

    public function voiture(){
        return $this->belongsTo(Voiture::class);
}
}