<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Accessoire extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
      'acc_nom',
      'acc_marque',
      'acc_quantite',
    ];
}
