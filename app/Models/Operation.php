<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Voiture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'montant','date','id_cl','id_v'
    ];

    public function client(){
        return $this->belongsTo(Client::class,'id_cl');
    }
    public function voiture(){
        return $this->belongsTo(Voiture::class,'id_v');
    }
}
