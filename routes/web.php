<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupervisorController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\LecturerExpertiseController;
use App\Http\Controllers\titleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProposalController;


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



//Manage Supervisor Hunting Route - Afif-----------------------------------------------------------------------------

Route::group(['middleware' => ['web']], function () {
    Route::resource('/supervisor','SupervisorController');

    Route::get('supervisorList',[SupervisorController::class,'show']);

    Route::get('/search',[SupervisorController::class,'search']);

    Route::get('viewLectDetail/{Lecturer_ID}',[ProfileController::class,'lecturerDetail']);

    Route::get('ProposalForm', function () {
        return view('ManageProposal.ProposalForm');
    });
});
//---------------------------------------------------------------------------------------------

//GET STUDENT PROFILE IMAGE ON DASHBOARD
Route::get('studentDashboard',[HomeController::class,'showStudent']);

Route::get('lecturerDashboard',[HomeController::class,'showLecturer']);

Route::get('lecturerDashboard', function () {
    return view('lecturerDashboard');

});

//Manage Logbook Route - Nureen -----------------------------------------------------------------------------

Route::get('/AddProgress', function () {
    return view('ManageLogbook.AddProgress');
});

Route::post('/AddProgress', [LogbookController::class, 'store']);
Route::get('GenerateLogbook', function () {
    return view('ManageLogbook.GenerateLogbook');
});
//////
Route::get('/showUpdated',  [LogbookController::class, 'showUpdatedLog']); //ok

Route::get('/viewAdded',  [LogbookController::class, 'showUpdatedLog']);
// Route::put('/AddProgress', 'LogbookController@store');


//Display logbook based on lecturer_ID
Route::get('logbook', [LogbookController::class,'showUpdatedLog']);
//display lecturer logbook
Route::get('/ApproveLogbook/{Logbook_ID}', [LogbookController::class,'showLogbook']);

Route::get('superviseeLogbook',  [LogbookController::class, 'displayLogbook']);

Route::get('approveLogbook/{Logbook_ID}',  [LogbookController::class, 'updateStatusApprove']);
//     return view('ManageLogbook.AddProgress');
// });

// edit logbook
Route::put('/updateProgress/{Logbook_ID}', [LogbookController::class,'update']); 

Route::get('/editProgress/{Logbook_ID}', [LogbookController::class,'edit']); 

Route::get('lecturerDashboard', function () {
    return view('lecturerDashboard');
});

//Manage Title Route - Nabilah -----------------------------------------------------------

//Title List for display at student page
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

//update Title by ID
Route::put('/updateTitle/{Title_ID}', [titleController::class,'update']);

Route::get('/viewUpdatedTitle', [titleController::class,'title']);  

//delete Title by ID
Route::get('/deleteTitle/{Title_ID}', [titleController::class,'destroy']);

Route::put('book', [titleController::class,'bookTitle']);

Route::get('book', function () {
    return view('ManageProposal.ProposalForm');
});

//Route::delete('/lecturerProjectTitle/{Title_ID}', [titleController::class,'delete']);

// Route::get('/insert', [titleController::class,'insert']);
// Route::get('ManageTitle.lecturerProjectTitle',[ titleController::class,'showAllSubmittedTitle'])->name('ManageTitle.lecturerProjectTitle');
// Route::get('/title/{id}/detail', [titleController::class,'show'])->name("ManageTitle.show");

//------------------------------------------------------------------------------------


//Manage Profile Route - Alia -----------------------------------------------------------

//Route::get('/studentProfile','ProfileController@viewStudent'); - version lama x jadi -_-

Route::get('/studentProfile/{Student_ID}',[ProfileController::class, 'viewStudent']);

Route::get('/lecturerProfile/{Lecturer_ID}',[ProfileController::class, 'viewLecturer']);

//edit profile route
Route::post('editProfile',[ProfileController::class, 'editProfile'])->name('editProfile');

//delete education route
Route::get('deleteEducation/{id}',[ProfileController::class, 'deleteEducation']);

//edit lecturer education route
Route::post('editEducation',[ProfileController::class, 'editEducation'])->name('editEducation');

//add new lecturer education route
Route::post('addEducation',[ProfileController::class, 'addEducation'])->name('addEducation');

//End of manage profile route--------------------------------------------------------------------



//Manage Lecturer Expertise Route - Asma' -----------------------------------------------------------

//VIEW
Route::group(['middleware' => ['web']], function () {
    Route::resource('/expertise','lecturerExpertiseController');

    //show expertise by lecturer id route
    Route::get('lecturerExpertise/{Lecturer_ID}',[LecturerExpertiseController::class,'show']); 
    //show lecturer expertise by lecturer id route
    Route::get('viewExpertise/{Lecturer_ID}',[LecturerExpertiseController::class,'detail']); 
    //show add expertise route
    Route::get('addedExpertise',[LecturerExpertiseController::class,'showAdded']);
    //show update expertise route
    Route::get('updatedExpertise',[LecturerExpertiseController::class,'showAdded']); 
 
});

//ADD
//go to expertise add page route
Route::get('add', function () {
    return view('ManageLecturerExpertise.add');
});
//store expertise into database route
Route::post('/addExpertise',[LecturerExpertiseController::class,'store']);

//EDIT
//update expertise by expertise id route
Route::put('/updateExpertise/{expertise_id}', [LecturerExpertiseController::class,'update']); 
//get expertise id route
Route::get('/editExpertise/{expertise_id}', [LecturerExpertiseController::class,'edit']);   


//Manage Proposal Route - Ilman-----------------------------------------------------------------------------

//show all proposal submitted
Route::get('/proposal/lecturer',[ ProposalController::class,'showAllSubmittedProposal'])->name('ManageProposal.LecturerProposal');

//get change proposal status request
Route::post('/proposal/{id}/status', [ProposalController::class, 'changeStatus'])->name('ManageProposal.status');

//show proposal information detail  
Route::get('/proposal/{id}/detail', [ProposalController::class,'showDetail'])->name("ManageProposal.showDetail");

//show proposal form submission
Route::get('/proposal/create', [ProposalController::class, 'create'])->name('ManageProposal.ProposalForm');

//save submitted proposal
Route::post('/proposal/store', [ProposalController::class, 'store'])->name('proposal.store');

//delete proposal
Route::delete('/contacts/{id}', [ProposalController::class,'destroy'])->name("proposal.destroy");

//download proposal doc
Route::get('/download/{file}',[ProposalController::class,'download'])->name("proposalDoc.download");

//view proposal doc
Route::get('/view/{id}',[ProposalController::class,'view'])->name("proposalDoc.view");

