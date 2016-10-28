<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SM;

use App\MaturityDate;

class SmController extends Controller
{


    public function index(){
        //$sms = SM::has('trailers')->with('trailers')->get();
        return view('SM.index');
    }
    
    public function indexJson(){
    	return SM::with('Smmark.SmModels','Smclasse','corporateStructure','smUses.locataire')->get();	
    }


    public function create(){
    	return view('SM.create');
    }


    public function store (Request $request){

    	$sm = new SM;

        $sm->SMCorpStruct = $request->SmCorpStruct;
        $sm->SMClass = $request->SmClass;
        $sm->SMMark = $request->SmMark;
        $sm->SMModel = $request->SmModel;
        $sm->SMIdentification = $request->SupportMediumIdentification;
        $sm->ShortCode = $request->ICode;
        $sm->CounterType = $request->CounterType;
        $sm->DefaultDriver = $request->DriverID;
        $sm->SMStatus = $request->SmStatus;
        $sm->FuelType = $request->FuelType;
        $sm->RefuelQuantiyAlert = $request->RefuelQuantiyAlert;
        $sm->ParkingArea = $request->ParkingAreaLabel;
        $sm->WorkingArea = $request->WorkingAreaLabel;
        $sm->LineColor = $request->LineColor;
        $sm->ServiceStartDate = $request->ServiceStartDate;
        $sm->VehicleComment = $request->VehicleComment;
        
        $sm->save();


        $lastInsertedId = $sm->SMID;
        
        $maturityDate = new MaturityDate;



            $data = array(
                    array('SM'=> $lastInsertedId , 'DateValue'=> $request->Insurance ,'DateType' =>0 ),
                    array('SM'=> $lastInsertedId , 'DateValue'=> $request->TechnicalVisit ,'DateType' =>1),
                    array('SM'=> $lastInsertedId , 'DateValue'=> $request->DriveAuthorization ,'DateType' =>2 ),
                    array('SM'=> $lastInsertedId , 'DateValue'=> $request->Extinguisher ,'DateType' =>3 ),
                    array('SM'=> $lastInsertedId , 'DateValue'=> $request->MInsurance ,'DateType' =>4),
                    array('SM'=> $lastInsertedId , 'DateValue'=> $request->TaquigraphControl ,'DateType' =>5),
                    array('SM'=> $lastInsertedId , 'DateValue'=> $request->WarrantyEnd ,'DateType' =>6),
                
                );

        MaturityDate::insert($data);
        
    	\Session::flash('SuccessSm','Your Support Medium has been created');
      
    	return back();
    }


    public function editJson($id){

        $sm = SM::with('Smmark.SmModels','Smclasse','SmModel','corporateStructure','smUses.locataire','maturityDates')->findOrfail($id);
         return $sm;
    }
    public function edit($id){
    
        return view('SM.edit',compact('id'));
       
    }

    public function update(Request $request, $id){

        

        $sm = SM::find($id);

        $sm->SMCorpStruct = $request->SmCorpStruct;
        $sm->SMClass = $request->SmClass;
        $sm->SMMark = $request->SmMark;
        $sm->SMModel = $request->SmModel;
        $sm->SMIdentification = $request->SupportMediumIdentification;
        $sm->ShortCode = $request->ICode;
        $sm->CounterType = $request->CounterType;
        $sm->DefaultDriver = $request->DriverID;
        $sm->SMStatus = $request->SmStatus;
        $sm->FuelType = $request->FuelType;
        $sm->RefuelQuantiyAlert = $request->RefuelQuantiyAlert;
        $sm->ParkingArea = $request->ParkingAreaLabel;
        $sm->WorkingArea = $request->WorkingAreaLabel;
        $sm->LineColor = $request->LineColor;
        $sm->ServiceStartDate = $request->ServiceStartDate;
        $sm->VehicleComment = $request->VehicleComment;
            
      //  $sm->save();
        \Session::flash('SuccessSm','Your Support Medium has been updated');


        
        MaturityDate::where('SM', $id)->where('DateType', 1)
            ->update(['DateValue' => $request->TechnicalVisit]);
        MaturityDate::where('SM', $id)->where('DateType', 2)
            ->update(['DateValue' => $request->DriveAuthorization]);
        MaturityDate::where('SM', $id)->where('DateType', 3)
            ->update(['DateValue' => $request->Extinguisher]);
        MaturityDate::where('SM', $id)->where('DateType', 4)
            ->update(['DateValue' => $request->MInsurance]);
        MaturityDate::where('SM', $id)->where('DateType', 5)
            ->update(['DateValue' => $request->TaquigraphControl]);
        MaturityDate::where('SM', $id)->where('DateType', 6)
            ->update(['DateValue' => $request->WarrantyEnd]);


        return back();
    }



}
