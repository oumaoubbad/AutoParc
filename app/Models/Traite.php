<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Traite extends Model
{
    use HasFactory  , SoftDeletes;
    protected $fillable =['mois_reste', 'jour_traite', 'date_achat', 'prix_achat' ,'montant_avance','voiture_id'];
    public function voiture(){
        return $this->belongsTo(Voiture::class);
    }
}
