<?php

namespace App;
use App\Department;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $guarded = []; 


    // public function department() 
    // {
    // 	return $this->hasOne('App\Department');
    // }

    public function department() 
    {
    	return $this->belongsTo('App\Department');
    }
}
