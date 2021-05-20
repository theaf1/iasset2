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

Route::get('/computer', 'ClientController@create');
Route::post('/add-computer', 'ClientController@store');
Route::get('/client', 'ClientController@index');
Route::get('/client/{id}','ClientController@edit');
Route::put('/client/{id}/update','ClientController@update');
route::get('client/show/{id}','ClientController@show');

Route::get('/peripherals','PeripheralsController@create');
Route::post('/add-peripheral','PeripheralsController@store');
Route::get('/peripheral', 'PeripheralsController@index');
Route::get('/peripheral/show/{id}', 'PeripheralsController@show');
Route::get('/peripheral/{id}', 'PeripheralsController@edit');
Route::put('peripheral/{id}', 'PeripheralsController@update');

Route::get('/storage', 'StorageperipheralsController@create');
Route::post('/add-sp','StorageperipheralsController@store');
Route::get('/storageperipheral', 'StorageperipheralsController@index');
Route::get('/storageperipheral/show/{id}','StorageperipheralsController@show');
Route::get('/storageperipheral/{id}', 'StorageperipheralsController@edit');
Route::put('/storageperipheral/{id}', 'StorageperipheralsController@update');

Route::get('/network', 'NetworkdeviceController@create');
Route::post('/add-networkdev','Networkdevicecontroller@store');
Route::get('/networkdevices', 'NetworkdeviceController@index');
Route::get('/networkdevices/show/{id}', 'Networkdevicecontroller@show');
Route::get('/networkdevices/{id}', 'NetworkdeviceController@edit');
Route::put('/networkdevices/{id}', 'NetworkdeviceController@update');

Route::get('/ups', 'UpsController@create');
Route::post('/add-ups',"UpsController@store");
Route::get('/upses', 'UpsController@index');
Route::get('/ups/show/{id}','UpsController@show');
Route::get('/ups/{id}', 'Upscontroller@edit');
Route::put('/ups/{id}', 'Upscontroller@update');

Route::get('/ns', 'NetworkedstorageController@create');
Route::post('/add-ns','NetworkedstorageController@store');
Route::get('/networkedstorage', 'NetworkedstorageController@index');
Route::get('/networkedstorage/show/{id}','Networkedstoragecontroller@show');
Route::get('/networkedstorage/{id}', 'Networkedstoragecontroller@edit');
Route::put('/networkedstorage/{id}', 'Networkedstoragecontroller@update');

Route::get('/server','ServerController@create');
Route::post('/add-server','ServerController@store');
Route::get('/servers', 'ServerController@index');
Route::get('/server/show/{id}','ServerController@show');
Route::get('/server/{id}', 'ServerController@edit');
Route::put('/server/{id}/update', 'ServerController@update');
//under development
Route::get('/sectionadmin', 'SectionController@index');
Route::get('/addsection','SectionController@create');
Route::get('/section/edit/{id}','SectionController@edit');
Route::post('/section/update/{id}','SectionController@update');
Route::get('/locationadmin','LocationController@index');
Route::get('/addlocation','LocationController@create');
Route::post('/add-location','LocationController@store');
Route::get('/location/edit/{id}','LocationController@edit');
Route::post('/location/update/{id}','Locationcontroller@update');
Route::get('/clienttypeadmin','ClienttypeController@index');
Route::get('/addclienttype','ClienttypeController@create');
Route::post('/add-clienttype','ClienttypeController@store');
Route::get('/clienttype/edit/{id}','ClienttypeController@edit');
Route::post('/clienttype/update/{id}','ClienttypeController@update');
Route::get('/peripheraltypeadmin','PeripheraltypeController@index');
Route::get('/addperipheraltype','PeripheraltypeController@create');
Route::post('/add-peripheraltype','PeripheraltypeController@store');
Route::get('/peripheraltype/edit/{id}','Peripheraltypecontroller@edit');
Route::post('/peripheraltype/update/{id}','Peripheraltypecontroller@update');
Route::get('/networkconnectionadmin','NetworkConnectionController@index');
Route::get('/addnetworkconnection','NetworkConnectionController@create');
Route::post('/add-networkconnection','NetworkConnectionController@store');
Route::get('/networkconnection/edit/{id}','NetworkConnectionController@edit');
Route::post('/networkconnection/update/{id}','NetworkConnectionController@update');
Route::get('/owneradmin','OwnerController@index');
Route::get('/addowner','OwnerController@create');
Route::post('/add-owner','OwnerController@store');
Route::get('/owner/edit/{id}','OwnerController@edit');
Route::post('/owner/update/{id}','OwnerController@update');
Route::get('/serverroleclassadmin','RoleclassController@index');
Route::get('/addserverrole','RoleclassController@create');
Route::post('add-serverrole','RoleclassController@store');
Route::get('/serverrole/edit/{id}','RoleclassController@edit');
Route::post('/serverrole/update/{id}','RoleclassController@update');
Route::get('/serveropadmin','ServerOsController@index');
Route::get('/addserverop','ServerOsController@create');
Route::post('/add-serverop','ServerOsController@store');
Route::get('serverop/edit/{id}','ServerOsController@edit');
Route::post('serverop/update/{id}','ServerOsController@update');
Route::get('/netsubtypeadmin','NettypeController@index');
Route::get('/addnetsubtype','NettypeController@create');
Route::post('/add-netsubtype','NettypeController@store');
Route::get('/netsubtype/edit/{id}','NettypeController@edit');
Route::post('/netsubtype/update/{id}','NettypeController@update');
Route::get('/assetstatusadmin','Assetstatuscontroller@index');

//Route::post('/client/filter','ClientIndexController@show');
//Route::post('/peripheral/filter','PeripheralsIndexcontroller@show');


Route::get('/','IndexController@index');
Route::get('/reports','ReportController@index');
Route::post('/create-report','ReportController@report'); 
// route to  test views
Route::get('/pdf','PdfController@pdf');
Route::get('/admin', function () {
    return view('adminmenus');
});
