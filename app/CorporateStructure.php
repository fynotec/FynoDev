<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorporateStructure extends Model
{
    
    protected $table = 'FYNO.CORPORATE_STRUCTURE';
    protected $primaryKey = "CorpStructID" ;
    

    public function customer(){
    	return $this->belongsTo(Customer::class,'Customer');
    }
}
