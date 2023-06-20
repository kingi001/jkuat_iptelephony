<?php

use App\Http\Controllers\TelephoneController;
use App\Http\Controllers\CampusController;
use App\Http\Controllers\DepartmentController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[App\Http\Controllers\TelephoneController::class,'landing'])->name('landing');

Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/telephoney',[App\Http\Controllers\TelephoneController::class,'index'])->name('telephone');

// Telephone routes
Route::get('/telephones', [TelephoneController::class, 'index'])->name('telephone.index');
Route::get('/telephones/create', [TelephoneController::class, 'create'])->name('telephone.create');
Route::post('/telephones/store', [TelephoneController::class, 'store'])->name('telephone.store');
Route::get('/telephones/{id}', [TelephoneController::class, 'show'])->name('telephone.show');
Route::get('/telephones/{id}/edit', [TelephoneController::class, 'edit'])->name('telephone.edit');
Route::post('/update/{id}', [TelephoneController::class, 'update'])->name('telephone.update');
Route::delete('/delete/{id}', [TelephoneController::class, 'delete'])->name('telephone.delete');
Route::get('/search', 'App\Http\Controllers\TelephoneController@search')->name('search');

Route::get('/searchextension', 'App\Http\Controllers\TelephoneController@searchext')->name('searchext');

Route::get('/filter', [TelephoneController::class, 'filter'])->name('filter');


//Campus Routes
Route::get('/campuses', [CampusController::class, 'index'])->name('campus.index');
Route::get('/Campus/create', [CampusController::class, 'create'])->name('campus.create');
Route::post('/Campus/store', [CampusController::class, 'store'])->name('campus.store');
Route::get('/Campus/{id}', [CampusController::class, 'show'])->name('campus.show');
Route::get('/Campus/{id}/edit', [CampusController::class, 'edit'])->name('campus.edit');
Route::put('/Campus/{id}/update', [CampusController::class, 'update'])->name('campus.update');
Route::delete('/Campus/{id}/destroy', [CampusController::class, 'destroy'])->name('campus.destroy');
Route::get('/search-campus', 'App\Http\Controllers\CampusController@search')->name('campus.search');


//Department Routes
Route::get('/departments', [DepartmentController::class, 'index'])->name('department.index');
Route::get('/department/create', [DepartmentController::class, 'create'])->name('department.create');
Route::post('/departments/store', [DepartmentController::class, 'store'])->name('department.store');
Route::get('/departments/{id}', [DepartmentController::class, 'show'])->name('department.show');
Route::get('/departments/{id}/edit', [DepartmentController::class, 'edit'])->name('department.edit');
Route::put('/departments/{id}/update', [DepartmentController::class, 'update'])->name('department.update');
Route::delete('/departments/{id}/destroy', [DepartmentController::class, 'destroy'])->name('department.destroy');
Route::get('/search-department', 'App\Http\Controllers\DepartmentController@search')->name('department.search');
