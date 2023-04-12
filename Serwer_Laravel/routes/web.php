<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\InspectionController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [HomeController::class, 'index'])->name('users.index');

Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');

Route::get('/machines', [MachineController::class, 'index'])->name('machines.index');
Route::get('/machines/create', [MachineController::class, 'create'])->name('machines.create');
Route::post('/machines/store', [MachineController::class, 'store'])->name('machines.store');


Route::group(['middleware' => ['admin']], function () {
     // tutaj umieszczasz trasy, do których ma mieć dostęp tylko super admin
     Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
     Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
     Route::post('/companies/store', [CompanyController::class, 'store'])->name('companies.store');
});

Route::get('/inspections', [InspectionController::class, 'index'])->name('inspections.index');
Route::get('/inspections/create', [InspectionController::class, 'create'])->name('inspections.create');
Route::post('/inspections/store', [InspectionController::class, 'store'])->name('inspections.store');
Route::get('/inspections/get', [InspectionController::class, 'getInspections'])->name('inspections.get');
Route::get('/inspections/edit', [InspectionController::class, 'edit'])->name('inspections.edit');