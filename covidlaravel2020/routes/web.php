<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/pdfTods','PDFController@imprimirTodo')->name('imprimirTodo');

Route::resource('pacientes', 'PacienteController',[
    'only'         => ['index',"show","edit","store","update","create", "destroy"],
]);

Route::resource('Ubicacion', 'UbicacionController',[
    'only'         => ['index',"show","edit","store","update","create", "destroy"],
]);
// Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
