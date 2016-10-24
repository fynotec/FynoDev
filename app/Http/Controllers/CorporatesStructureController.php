<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CorporateStructure;
use DB;
class CorporatesStructureController extends Controller
{
    


    public function getAllCorporateStructure(){

    	$CorporateStructure = DB::table('FYNO.CORPORATE_STRUCTURE')->select('CorporateStructureID as id','CorporateStructureLabel as label','CorporateStructureParent as parentid')->get();

    	return $CorporateStructure;

    }

  
}
