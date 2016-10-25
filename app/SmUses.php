<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmUses extends Model
{
    protected $table = 'FYNO.SM_USES';
    protected $primaryKey = "SMUseID" ;

    public function smUses(){
    	return $this->belongsTo(CorporateStructure::class,'TenantCorpStruct');
    }
}




