<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Employe extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable =['nom', 'prenom','image', 'email', 'adr' ,'tel','CIN', 'num_permis' ,'fonction_id'];

    public function fonction(){
        return $this->belongsTo(Fonction::class);
    }
    
}
