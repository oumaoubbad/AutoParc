<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Entretien extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable =['voiture_id', 'tentretien_id', 'prix' ,'date_debut','date_fin','note'];

    public function voiture(){
        return $this->belongsTo(Voiture::class);
    }
    public function tentretien(){
        return $this->belongsTo(Tentretien::class);
    }
   

    public function getRouteKeyName()
    {
        return "id";
    }
}
