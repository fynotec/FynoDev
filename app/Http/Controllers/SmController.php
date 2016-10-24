<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SM;

class SmController extends Controller
{

    public function index(){

    
    return SM::with("trailers")->whereHas('trailers', function($q){
                        $q->where('TestField', "satttt");
        })->get();
   



        return $sm;
    }
    
    public function indexJson(){

    	return SupportMedium::with('mark.SMModels.vehiculeTypes','classes','trailers.Axle.tires','corporateStructure','smUses.smUses')->get();

    	//return SupportMedium::with('Tracker');
    }


    public function create(){
    	return view('SM.create');
    }


    public function store (Request $request){

    	$sm = new SM;

    	$sm->InactiveDate = $request->WarrantyEnd;

    	$sm->save();
      
    	return back();
    }
}
