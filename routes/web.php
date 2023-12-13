<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RapportsController;
use App\Http\Controllers\IncidentsController;
use App\Http\Controllers\AccidentsController;
use App\Http\Controllers\RapportArch;
use App\Http\Controllers\IncidentArch;
use App\Http\Controllers\AccidentArch;
use App\Http\Controllers\DashboardController;
use Dompdf\Dompdf;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {


    return redirect()->route('dashboard');
});

Route::get('/', function () {
    //return view('home');
    return redirect()->route('dashboard');
});


Route::prefix('is_admin')->middleware(['auth','is_admin'])->group(function(){
    Route::resource('rapports',RapportsController::class);
    Route::resource('incidents',IncidentsController::class);
    Route::resource('accidents',AccidentsController::class);
    Route::resource('rapportsArchive',RapportArch::class);
    Route::resource('incidentsArchive',IncidentArch::class);
    Route::resource('accidentsArchive',AccidentArch::class);
    Route::resource('dashboard',DashboardController::class);
});


Route::get('pdfrapp/{id}','RapportsController@pdf')->name('pdfrapp');
Route::get('pdfinci/{id}','App\Http\Controllers\IncidentsController@pdf')->name('pdfinci');
Route::get('pdfacci/{id}','App\Http\Controllers\AccidentsController@pdf')->name('pdfacci');
Route::get('dashboard',[App\Http\Controllers\DashboardController::class,'index']);
Route::get('/pdfuprapp',function(){
    return view('rapportsArchive.create');
});

Route::get('/pdfupacci',function(){
    return view('accidentsArchive.create');
});

Route::get('/pdfupinci',function(){
    return view('incidentsArchive.create');
});

Route::post('/pdfuprapp',[App\Http\Controllers\RapportArch::class,'store']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('user.logout'); // Modified name
