<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SmMark;

class SmMarksController extends Controller
{
    
   public function getAllMarks(){
   		return SmMark::with('smModels')->get();
   }
}
