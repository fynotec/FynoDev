<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    
    protected $table = 'FYNO.SM_MARK';
    protected $primaryKey = "SMMarkID" ;


    public function SMModels(){
    	return $this->hasMany(SMModel::class,'SMMark');
    }

}
