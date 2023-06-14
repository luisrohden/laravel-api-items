<?php


//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;
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
    Route::post('/skills/edit',[SkillController::class,'edit']);
    Route::post('/skills/delete',[SkillController::class,'delete']);
//Public Routes
    //Auth
    Route::post('/login',[AuthController::class,'login']);
    Route::post('/register',[AuthController::class,'register']);
    Route::get('/logout',[AuthController::class,'logout']);
    //Unauthorized
    Route::get('/401',[AuthController::class,'unauthorized'])->name('login');

    //Skills
    Route::get('/skills',[SkillController::class,'index']);
    Route::get('/skills/{id}',[SkillController::class,'view']);

//

