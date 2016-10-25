<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
class SM extends Model
{
    
    protected $table = 'FYNO.SM';
    protected $primaryKey = "SMID" ;

    public $timestamps = false;
    


    public function Trackers(){
    	return $this->belongsToMany(Tracker::class, "FYNO.SM_TRACKER" , 'SM' , 'Tracker');

    }

    public function groups(){
        return $this->belongsToMany(Group::class, "FYNO.SM_GROUP" , 'SM', 'SMGroup');

    }

     public function corporateStructure(){
        return $this->belongsTo(CorporateStructure::class,'SMCorpStruct');
    }

    public function Trailers(){
        return $this->belongsToMany(Trailer::class, "FYNO.SM_TRAILER"  ,'SM' ,'Trailer')->withPivot('CouplingDate')->wherePivot('CouplingDate','10/10/2010');

    }

    public function SmAxles(){
        return $this->hasMany(SmAxle::class,'SM');
    }



    

   
    /*

    public function customer(){
    	return $this->belongsTo(Customer::class, "Customer");
    }

    public function classes() {
        return $this->belongsTo(Classes::class, 'SmClass');
    }

    public function mark(){
        return $this->belongsto(Mark::class, "SmMark");
    }

   

    public function smUses(){
        return $this->hasMany(SmUses::class,'SM');
    }*/


    

   
}
