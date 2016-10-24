<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Mark;

class MarksController extends Controller
{
    
   public function getAllMarks(){
   		return Mark::with('SMModels')->get();
   }
}
