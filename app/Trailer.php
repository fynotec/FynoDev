<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\TrailerTypes;

//use App\Axle;

class Trailer extends Model
{

    protected $table = 'FYNO.TRAILERS';
    protected $primaryKey = "TrailerID" ;
    protected $hidden = ['TrailerType' ];


     /**
     *  Trailer  Belongs to a Trailer Type
     *  Trailer Table has Foreign key : TrailerType  
     * 
     */

    public function TrailerType()
    {
        return $this->belongsTo(TrailerTypes::class , 'TrailerType' );
    }


    


     /**
     *  Trailer Has Many Axles
     *  Axle Table has Foreign key : Trailer
     * 
     */
   /* public function Axle(){
    	return $this->hasMany(Axle::class , 'Trailer');
    }
*/
}
