<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmMark extends Model
{
    
    protected $table = 'FYNO.SM_MARKS';
    protected $primaryKey = "SMMarkID" ;


    public function SmModels()
    {
    	return $this->hasMany(SmModel::class,'SMMark');
    }

   

}
