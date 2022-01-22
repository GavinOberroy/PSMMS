<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\LecturerExpertiseController;
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

//Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
 
    Route::get('/logout', [HomeController::class,'logout']);
 });

route::get('/redirects',[HomeController::class,"index"]);

Route::GET('Supervisor.edit/{id}', [SupervisorController::class,'edit']);

Route::group(['middleware' => ['web']], function () {
    Route::resource('/supervisor','SupervisorController');

    Route::get('supervisorList',[SupervisorController::class,'show']);

    Route::get('mana2',[SupervisorController::class,'edit']);

    Route::get('projectTitleList','SupervisorController@title');
});

Route::get('studentDashboard', function () {
    return view('studentDashboard');
});

//Manage Lecturer Expertise//

Route::group(['middleware' => ['web']], function () {
    Route::resource('/expertise','LecturerExpertiseController');
    Route::get('lecturerExpertise',[LecturerExpertiseController::class,'index']);
    Route::get('viewExpertise',[LecturerExpertiseController::class,'show']);
});

Route::get('lecturerExpertise', function () {
    return view('ManageLecturerExpertise.lecturerExpertise');
});

Route::post('/addExpertise',[LecturerExpertiseController::class,'store']);

Route::get('add', function () {
    return view('ManageLecturerExpertise.add');
});

Route::get('edit', function () {
    return view('ManageLecturerExpertise.edit');
});


Route::get('viewExpertise/{Lecturer_ID}',[LecturerExpertiseController::class,'detail']); 

Route::post('/addTitle', [titleController::class,'store']);
Route::get('/insert', [titleController::class,'insert']);





