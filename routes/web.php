<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\District\DistrictListPage;
use App\Http\Livewire\Province\ProvinceListPage;
use App\Http\Livewire\Supplier\SupplierListPage;
use App\Http\Livewire\SubDistrict\SubDistrictListPage;

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
    return view('layouts.main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth',"role:admin"])->name('dashboard');

require __DIR__.'/auth.php';

Route::group([
    'prefix' => 'provinces',
    'as' => 'province.'
],function(){
    Route::get('/',ProvinceListPage::class)->name('list');
});

Route::group([
    'prefix' => 'districts',
    'as' => 'district.'
],function(){
    Route::get('/',DistrictListPage::class)->name('list');
});

Route::group([
    'prefix' => 'sub-districts',
    'as' => 'sub.district.'
],function(){
    Route::get('/',SubDistrictListPage::class)->name('list');
});

Route::group([
    'prefix' => 'supplier',
    'as' => 'supplier.'
],function(){
    Route::get('/',SupplierListPage::class)->name('list');
});

