<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Materiel extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'mat_serie',
        'mat_nom',
        'mat_prixachat',
        'mat_dateachat',
        'mat_model',
        'mat_garantie',
        'for_id',
        'fac_id',
    ];

    public function facture(){
        return $this->belongsTo(Facture::class,'fac_id');
    }
    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class, 'for_id');
    }
}
