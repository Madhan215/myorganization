<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AgenController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DanusController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\SuratkeluarController;



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
// route Authenticate
Route::controller(AuthController::class)->group(function(){
    Route::get('/login','index')->name('login');
    Route::post('/login','Authenticate')->name('auth');
    Route::get('/logout','logout')->name('logout');

});
// Route::get('/',function(){
//     if($user = Auth::user()){
//         return redirect()->route('dashboard');
//     }else{
//         return redirect('login');
//     }
// });

// route Authenticate
// Route::controller(AuthController::class)->group(function(){
//     Route::get('/login','index')->name('login');
//     Route::post('/login','Authenticate')->name('auth');
//     Route::get('/logout','logout')->name('logout');

// });
// Route authenticate end

//Laman Profil FKIP MENGAJAR
Route::get('/',[ProfilController::class,'index'])->name('home');
Route::get('/home',[ProfilController::class,'index']);
Route::get('/profil_fm',[ProfilController::class,'profil'])->name('profil_fm');
Route::get('/departemen_fm',[ProfilController::class,'departemenfm'])->name('departemen_fm');
Route::get('/prestasi',[ProfilController::class,'prestasi'])->name('prestasi');
Route::get('/news',[ProfilController::class,'news'])->name('news');
Route::get('/event',[ProfilController::class,'event'])->name('event');

// Route Admin
Route::get('/dashboard',[AgenController::class,'index'])->middleware('auth')->name('dashboard');
Route::get('/profil',[AgenController::class, 'profil'])->middleware('auth')->name('profil');
Route::get('/agens',[AgenController::class, 'agen'])->middleware('auth')->name('agens');
Route::get('/show/{id}',[AgenController::class, 'show'])->middleware('auth')->name('show');
Route::get('/editPass/{id}',[AgenController::class, 'edit_pass'])->middleware('auth')->name('editPass');
Route::get('/presensi',[AgenController::class, 'presensi'])->middleware('auth')->name('presensi');
Route::get('/search',[AgenController::class, 'search'])->middleware('auth')->name('search');

//Searching
Route::get('/searchinv',[InventarisController::class, 'search'])->middleware('auth')->name('searchinv');
Route::get('/searchagd',[AgendaController::class, 'search'])->middleware('auth')->name('searchagd');

// Route Admin end

Route::resource('inventaris', InventarisController::class);

Route::resource('agen', AgenController::class);

Route::resource('agenda', AgendaController::class);

Route::controller(DanusController::class)->group(function(){
    Route::get('danus','index')->name('danus');
});

Route::controller(SuratmasukController::class)->group(function(){
    Route::get('suratmasuk','index')->name('suratmasuk');
});
Route::controller(SuratkeluarController::class)->group(function(){
    Route::get('suratkeluar','index')->name('suratkeluar');
});

 //Clear route cache
 Route::get('/route-cache', function() {
     Artisan::call('route:cache');
     return 'Routes cache cleared';
 });

 //Clear config cache
 Route::get('/config-cache', function() {
     Artisan::call('config:cache');
     return 'Config cache cleared';
 }); 

 // Clear application cache
 Route::get('/clear-cache', function() {
     Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

 // Clear view cache
 Route::get('/view-clear', function() {
     Artisan::call('view:clear');
     return 'View cache cleared';
 });

 // Clear cache using reoptimized class
 Route::get('/optimize-clear', function() {
     Artisan::call('optimize:clear');
     return 'View cache cleared';
 });