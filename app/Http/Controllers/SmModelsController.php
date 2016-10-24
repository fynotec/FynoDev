<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\SMMODEL;
class SmModelsController extends Controller
{
	public function getModels($id = null) 
	{
		if($id == null){
			return SMModel::all();
		}else{
			return SMModel::where('SMMark', $id)->get();
		}
	}
}
