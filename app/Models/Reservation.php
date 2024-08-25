<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = [
        'name',
        'position',
        'hall',
        'purpose',
        'contact-num',
        'event-date',
        'start-time',
        'end-time',
        'status'
    ];
}
