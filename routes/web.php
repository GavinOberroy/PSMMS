<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\LogbookController; // LogbookController is controller name
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

//LOGBOOK-pergi ke page mana

Route::get('/AddProgress', function () {
    return view('ManageLogbook.AddProgress');
});

Route::post('/AddProgress', [LogbookController::class, 'store']);

Route::get('ViewProgress',  [LogbookController::class, 'show']);


// Route::get('ViewProgress', function () {
//     return view('ManageLogbook.ViewProgress');
// });

Route::get('GenerateLogbook', function () {
    return view('ManageLogbook.GenerateLogbook');
});

Route::get('/showUpdated',  [LogbookController::class, 'showUpdatedLog']);

Route::get('/viewAdded',  [LogbookController::class, 'showUpdatedLog']);
//Insert Logbook
// Route::put('/AddProgress', 'LogbookController@store');

//Display logbook based on lecturer_ID
Route::get('logbook', [LogbookController::class,'displayLogbook']);
//display lecturer logbook
Route::get('/ApproveLogbook/{Logbook_ID}', [LogbookController::class,'showLogbook']);

// Route::get('/AddProgress', function () {
//     return view('ManageLogbook.AddProgress');
// });

// edit logbook
Route::put('/updateProgress/{Logbook_ID}', [LogbookController::class,'update']);    
Route::get('/editProgress/{Logbook_ID}', [LogbookController::class,'edit']); 
