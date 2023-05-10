<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JobRequestController;
use App\Models\Category;

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
Route::resource("/consultant/jobrequest" , JobRequestController::class);
Route::resource("/freelancer/category" , CategoryController::class);
Route::get('/consultant/profile',function () {
    return view('profile.index');
}) ;
Route::get('/freelancer/profile',function () {
    return view('profile.freeindex');
}) ;


require __DIR__ . '/auth.php';