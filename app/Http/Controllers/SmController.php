<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SM;

class SmController extends Controller
{

    public function index(){

    
    $sms = SM::has('trailers')->with('trailers')->get();
   
    return $sms;


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
