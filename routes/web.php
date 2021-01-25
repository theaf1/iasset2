<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// route to  system views
// Route::get('/', function () {
//     return view('index');
// });

// room automation script by Nongnapat
Route::get('/rooms', function() {
    $rooms = \App\Room::with(['location' => function($query) {
                            $query->with('building');
                        }])
                        ->where('name', 'like', '%' . request()->input('name') . '%')
                        ->get();
    return $rooms;
});
//database operations
Route::post('/store', 'SectionController@store');

Route::get('/computer', 'ClientController@index');
Route::post('/add-computer', 'ClientController@store');
Route::get('/client', 'ClientIndexController@index');
Route::get('/client/{id}','ClientController@edit');
Route::put('/client/{id}/update','ClientController@update');
route::get('client/show/{id}','ClientController@show');


Route::get('/peripherals','PeripheralsController@index');
Route::post('/add-peripheral','PeripheralsController@store');
Route::get('/peripheral', 'PeripheralsIndexController@index');
Route::get('/peripheral/show/{id}', 'PeripheralsController@show');
Route::get('/peripheral/{id}', 'PeripheralsController@edit');
Route::put('peripheral/{id}', 'PeripheralsController@update');

Route::get('/storage', 'StorageperipheralsController@index');
Route::post('/add-sp','StorageperipheralsController@store');
Route::get('/storageperipheral', 'StorageperipheralsIndexController@index');
Route::get('/storageperipheral/show/{id}','StorageperipheralsController@show');
Route::get('/storageperipheral/{id}', 'StorageperipheralsController@edit');
Route::put('/storageperipheral/{id}', 'StorageperipheralsController@update');

Route::get('/network', 'NetworkdeviceController@index');
Route::post('/add-networkdev','Networkdevicecontroller@store');
Route::get('/networkdevices', 'NetworkdeviceIndexController@index');
Route::get('/networkdevices/show/{id}', 'Networkdevicecontroller@show');
Route::get('/networkdevices/{id}', 'NetworkdeviceController@edit');
Route::put('/networkdevices/{id}', 'NetworkdeviceController@update');

Route::get('/ups', 'UpsController@index');
Route::post('/add-ups',"UpsController@store");
Route::get('/upses', 'UpsIndexController@index');
Route::get('/ups/{id}', 'Upscontroller@edit');
Route::put('/ups/{id}', 'Upscontroller@update');

Route::get('/ns', 'NetworkedstorageController@index');
Route::post('/add-ns','NetworkedstorageController@store');
Route::get('/networkedstorage', 'NetworkedstorageIndexController@index');
Route::get('/networkedstorage/show/{id}','Networkedstoragecontroller@show');
Route::get('/networkedstorage/{id}', 'Networkedstoragecontroller@edit');
Route::put('/networkedstorage/{id}', 'Networkedstoragecontroller@update');

Route::get('/server','ServerController@index');
Route::post('/add-server','ServerController@store');
Route::get('/servers', 'ServerIndexController@index');
Route::get('/server/show/{id}','ServerController@show');
Route::get('/server/{id}', 'ServerController@edit');
Route::put('/server/{id}/update', 'ServerController@update');
//under development
Route::get('/admin', 'SectionController@index');
Route::get('/search', 'SearchController@index');
Route::post('/search-query', 'IndexController@search');
// Route::post('/search-query', function () {
//     return 'null';
// });
//Route::post('/client/filter','ClientIndexController@show');
Route::post('/peripheral/filter','PeripheralsIndexcontroller@show');
Route::get('/ups/show/{id}','UpsController@show');

Route::get('/','IndexController@index');
Route::get('/reports','ReportController@index');
// route to  test views
//Route::get('/reports', function () {
//    return view('reports');
//});