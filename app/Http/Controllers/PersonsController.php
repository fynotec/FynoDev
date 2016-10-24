<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Person;
use DB;

class PersonsController extends Controller
{
    

   public function getPersons(){


   		$persons = Person::select(['PersonID','PersonName' , 'PersonFirstName'])
   			->orderBy('PersonName', 'asc')
   			->get();

    	foreach ($persons as $person) {	
    		$person->PersonName = $person->PersonName .' '. $person->PersonFirstName;
    	}
   	
   		return $persons;
   }
}
