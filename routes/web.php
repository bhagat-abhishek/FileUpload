<?php

use App\Http\Controllers\FileList;
use App\Http\Controllers\FileUploader;
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

Route::get('/', function () {
    return view('welcome');
});

// Upload File to Server
Route::post('/upload', [FileUploader::class, 'upload']);

// Store To Database
Route::post('/submit', [FileList::class, 'submit'])->name('submit');