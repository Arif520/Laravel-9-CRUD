<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
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

Route::get('/',[CompanyController::class,'index'])->name('all.company');
Route::get('/add-company',[CompanyController::class,'add_company'])->name('add.company');
Route::post('/store-company',[CompanyController::class,'store_company'])->name('store.company');
Route::get('/edit-company/{id}',[CompanyController::class,'edit_company'])->name('edit.company');
Route::post('/update-company/{id}',[CompanyController::class,'update_company'])->name('update.company');
Route::get('/delete-company/{id}',[CompanyController::class,'delete_company'])->name('delete.company');
Route::get('/search', [CompanyController::class,'index'])->name('company.search');

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::middleware(['auth', 'user-access:customer'])->group(function () {
  
    Route::get('/customer/home', [HomeController::class, 'customerHome'])->name('customer.home');
});
