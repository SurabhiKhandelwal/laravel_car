<?php namespace Pool\Ride\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model {

    protected $table = 'car_detail';
    
    protected $fillable = ['registration_number', 'number_plate', 'brand', 'model_name', 'user_id'];
    
    public $timestamps = false;
    
}