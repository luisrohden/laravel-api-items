<?php


//use Illuminate\Http\Request;


use Illuminate\Support\Facades\Route;
//Controllers
use App\Http\Controllers\SkillController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Auth Routes
    //Skills
    Route::post('/skills/create',[SkillController::class,'create']);
    Route::post('/skills/edit/{skill_id}',[SkillController::class,'edit']);
    Route::post('/skills/delete/{skill_id}',[SkillController::class,'delete']);
    //Jobs
    Route::post('/jobs/create',[JobsController::class,'create']);
    Route::post('/jobs/edit/{job_id}',[JobsController::class,'edit']);
    Route::post('/jobs/delete/',[JobsController::class,'delete']);
//Public Routes
    //Auth
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/register',[AuthController::class,'register']);
    Route::get('/logout',[AuthController::class,'logout']);
    //Unauthorized
    Route::get('/401',[AuthController::class,'unauthorized'])->name('login');

    //Skills
    Route::get('/skills/{id}',[SkillController::class,'view']);
    Route::get('/skills',[SkillController::class,'index']);
    //Jobs
    Route::get('/jobs/by/{user_id}',[JobsController::class,'listby']);
    Route::get('/jobs',[JobsController::class,'index']);






