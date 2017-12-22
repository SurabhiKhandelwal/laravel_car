<?php

namespace Pool\Ride\Models;

use Illuminate\Database\Eloquent\Model;

class Ride extends Model {

    protected $table = 'ride';
    
    protected $fillable = [
        'user_id',
        'phone',
        'status',
        'description',
        'fare',
        'seats',
        'source',
        'destination',
        'schedule_date'
    ];

}
