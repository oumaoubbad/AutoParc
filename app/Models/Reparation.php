<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reparation extends Model
{
    use HasFactory;
    protected $fillable =['voiture_id', 'treparation_id', 'prix' ,'date_debut','date_fin','note'];

    public function voiture(){
        return $this->belongsTo(Voiture::class);
    }
    public function treparation(){
        return $this->belongsTo(Treparation::class);
    }
   

    public function getRouteKeyName()
    {
        return "id";
    }
}
