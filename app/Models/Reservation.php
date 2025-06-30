<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Reservation extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'user_id' , 'voiture_id' ,'date_debut','status' ,'date_fin','direction','region','description'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function voiture(){
        return $this->hasMany(Voiture::class);
    }

}
