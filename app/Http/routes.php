<?php





Route::get('/Equipement/Vehicules/','SmController@index');
Route::get('/Equipement/vehiculesJson','SmController@indexJson');



// Routes for Vehicule Creation 
Route::get('/Equipement/Vehicules/create','SmController@create');
Route::get('/Equipement/Vehicules/getAllCorporateStructure','CorporatesStructureController@getAllCorporateStructure');
Route::get('/Equipement/Vehicules/getAllClasses','SmClassesController@getAllClasses');
Route::get('/Equipement/Vehicules/getAllMarks','SmMarksController@getAllMarks');
Route::get('/Equipement/Vehicules/getModels/{id?}','SmModelsController@getModels');
Route::get('/Equipement/Vehicules/getAllPersons','PersonsController@getPersons');
Route::get('/Equipement/Vehicules/getAllGeoAreas','GeoAreasController@getAllGeoAreas');
Route::post('/Equipement/Vehicules/create','SmController@store');




// Route for Edit

Route::get('/Equipement/Vehicules/edit/','SmController@edit');
Route::get('/Equipement/Vehicules/editJson/{id}','SmController@editJson');
Route::patch('/Equipement/Vehicules/edit','SmController@update');


/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/trailerType' ,function (){
	return App\Trailer::with('TrailerTypes','Axle.tires'));
});

Route::get('/customer',function(){
	return App\Customer::with('CorporateStructure','Tracker.trackerType','supportMedium.trailers.axle.tires')->first();
});

Route::get('/SM' ,function(){
	$roles = App\SupportMedium::first()->trailers()->get(['TrailerID']);
	return $roles;
});

Route::get('/Equipement/Vehicule', 'VehiculesController@index');
Route::get('/Equipement/Vehicule/VehiculesJson', 'VehiculesController@index_json');

*/