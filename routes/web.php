<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkedinController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\JobAppliedController;
use App\Http\Controllers\BannerController;


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
Route::get('job-category', [JobCategoryController::class,'jobCategory'])->name('job-category');
Route::get('/', [FrontController::class, 'Job']);



Route::get('/auth/linkedin', [LinkedinController::class, 'redirectToLinkedIn']);
Route::get('/auth/linkedin/callback', [LinkedinController::class, 'handleLinkedInCallback']);
//Route::get('/auth/linkedin/connections', [LinkedinController::class, 'getConnections'])->name('linkedin.connections');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::post('/job-category/store', [JobCategoryController::class,'addJob'])->name('addJobCategory');
Route::get('/job-category/edit/{id}', [JobCategoryController::class, 'editJob'])->name('editJobCategory');
Route::post('/job-category/update/{id}', [JobCategoryController::class, 'update'])->name('update');
Route::get('/job-category/{id}', [JobCategoryController::class, 'delete'])->name('deleteCategory');

Route::get('/job', [JobController::class, 'Job'])->name('Job');

Route::post('/job/store', [JobController::class, 'addJob'])->name('addJob');
Route::get('/job/edit/{id}', [JobController::class, 'editJob'])->name('editJob');
Route::post('/job/update/{id}', [JobController::class, 'update'])->name('updateJob');
Route::get('/job/{id}', [JobController::class, 'delete'])->name('deleteJob');

Route::post('/applyJob', [JobAppliedController::class, 'apply'])->name('applyJob');

Route::get('/applicants/{id}', [JobAppliedController::class, 'appliedList'])->name('Applicants');

Route::post('/addBanner', [BannerController::class, 'addBanner'])->name('addBanner');

Route::get('/banner', [BannerController::class, 'banner'])->name('Banner');

Route::get('/banner/edit/{id}', [BannerController::class, 'editBanner'])->name('editBanner');
Route::post('/banner/update/{id}', [JobController::class, 'updateBanner'])->name('updateBanner');





