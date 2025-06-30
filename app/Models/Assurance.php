<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Assurance extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable =['voiture_id','assurance_debut','expire_le',];

    public function voiture(){
        return $this->belongsTo(Voiture::class);

}
}