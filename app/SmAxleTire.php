<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmAxleTire extends Model
{


    protected $table = 'FYNO.SM_AXLE_TIRES';
    protected $primaryKey = "SMAxleTireID" ;



    /**
		This is for History 
    **/

    /*public function SmTireHistory(){
    	return $this->hasMany(SmtireHistory::class,'SMAxleTire');
    }*/
}
