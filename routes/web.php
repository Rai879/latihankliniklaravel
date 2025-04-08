<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\PasienController;


// route::resource('matakuliah', MatakuliahController::class);
// Route::get('mahasiswa',[MahasiswaController::class, 'index']);
// Route::get('profil' ,function(){
//     return 'hello world';       
// });


route::resource('pasien', PasienController::class);


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
