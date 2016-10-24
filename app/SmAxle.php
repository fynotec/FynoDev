<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Tire;
class SmAxle extends Model
{

	protected $table = 'FYNO.SM_AXLES';
    protected $primaryKey = "SMAxleID" ;


     /**
     *  Axel Has Many Tires
     *	SM_Axle_Tires Table has Foreign key : SMAxle  
     * 
     */

    public function SmAxleTires()
    {
        return $this->hasMany(SmAxleTire::class , 'SMAxle' );
    }
    
    /**
     *  Axel belongs to a Trailer 
     *	Axel Table has Foreign key : Trailer  
     * 
     */
}
