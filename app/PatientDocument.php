<?php

namespace App;
use App\Doctor;
use App\User;
use Illuminate\Database\Eloquent\Model;

class PatientDocument extends Model
{
    protected $guarded = [];

    public function doctor() 
    {
    	return $this->belongsTo('App\Doctor');
    }

    public function user() 
    {
    	return $this->belongsTo('App\User', 'upload_by');
    }
}
