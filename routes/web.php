<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Uploads;
use App\Http\Livewire\Fileins;


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

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/fileins', function () {
    return view('filein');
})->name('fileins');

Route::middleware(['auth:sanctum', 'verified'])->get('/fileouts', function () {
    return view('fileout');
})->name('fileouts');
//  Route::get('/uploads',Uploads::class)->name('Upload');
