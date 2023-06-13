<?php


//use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SkillController;

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

//Auth
Route::post('/skills/create',[SkillController::class,'create']);
Route::post('/skills/edit',[SkillController::class,'edit']);
Route::post('/skills/delete',[SkillController::class,'delete']);
//View
Route::get('/skills',[SkillController::class,'index']);
Route::get('/skills/{id}',[SkillController::class,'view']);
