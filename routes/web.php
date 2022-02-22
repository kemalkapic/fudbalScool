<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasaController;
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


Auth::routes();

Route::group([ 'middleware' => 'admin'], function(){
 Route::get('/admin/talenti', [App\Http\Controllers\AdminController::class, 'getTalents'])->name('admin');
 Route::get('/admin/novitalent', [App\Http\Controllers\AdminController::class, 'addTalent'])->name('novitalent');
 Route::post('/admin/novitalent/add', [App\Http\Controllers\AdminController::class, 'addTalentSave'])->name('novitalentadd');
 Route::get('/admin/talenti/destroy/{id}', [App\Http\Controllers\AdminController::class, 'talentDelete'])->name('talentDelete');
 Route::get('/admin/talenti/edit/{id}', [App\Http\Controllers\AdminController::class, 'talentEdit'])->name('talentEdit');
 Route::post('/admin/talenti/update/{id}', [App\Http\Controllers\AdminController::class, 'talentUpdate'])->name('talentUpdate');

 Route::get('/admin/kasa', [App\Http\Controllers\KasaController::class, 'kasa'])->name('kasa');
 Route::get('/admin/kasa/uplata', [App\Http\Controllers\KasaController::class, 'uplata'])->name('uplata');
 Route::post('/admin/kasa/add', [App\Http\Controllers\AdminController::class, 'add'])->name('addKasa');
 Route::get('/admin/kasa/destroy/{id}', [App\Http\Controllers\KasaController::class, 'delete'])->name('delete');

});


Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user')->middleware('user');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin')->middleware('admin');
