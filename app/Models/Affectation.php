<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Affectation extends Model
{
    use HasFactory  , SoftDeletes;
    protected $fillable = [
         'reservation_id' 
    ];
    
    public function reservation(){
        return $this->hasMany(Reservation::class);
    }
}
