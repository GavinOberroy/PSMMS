<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;

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



//Manage Profile

//Route::get('/studentProfile','ProfileController@viewStudent'); - version lama x jadi -_-

Route::get('studentProfile',[ProfileController::class, 'viewStudent']);

Route::get('test',[ProfileController::class, 'index']);

/*
Route::get('/studentProfile', function () {
    return view('ManageProfile.studentProfile');
}); */


Route::get('abc', function () {
    return view('ManageTitle.AddTitle');
});


Route::get('/proposal/lecturer',[ ProposalController::class,'showAllSubmittedProposal'])->name('ManageProposal.LecturerProposal');

Route::post('/proposal/{id}/status', [ProposalController::class, 'changeStatus'])->name('ManageProposal.status');

Route::get('/proposal/{id}/detail', [ProposalController::class,'showDetail'])->name("ManageProposal.showDetail");

Route::get('/proposal/create', [ProposalController::class, 'create'])->name('ManageProposal.ProposalForm');

Route::post('/proposal/store', [ProposalController::class, 'store'])->name('proposal.store');

Route::get('/proposal/Memo', [ProposalController::class, 'index'])->name('ManageProposal.Memo');

Route::delete('/contacts/{id}', [ProposalController::class,'destroy'])->name("proposal.destroy");

Route::get('/download/{file}',[ProposalController::class,'download'])->name("proposalDoc.download");

Route::get('/view/{id}',[ProposalController::class,'view'])->name("proposalDoc.view");