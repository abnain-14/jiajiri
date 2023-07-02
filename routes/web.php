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
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminConsultantsController;
use App\Http\Controllers\Admin\AdminFreelancersController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminJobRequestsController;
use App\Http\Controllers\Admin\AdminPaymentsController;






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
Route::post('/freelancer/cvupload/{id}', [FreelancerProfileController::class, 'cvupload']);




Route::resource("admin" , DashboardController::class);
Route::resource("manage_consultants" , AdminConsultantsController::class);
Route::resource("manage_freelancers" , AdminFreelancersController::class);
Route::resource("manage_category" , AdminCategoryController::class);
Route::resource("manage_jobs" , AdminJobRequestsController::class);
Route::resource("manage_payments" , AdminPaymentsController::class);
Route::post('/admin/freelancer/cvupload/{id}', [AdminFreelancersController::class, 'cvupload']);






require __DIR__ . '/auth.php';