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
        'image',
        'statut'
    ];
    public function operations() {
        return $this->hasMany(Operation::class,'id_v');
    }

    
}
