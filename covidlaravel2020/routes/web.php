<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::get('offline/',function(){
    return view('vendor/laravelpwa/offline');
});




//Route::view('vistaqr','View_CodigoQR/vistaqr');
Route::get('vistaqr/', 'CodigoQRController@mostrar');
Route::get('vistaqrgen/', 'CodigoQRController@generar');


Route::get('/pdfTods','PDFController@imprimirTodo')->name('imprimirTodo');

Route::resource('pacientes', 'PacienteController');

Route::resource('Asignados', 'AsignacionController',[
    'only'         => ['index',"show","edit","store","update","create", "destroy"],
]);
Route::resource('pacientes', 'PacienteController',[
    'only'         => ['index',"show","edit","store","update","create", "destroy"],
]);

