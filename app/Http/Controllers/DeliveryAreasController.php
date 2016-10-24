<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\DeliveryArea;

class DeliveryAreasController extends Controller
{
	
   public function getAreaParks(){
   		return DeliveryArea::select('DeliveryAreaID','DeliveryAreaName')->get();
   }
}
