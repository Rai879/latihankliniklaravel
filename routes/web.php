<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use illuminate\auth\Middleware\Authenticate;
use App\Http\Controllers\PasienController;


// route::resource('matakuliah', MatakuliahController::class);
// Route::get('mahasiswa',[MahasiswaController::class, 'index']);
// Route::get('profil' ,function(){
//     return 'hello world';       
// });
route::middleware(authenticate::class)->group(function(){
    route::resource('pasien', PasienController::class);
    route::resource('daftar', DaftarController::class);
});




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
