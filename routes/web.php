<?php

use App\Http\Livewire\Pos\PosPage;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Setting\SettingPage;
use App\Http\Controllers\PosPrintController;
use App\Http\Livewire\Import\ImportFormPage;
use App\Http\Livewire\Import\ImportListPage;
use App\Http\Livewire\Import\ImportExcelPage;
use App\Http\Livewire\Product\ProductFormPage;
use App\Http\Livewire\Product\ProductListPage;
use App\Http\Livewire\Category\CategoryListPage;
use App\Http\Livewire\Customer\CustomerFormPage;
use App\Http\Livewire\Customer\CustomerListPage;
use App\Http\Livewire\District\DistrictListPage;
use App\Http\Livewire\Employee\EmployeeFormPage;
use App\Http\Livewire\Employee\EmployeeListPage;
use App\Http\Livewire\Province\ProvinceListPage;
use App\Http\Livewire\Supplier\SupplierFormPage;
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
    Route::get('/create',SupplierFormPage::class)->name('create');
    Route::get('/update/{id}',SupplierFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'employees',
    'as' => 'employee.'
],function(){
    Route::get('/',EmployeeListPage::class)->name('list');
    Route::get('/create',EmployeeFormPage::class)->name('create');
    Route::get('/update/{id}',EmployeeFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'customers',
    'as' => 'customer.'
],function(){
    Route::get('/',CustomerListPage::class)->name('list');
    Route::get('/create',CustomerFormPage::class)->name('create');
    Route::get('/update/{id}',CustomerFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'categories',
    'as' => 'category.'
],function(){
    Route::get('/',CategoryListPage::class)->name('list');
});

Route::group([
    'prefix' => 'products',
    'as' => 'product.'
],function(){
    Route::get('/',ProductListPage::class)->name('list');
    Route::get('/create',ProductFormPage::class)->name('create');
    Route::get('/update/{id}',ProductFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'imports',
    'as' => 'import.'
],function(){
    Route::get('/',ImportListPage::class)->name('list');
    Route::get('/create',ImportFormPage::class)->name('create');
    Route::get('/update/{id}',ImportFormPage::class)->name('update');
    Route::get('/excel',ImportExcelPage::class)->name('excel');
});

Route::group([
    'prefix' => 'pos',
    'as' => 'pos.'
],function(){
    Route::get('/',PosPage::class)->name('index');
});

Route::group([
    'prefix' => 'setting',
    'as' => 'setting.'
],function(){
    Route::get('/',SettingPage::class)->name('index');
});

Route::group([
    'prefix' => 'pos/print',
    'as' => 'pos.print.'
],function() {
    Route::get('/slip/{id}',[PosPrintController::class,'printSlip'])->name('slip');
    Route::get('/a4/{id}',[PosPrintController::class,'printa'])->name('a');
});