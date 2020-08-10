<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::resource('user', 'UserController');
// Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::get('/', function () {
    return view('welcome');
});
Route::get('offline/',function(){
    return view('vendor/laravelpwa/offline');
});




//Route::view('vistaqr','View_CodigoQR/vistaqr');
Route::get('vistaqr/', 'CodigoQRController@mostrar');
Route::get('vistaqrgen/', 'CodigoQRController@generar');
Route::get('/vistaCodigosQR','CodigoQRController@vistaCodigos')->name('vistaCodigosQR');

Route::get('/pdfTods','PDFController@imprimirTodo')->name('imprimirTodo');

Route::resource('pacientes', 'PacienteController');

/*
Route::resource('pacientes', 'PacienteController',[
    'only'         => ['index',"show","edit","store","update","create", "destroy"],
]);
*/
Route::resource('Ubicacion', 'UbicacionController',[
    'only'         => ['index',"show","edit","store","update","create", "destroy"],
]);
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');


//rutas para la camara
Route::view('capturar', 'View_Camara/capturar');
Route::post('decodificado','CamaraController@readerqr');


//ruta asignar QR
Route::get('asignar/{id}', function ($id) {
    return view('view_Asignados/asignarQr')->withid($id);
});
Route::post('asignado','AsignacionController1@asignar');

Route::get('verAsignados','AsignacionController1@mostrar');


//rutas mapas
Route::view('mapa', 'Ubicacion/mapa');
