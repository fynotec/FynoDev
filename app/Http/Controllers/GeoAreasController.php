<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\GeoArea;

class GeoAreasController extends Controller
{
	
   public function getAllGeoAreas(){
   		return GeoArea::select('GeoAreaID','GeoAreaLabel')->get();
   }
}
