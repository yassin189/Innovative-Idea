<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


	public function user(){
        return $this->hasOne('App\User','id','user_id');
    }
    public function team(){
        return $this->belongsTo('App\Team');
    }

}
