<?php

namespace App\Models;

use App\Models\Operation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voiture extends Model
{
    use HasFactory;
    protected $fillable = [
        'marque',
        'model',
        'couleur',
        'statut'
    ];
    public function operations() {
        return $this->hasMany(Operation::class,'id_v');
    }

    public function images() {
        return $this->hasMany(Image::class,'id_v');
    }


    
}
