<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaturityDate extends Model
{
     

    protected $table = 'FYNO.MATURITY_DATES';
    protected $primaryKey = "MaturityDateID" ;


    public function MaturityDateType()
    {
    	return $this->belongsTo(MaturityDateType::class , 'DateType');
    }

}
