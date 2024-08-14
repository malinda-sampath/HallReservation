<?php

namespace App\Models;

//     protected $table = 'table1';


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Table1 extends Model
{
    protected $table = 'table1';
    use HasFactory;

    protected $fillable = [
        'hall_id',
        'level',
        'subject_id',
        'date',
        'start_time',
        'end_time',
        'is_visible',
        'message',
        'insert_date',
        'update_date'
    ];
}

