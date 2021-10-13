<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Machine extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'mach_nom',
        'mach_marque',
        'mach_RAM',
        'mach_ROM',
        'mach_CPU',
        'mach_carte_reseau',
        'affectter' => 'required',
        'date_affect',
        'lieu_affect',
        'util_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'util_id');
    }
}
