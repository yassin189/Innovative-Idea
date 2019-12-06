<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    // Table Name
    protected $table = 'projects';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;


    public function user(){
        return $this->belongsTo('App\User');
    }
}
