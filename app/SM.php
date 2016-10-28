<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Group;
class SM extends Model
{
    
    protected $table = 'FYNO.SM';
    protected $primaryKey = "SMID" ;

    public $timestamps = false;
    


    public function Smmark(){
        return $this->belongsto(SmMark::class, "SMMark");
    }
    public function SmModel(){
        return $this->belongsTo(SmModel::class,"SMModel");
    }
    public function Smclasse() {
        return $this->belongsTo(SmClasse::class, 'SMClass');
    }
     public function smUses(){
        return $this->hasMany(SmUses::class,'SM')->whereNull('RealToDate');
    }
    public function Trackers(){
    	return $this->belongsToMany(Tracker::class, "FYNO.SM_TRACKER" , 'SM' , 'Tracker');
    }
    public function groups(){
        return $this->belongsToMany(Group::class, "FYNO.SM_GROUP" , 'SM', 'SMGroup');
    }
     public function corporateStructure(){
        return $this->belongsTo(CorporateStructure::class,'SMCorpStruct');
    }

    public function MaturityDates(){
        return $this->hasMany(MaturityDate::class,'SM');
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

    */

    

   

   


    

   
}
