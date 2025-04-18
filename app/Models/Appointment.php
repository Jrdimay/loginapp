<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //

    protected $fillable = [
        'title',
        'author1',
        'author2',
        'author3',
        'author4',
        'author5',
        'date_of_appointment',
    ];
}
