<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\titleController;
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

