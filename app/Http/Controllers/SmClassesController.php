<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\SmClasse;
use DB;

class SmClassesController extends Controller
{
    
    public function getAllClasses(){

    	$classes = SmClasse::select('SMClassID as id','SMClassLabel as label','SMClassParent as parentid')->get();;
    	return $classes;
    	
	}

}