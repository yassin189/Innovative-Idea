<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamRequestDoctor extends Model
{
    public function project(){
        return $this->hasOne('App\Project','id','project_id');
    }
    public function team(){
        return $this->hasOne('App\Team','id','team_id');
    }
}
