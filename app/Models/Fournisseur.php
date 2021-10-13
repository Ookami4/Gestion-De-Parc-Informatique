<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Fournisseur extends Model
{
    use HasFactory, Notifiable;

    protected $fournisseur;

    protected $fillable =[
        'for_nom',
        'for_adress',
        'for_zip',
        'for_ville',
        'for_telephone',
        'for_email',
        'for_fax',
        'rib',
    ];

    public function materiels(){
        return $this->hasMany(Materiel::class);
    }
    public function logiciels(){
        return$this->hasMany(Logiciel::class);
    }
}
