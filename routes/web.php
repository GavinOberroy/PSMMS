<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\titleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;

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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth']], function() {
 
    Route::get('/logout', [HomeController::class,'logout']);
 });

Route::get('/redirects',[HomeController::class,"index"]);

//Manage Supervisor Hunting ------------------------------------------------------------------------------

Route::GET('Supervisor.edit/{id}', [SupervisorController::class,'edit']);

Route::group(['middleware' => ['web']], function () {
    Route::resource('/supervisor','SupervisorController');

    Route::get('supervisorList',[SupervisorController::class,'show']);

    Route::get('supervisorDetail/{id}',[SupervisorController::class,'detail']);//akan masuk ke profile lecturer (alia punya module)

});
//---------------------------------------------------------------------------------------------

Route::get('studentDashboard', function () {
    return view('studentDashboard');
});


Route::get('lecturerDashboard', function () {
    return view('lecturerDashboard');
});



//Title List
Route::get('titleList',[titleController::class,'show']);

//add Title
Route::get('addTitle', function () {
    return view('ManageTitle.addTitle');
});

Route::get('/insert', [titleController::class,'insert']);

//Insert title
Route::post('/addTitle', [titleController::class,'store']);
Route::get('/insert', [titleController::class,'insert']);

//display lecturer project title
Route::get('/lecturerProjectTitle', [titleController::class,'title']);

//display Title by ID
Route::get('/viewTitle/{Title_ID}', [titleController::class,'view']);

//edit Title by ID
Route::get('/editTitle/{Title_ID}', [titleController::class,'edit']);
Route::put('/updateTitle/{Title_ID}', [titleController::class,'update']); 

//Route::delete('/lecturerProjectTitle/{Title_ID}', [titleController::class,'delete']);

// Route::get('/insert', [titleController::class,'insert']);
// Route::get('ManageTitle.lecturerProjectTitle',[ titleController::class,'showAllSubmittedTitle'])->name('ManageTitle.lecturerProjectTitle');
// Route::get('/title/{id}/detail', [titleController::class,'show'])->name("ManageTitle.show");

Route::get('/search',[SupervisorController::class,'search']);

Route::get('lecturerDashboard', function () {
    return view('lecturerDashboard');



//Manage Profile ------------------------------------------------------------------------------

//Route::get('/studentProfile','ProfileController@viewStudent'); - version lama x jadi -_-

Route::get('/studentProfile/{Student_ID}',[ProfileController::class, 'viewStudent']);

Route::get('test',[ProfileController::class, 'index']);

Route::get('/lecturerProfile/{Lecturer_ID}',[ProfileController::class, 'viewLecturer']);

//edit profile route
Route::post('editProfile',[ProfileController::class, 'editProfile'])->name('editProfile');

//delete education route
Route::get('deleteEducation/{id}',[ProfileController::class, 'deleteEducation']);

//edit lecturer education route
Route::post('editEducation',[ProfileController::class, 'editEducation'])->name('editEducation');

//add new lecturer education route
Route::post('addEducation',[ProfileController::class, 'addEducation'])->name('addEducation');




/*
Route::get('/studentProfile', function () {
    return view('ManageProfile.studentProfile');
}); */

Route::get('abc', function () {
    return view('ManageTitle.AddTitle');
});


Route::get('ManageProposal.LecturerProposal',[ ProposalController::class,'showAllSubmittedProposal'])->name('ManageProposal.LecturerProposal');
Route::post('/proposal/{id}/status', [ProposalController::class, 'changeStatus'])->name('ManageProposal.status');

