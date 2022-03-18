<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


use App\Http\Livewire\Customers;
use App\Http\Livewire\Tasks;
use App\Http\Livewire\Roles;
use App\Http\Livewire\Users;
use App\Http\Livewire\Cities;
use App\Http\Livewire\Jobs;
use App\Http\Livewire\Leaves;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Reports;
use App\Http\Livewire\Holidays;
use App\Http\Livewire\Services;
use App\Http\Livewire\Voters;


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

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', Dashboard::class)->name('dashboard');

Route::get('customers', Customers::class)->name('customers');

Route::get('roles', Roles::class)->name('roles');

Route::get('users', Users::class)->name('users');

Route::get('services', Services::class)->name('services');

// Route::get('/activities', [Services::class, 'serviceActivities'])->name('activities');

Route::get('voters', Voters::class)->name('voters');

Route::get('cities', Cities::class)->name('cities');

Route::get('reports', Reports::class)->name('reports');

Route::get('import-voters', [HomeController::class, 'index'])->name('import-voters');



 


