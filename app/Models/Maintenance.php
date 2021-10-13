<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Maintenance extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'maint_description',
        'maint_type',
        'util_id',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class, 'util_id');
    }
}
