<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = [
        'name',
        'position',
        'hall',
        'purpose',
        'contact_num',
        'event_date',
        'start_time',
        'end_time',
        'status',
        'insert_date',
        'update_date'
    ];
}
