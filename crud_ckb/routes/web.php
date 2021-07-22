<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pegawai;
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

Route::get('/pegawai',[Pegawai::class,'index'])->name('pegawai'); 
Route::get('/pegawai/create',[Pegawai::class,'create'])->name('pegawai_create'); 
Route::get('/pegawai/fetch_pegawai',[Pegawai::class,'fetch_pegawai'])->name('fetch_pegawai'); 
Route::post('/pegawai/store',[Pegawai::class,'store'])->name('pegawai_store'); 
Route::get('/pegawai/edit/{id}',[Pegawai::class,'edit'])->name('pegawai_edit'); 
Route::post('/pegawai/update',[Pegawai::class,'update'])->name('pegawai_update');
Route::get('/pegawai/destroy/{id}',[Pegawai::class,'destroy'])->name('pegawai_delete'); 
