<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\CorporateStructure;
use DB;
class CorporatesStructureController extends Controller
{
    


    public function getAllCorporateStructure(){

    	$CorporateStructure = CorporateStructure::select('CorpStructID as id','CorpStructLabel as label','CorpStructParent as parentid')->get();

    	return $CorporateStructure;

    }

  
}
