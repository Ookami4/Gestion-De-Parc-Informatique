<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Logiciel extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
      'log_nom',
      'log_serie',
      'log_marque',
        'log_license',
      'log_prixachat',
      'log_dateachat',
      'log_garantie',
      'for_id',
        'fac_id',
    ];

    public function facture(){
        return $this->belongsTo(Facture::class, 'fac_id');
    }

    public function fournisseur(){
        return $this->belongsTo(Fournisseur::class, 'for_id');
    }
}
