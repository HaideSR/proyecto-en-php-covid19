<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::resource('user', 'UserController');
Route::get('/imprimir', 'imprimirController@imprimir')->name('imprimir');
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
Route::get('/imprimirReporte','PDFController@imprimirReporte');
//Route::resource('pacientes', 'PacienteController');
//URL pacientes y asignacion
Route::post('asignarUbicacionPaciente','PacienteController@asignarUbicacion');


Route::resource('pacientes', 'PacienteController',[
    'only'         => ['index',"show","edit","store","update","create", "destroy"],
]);

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

Route::get('asignarUbicacion/{id}', function ($id) {
    return view('pacientes/asignarUbicacion')->withid($id);
});





//REPORTESSSS
Route::get('ReporteHoy', 'ReportesController@reportesHoy');
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('ubicTodos', 'ReportesController@ubicacionMapa');
