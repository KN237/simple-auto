<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'id_v',
    ];
    public function voiture() {
        return $this->belongsTo(Voiture::class,'id_v');
    }

}
