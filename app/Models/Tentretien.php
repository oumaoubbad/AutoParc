<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tentretien extends Model
{
    use HasFactory ;
    protected $fillable = [
        'name'
    ];
    public function entretien(){
        return $this->HasMany(Entretien::class);
    }
}
