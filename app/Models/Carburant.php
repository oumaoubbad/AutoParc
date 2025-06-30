<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Carburant extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable =['voiture_id', 'tcarburant_id', 'prix' ,'date','kilom', 'litre','note'];

    public function voiture(){
        return $this->belongsTo(Voiture::class);
    }
    public function tcarburant(){
        return $this->belongsTo(Tcarburant::class);
    }
   

    public function getRouteKeyName()
    {
        return "id";
    }
}
