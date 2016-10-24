<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   
    protected $table = 'FYNO.CUSTOMERS';
    protected $primaryKey = "CustomerID" ;


    //protected $hidden = ['Axle' ];


    public function corporateStructures()  {

    	return $this->hasMany(CorporateStructure::class , 'Customer');
    }	

    public function trackers(){
    	return $this->hasMany(Tracker::class , 'Customer');
    }

    public function supportMediums(){
    	return $this->hasMany(SupportMedium::class , 'Customer');
    }

    public function trailers(){
        return $this->hasMany(Trailer::class , 'Customer');
    }
}
