<?php

namespace App;
use App\Doctor;
use App\Department;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded = [];

    public function doctor() 
    {
    	return $this->belongsTo('App\Doctor');
    }

    public function department()
    {
    	return $this->belongsTo('App\Department', 'depertment_id');
    }
}
