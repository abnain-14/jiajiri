<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Freelancer\FreelancerController;
use App\Http\Controllers\Consultant\ConsultantController;
use App\Http\Controllers\Freelancer\CategoryController;
use App\Http\Controllers\Consultant\JobRequestController;
use App\Http\Controllers\Consultant\ConsultantProfileController;
use App\Http\Controllers\Freelancer\FreelancerProfileController;
use App\Http\Controllers\Freelancer\ApplicationsFreelancerController;
use App\Http\Controllers\Consultant\ApplicationsConsultantController;
use App\Http\Controllers\Consultant\PaymentsController;





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

Route::get('/consultant', [ConsultantController::class, 'index'])->name('consultant');
Route::get('/freelancer', [FreelancerController::class, 'index'])->name('freelancer');
Route::resource("/freelancer/category" , CategoryController::class);
Route::resource("/consultant/jobrequest" , JobRequestController::class);
Route::resource("/freelancer/apply" , ApplicationsFreelancerController::class);
Route::resource("/consultant/apply" , ApplicationsConsultantController::class);
Route::resource("/consultant/profile" , ConsultantProfileController::class);
Route::resource("/consultant/payment" , PaymentsController::class);
Route::resource("/freelancer/profile" , FreelancerProfileController::class);
Route::get('/freelancer/viewjob/{id}', [FreelancerController::class, 'show']);
Route::get('/consultant/viewlancer/{id}', [ConsultantController::class, 'show']);
Route::post('/consultant/payslip/upload/{id}', [ApplicationsConsultantController::class, 'upload']);





require __DIR__ . '/auth.php';