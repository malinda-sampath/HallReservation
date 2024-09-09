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
        'event_date',
        'start_time',
        'end_time',
        'contact_num',
        'status'
    ];
}


