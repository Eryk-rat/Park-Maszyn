<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
Route::post('/employees/store', [EmployeeController::class, 'store'])->name('employees.store');


Route::get('/machines/create', [MachineController::class, 'create'])->name('machines.create');
Route::get('/machines/store', [MachineController::class, 'store'])->name('machines.store');


Route::group(['middleware' => ['admin']], function () {
     // tutaj umieszczasz trasy, do których ma mieć dostęp tylko super admin
     Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create');
     Route::get('/companies/index', [CompanyController::class, 'index'])->name('companies.index');
});