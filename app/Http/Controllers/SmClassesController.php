<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use App\Classes;
use DB;
class SmClassesController extends Controller
{
    
    public function getAllClasses(){

    	$classes = DB::table('FYNO.SM_CLASSES')->select('SmClassID as id','SmClassLabel as label','SmClassParent as parentid')->get();;
    	return $classes;
    	
}

}