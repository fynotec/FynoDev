<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracker extends Model
{
    protected $table = 'FYNO.TRACKERS';
    protected $primaryKey = "TrackerSerialNb" ;

   
    public function TrackerType(){
    	return $this->belongsTo(TrackerType::class,'TrackerType');
    }
}
