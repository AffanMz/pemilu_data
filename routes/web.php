<?php

use App\Http\Controllers\DesaCon;
use App\Http\Controllers\LoginCon;
use App\Http\Controllers\PendudukCon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KecamatanCon;
use App\Http\Controllers\KelurahanCon;

Route::get('/login', [LoginCon::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login/auth', [LoginCon::class, 'login'])->name('login.auth')->middleware('guest');
Route::get('/logout', [LoginCon::class, 'logout'])->name('logout')->middleware('auth');
Route::get('export-penduduk', [PendudukCon::class, 'export'])->name('export.penduduk')->middleware('auth');

Route::get('/', [LoginCon::class, 'showLoginForm'])->name('index');


Route::get('/penduduk' , [PendudukCon::class,'index'])->name('penduduk')->middleware('auth');
Route::post('/penduduk/store' , [PendudukCon::class,'store'])->name('penduduk.store')->middleware('auth');
Route::get('/penduduk/desa/{id}' , [PendudukCon::class,'filltps'])->name('penduduk.filltps')->middleware('auth');
Route::get('/penduduk/all', [PendudukCon::class, 'allpen'])->name('penduduk.allpen')->middleware('auth');
Route::get('/penduduk/search/{id}', [PendudukCon::class, 'search'])->name('penduduk.search')->middleware('auth');
Route::delete('/penduduk/destroy/{id}', [PendudukCon::class, 'destroy'])->name('penduduk.destroy')->middleware('auth');
Route::post('/penduduk/update/{id}', [PendudukCon::class, 'update'])->name('penduduk.update')->middleware('auth');

Route::get('/kecamatan' , [KecamatanCon::class,'index'])->name('kecamatan')->middleware('auth');
Route::post('/kecamatan/store' , [KecamatanCon::class,'store'])->name('kecamatan.store')->middleware('auth');
Route::delete('/kecamatan/destroy/{id}', [KecamatanCon::class, 'destroy'])->name('kecamatan.destroy')->middleware('auth');
Route::post('/kecamatan/update/{id}', [KecamatanCon::class, 'update'])->name('kecamatan.update')->middleware('auth');


Route::get('/desa' , [DesaCon::class,'index'])->name('desa')->middleware('auth');
Route::get('/desa/all' , [DesaCon::class,'alltps'])->name('desa.all')->middleware('auth');
Route::post('/desa/store' , [DesaCon::class,'store'])->name('desa.store')->middleware('auth');
Route::get('/desa/kelurahan/{id}' , [DesaCon::class,'fillkel'])->name('desa.fillkel')->middleware('auth');
Route::delete('/desa/destroy/{id}', [DesaCon::class, 'destroy'])->name('desa.destroy')->middleware('auth');
Route::post('/desa/update/{id}', [DesaCon::class, 'update'])->name('desa.update')->middleware('auth');

Route::get('/kelurahan' , [KelurahanCon::class,'index'])->name('kelurahan')->middleware('auth');
Route::post('/kelurahan/store' , [KelurahanCon::class,'store'])->name('kelurahan.store')->middleware('auth');
Route::get('/kelurahan/kecamatan/{id}', [KelurahanCon::class, 'fillkec'])->name('kelurahan.fillkec')->middleware('auth');
Route::get('/kelurahan/all', [KelurahanCon::class, 'allkel'])->name('kelurahan.allkel')->middleware('auth');
Route::delete('/kelurahan/destroy/{id}', [KelurahanCon::class, 'destroy'])->name('kelurahan.destroy')->middleware('auth');
Route::post('/kelurahan/update/{id}', [KelurahanCon::class, 'update'])->name('kelurahan.update')->middleware('auth');

