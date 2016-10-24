<?php





Route::get('/Equipement/index','SmController@index');
Route::get('/Equipement/vehiculesJson','SmController@indexJson');

Route::get('/Equipement/Vehicules/create','SmController@create');
Route::get('/Equipement/Vehicules/getAllCorporateStructure','CorporatesStructureController@getAllCorporateStructure');
Route::get('/Equipement/Vehicules/getAllClasses','SmClassesController@getAllClasses');
Route::get('/Equipement/Vehicules/getAllMarks','MarksController@getAllMarks');
Route::get('/Equipement/Vehicules/getModels/{id?}','SmModelsController@getModels');
Route::get('/Equipement/Vehicules/getAllPersons','PersonsController@getPersons');
Route::get('/Equipement/Vehicules/getAllAreaPark','DeliveryAreasController@getAreaParks');
Route::post('/Equipement/Vehicules/create','SmController@store');



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