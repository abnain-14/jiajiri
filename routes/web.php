<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::Routes();

Route::get('/consultanthome', [App\Http\Controllers\ConsultantController::class, 'index'])->name('consultanthome');
Route::get('/freelancerhome', [App\Http\Controllers\FreelancerController::class, 'index'])->name('freelancerhome');


require __DIR__ . '/auth.php';