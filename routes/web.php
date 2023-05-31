<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Freelancer\FreelancerController;
use App\Http\Controllers\Consultant\ConsultantController;
use App\Http\Controllers\Freelancer\CategoryController;
use App\Http\Controllers\Consultant\JobRequestController;
use App\Http\Controllers\Consultant\ConsultantProfileController;
use App\Http\Controllers\Freelancer\FreelancerProfileController;



use App\Http\Controllers\FreeProfileController;
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

Route::get('/consultanthome', [ConsultantController::class, 'index'])->name('consultanthome');
Route::get('/freelancerhome', [FreelancerController::class, 'index'])->name('freelancerhome');
Route::resource("/freelancer/category" , CategoryController::class);
Route::resource("/consultant/jobrequest" , JobRequestController::class);
Route::resource("/consultant/profile" , ConsultantProfileController::class);
Route::resource("/freelancer/profile" , FreelancerProfileController::class);


require __DIR__ . '/auth.php';