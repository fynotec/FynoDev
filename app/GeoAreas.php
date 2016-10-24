<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryArea extends Model
{

    protected $table = 'FYNO.GEO_AREAS';
    protected $primaryKey = "GeoAreaID" ;

    public function GeoAreaType(){
    	return $this->belongsTo(GeoAreaType::class, 'GeoAreaType')
    }

    public function customer(){
    	return $this->belongsTo(Customer::class,'Customer');
    }


}
