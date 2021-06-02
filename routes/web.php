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

//admin
Route::get('/admin/assetstatusadmin','AssetstatusController@index');
Route::get('/admin/addassetstatus','AssetstatusController@create');
Route::post('/admin/add-assetstatus','AssetstatusController@store');
Route::get('/admin/assetstatus/edit/{id}','AssetstatusController@edit');
Route::post('/admin/assetstatus/update/{id}','AssetstatusController@update');
Route::get('/admin/sectionadmin', 'SectionController@index');
Route::get('/admin/addsection','SectionController@create');
Route::post('/admin/add-section', 'SectionController@store');
Route::get('/admin/section/edit/{id}','SectionController@edit');
Route::post('/admin/section/update/{id}','SectionController@update');

Route::get('/admin/buildingadmin','BuildingController@index');
Route::get('/admin/addbuilding','BuildingController@create');
Route::post('/admin/add-building','BuildingController@store');
Route::get('/admin/building/edit/{id}','BuildingController@edit');
Route::post('/admin/building/update/{id}','BuildingController@update');
Route::get('/admin/owneradmin','OwnerController@index');
Route::get('/admin/addowner','OwnerController@create');
Route::post('/admin/add-owner','OwnerController@store');
Route::get('/admin/owner/edit/{id}','OwnerController@edit');
Route::post('/admin/owner/update/{id}','OwnerController@update');
Route::get('/admin/positionadmin','PositionController@index');
Route::get('/admin/addposition','PositionController@create');
Route::post('/admin/add-position','PositionController@store');
Route::get('/admin/position/edit/{id}','PositionController@edit');
Route::post('/admin/position/update/{id}','PositionController@update');
Route::get('/admin/assetusestatusadmin','AssetusestatusController@index');
Route::get('/admin/addassetusestatus','AssetusestatusController@create');
route::post('/admin/add-assetusestatus','AssetusestatusController@store');
Route::get('/admin/assetusestatus/edit/{id}','AssetusestatusController@edit');
Route::post('/admin/assetusestatus/update/{id}','AssetusestatusController@update');
Route::get('/admin/clienttypeadmin','ClienttypeController@index');
Route::get('/admin/addclienttype','ClienttypeController@create');
Route::post('/admin/add-clienttype','ClienttypeController@store');
Route::get('/admin/clienttype/edit/{id}','ClienttypeController@edit');
Route::post('/admin/clienttype/update/{id}','ClienttypeController@update');
Route::get('/admin/clientopadmin','ClientOpController@index');
Route::get('/admin/addclientop','ClientOpController@create');
Route::post('/admin/add-clientop','ClientOpController@store');
Route::get('/admin/clientop/edit/{id}','ClientOpController@edit');
Route::post('/admin/clientop/update/{id}','ClientOpController@update');
Route::get('/admin/networkconnectionadmin','NetworkConnectionController@index');
Route::get('/admin/addnetworkconnection','NetworkConnectionController@create');
Route::post('/admin/add-networkconnection','NetworkConnectionController@store');
Route::get('/admin/networkconnection/edit/{id}','NetworkConnectionController@edit');
Route::post('/admin/networkconnection/update/{id}','NetworkConnectionController@update');
Route::get('/admin/peripheraltypeadmin','PeripheraltypeController@index');
Route::get('/admin/addperipheraltype','PeripheraltypeController@create');
Route::post('/admin/add-peripheraltype','PeripheraltypeController@store');
Route::get('/admin/peripheraltype/edit/{id}','Peripheraltypecontroller@edit');
Route::post('/admin/peripheraltype/update/{id}','Peripheraltypecontroller@update');
//under development

Route::get('/admin/locationadmin','LocationController@index');
Route::get('/admin/addlocation','LocationController@create');
Route::post('/admin/add-location','LocationController@store');
Route::get('/admin/location/edit/{id}','LocationController@edit');
Route::post('/admin/location/update/{id}','Locationcontroller@update');




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

Route::get('/batterytypeadmin','BatteryController@index');
Route::get('/addbatterytype','BatteryController@create');
Route::post('/add-batterytype','BatteryController@store');
Route::get('/batterytype/edit/{id}','BatteryController@edit');
Route::post('/batterytype/update/{id}','BatteryController@update');




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
