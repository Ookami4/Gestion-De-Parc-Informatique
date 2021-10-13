<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Facture extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'fact_date',
        'prixtotal',
        'for_id',
    ];

    public function materiels(){
        return $this->hasMany(Materiel::class);
    }
    public function logiciels(){
        return$this->hasMany(Logiciel::class);
    }
    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class, 'for_id');
    }
}
