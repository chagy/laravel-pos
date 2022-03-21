<?php

use App\Http\Livewire\Pos\PosPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
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
use App\Http\Livewire\Employee\RolePermissionPage;
use App\Http\Livewire\Product\ProductDiscountPage;
use App\Http\Livewire\Promotion\PromotionFormPage;
use App\Http\Livewire\Promotion\PromotionListPage;
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
    'as' => 'province.',
    'middleware' => ['auth','role:admin']
],function(){
    Route::get('/',ProvinceListPage::class)->name('list');
});

Route::group([
    'prefix' => 'districts',
    'as' => 'district.',
    'middleware' => ['auth','role:admin']
],function(){
    Route::get('/',DistrictListPage::class)->name('list');
});

Route::group([
    'prefix' => 'sub-districts',
    'as' => 'sub.district.',
    'middleware' => ['auth','role:admin']
],function(){
    Route::get('/',SubDistrictListPage::class)->name('list');
});

Route::group([
    'prefix' => 'supplier',
    'as' => 'supplier.',
    'middleware' => ['auth','role:admin']
],function(){
    Route::get('/',SupplierListPage::class)->name('list');
    Route::get('/create',SupplierFormPage::class)->name('create');
    Route::get('/update/{id}',SupplierFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'employees',
    'as' => 'employee.',
    // 'middleware' => ['auth','role:admin']
],function(){
    Route::get('/',EmployeeListPage::class)->name('list');
    Route::get('/create',EmployeeFormPage::class)->name('create');
    Route::get('/update/{id}',EmployeeFormPage::class)->name('update');
    Route::get('/role-permission/{id}',RolePermissionPage::class)->name('role.permission');
});

Route::group([
    'prefix' => 'customers',
    'as' => 'customer.',
    'middleware' => ['auth','role:admin']
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
    'as' => 'product.',
    'middleware' => ['auth','permission:import']
],function(){
    Route::get('/',ProductListPage::class)->name('list');
    Route::get('/create',ProductFormPage::class)->name('create');
    Route::get('/update/{id}',ProductFormPage::class)->name('update');
});

Route::group([
    'prefix' => 'imports',
    'as' => 'import.',
    'middleware' => ['auth','role:admin','permission:import']
],function(){
    Route::get('/',ImportListPage::class)->name('list');
    Route::get('/create',ImportFormPage::class)->name('create');
    Route::get('/update/{id}',ImportFormPage::class)->name('update');
    Route::get('/excel',ImportExcelPage::class)->name('excel');
});

Route::group([
    'prefix' => 'pos',
    'as' => 'pos.',
    'middleware' => ['auth','permission:pos']
],function(){
    Route::get('/',PosPage::class)->name('index');
});

Route::group([
    'prefix' => 'setting',
    'as' => 'setting.',
    'middleware' => ['auth','role:admin']
],function(){
    Route::get('/',SettingPage::class)->name('index');
});

Route::group([
    'prefix' => 'pos/print',
    'as' => 'pos.print.',
    'middleware' => ['auth','role:employee|admin']
],function() {
    Route::get('/slip/{id}',[PosPrintController::class,'printSlip'])->name('slip');
    Route::get('/a4/{id}',[PosPrintController::class,'printa'])->name('a');
});

Route::group([
    'prefix' => 'discount',
    'as' => 'discount.',
    'middleware' => ['auth','role:employee|admin']
],function(){
    Route::get('/',ProductDiscountPage::class)->name('list');
});

Route::group([
    'prefix' => 'promotion',
    'as' => 'promotion.',
    'middleware' => ['auth','role:employee|admin']
],function(){
    Route::get('/',PromotionListPage::class)->name('list');
    Route::get('/create',PromotionFormPage::class)->name('create');
    Route::get('/edit/{id}',PromotionFormPage::class)->name('edit');
});

Route::group([
    'prefix' => 'report',
    'as' => 'report.',
    'middleware' => ['auth','role:employee|admin']
],function(){
    Route::get('/day',[ReportController::class,'day'])->name('day.index');
    Route::get('/day/excel',[ReportController::class,'dayExcel'])->name('day.excel');
    Route::get('/day/pdf',[ReportController::class,'dayPdf'])->name('day.pdf');

    Route::get('/month',[ReportController::class,'month'])->name('month.index');
    Route::get('/month/excel',[ReportController::class,'monthExcel'])->name('month.excel');
    Route::get('/month/pdf',[ReportController::class,'monthPdf'])->name('month.pdf');

    Route::get('/year',[ReportController::class,'year'])->name('year.index');
    Route::get('/year/excel',[ReportController::class,'yearExcel'])->name('year.excel');
    Route::get('/year/pdf',[ReportController::class,'yearPdf'])->name('year.pdf');
});