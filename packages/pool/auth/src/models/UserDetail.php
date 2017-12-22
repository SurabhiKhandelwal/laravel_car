<?php

namespace Pool\Auth\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_detail';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'phone', 'birth_year', 'age', 'notification_to_parents','gender', 'image'];

    public function attributes() {
        return $this->hasOne('Pool\Auth\Models\User', 'id', 'user_id');
    }

}
