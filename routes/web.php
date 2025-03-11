<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas para los roles
Auth::routes(['middleware'=>'role.redirect']);

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin', function() {
      return view('admin.dashboard');
   })->name('admin.dashboard');
});
Route::middleware(['auth','role:pasante'])->group(function(){
    Route::get('/pasante', function() {
      return view('pasante.dashboard');
   })->name('pasante.dashboard');
});
Route::middleware(['auth','role:aprendiz'])->group(function(){
    Route::get('/aprendiz', function() {
      return view('aprendiz.dashboard');
   })->name('aprendiz.dashboard');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
