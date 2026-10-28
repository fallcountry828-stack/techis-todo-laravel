<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\examplecontroller;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

route::get('/test', [examplecontroller::class, 'index']);

route::get('/members', [MemberListController::class, 'index']);

route::get('/quiz2', [QuizController::class, 'quiz2']);

route::get('/quiz3', [QuizController::class, 'show']);

route::get('/quiz4', [QuizController::class, 'quiz4_show']);

route::get('/quiz5', [QuizController::class, 'login']);

Route::get('/quiz7', [QuizController::class,'quiz7_show'])->name('quiz7');

Route::get('/quiz6', [QuizController::class,'quiz6_show'])->name('quiz6_test');

Route::get('/quiz8', [QuizController::class,'quiz8_redirect']);

Route::post('/quiz9/{id}', [QuizController::class,'quiz9_show'])->name('quiz9');

route::get('/quiz10', [QuizController::class,'quiz10_show'])->name('quiz10_test');

route::post('/quiz10/store', [QuizController::class,'quiz10_store'])->name('quiz10_test2');

route::get('/quiz11/all', [QuizController::class,'quiz11_show_all'])->name('quiz11_show_all');

route::get('/quiz11/get', [QuizController::class,'quiz11_show_get'])->name('quiz11_show_get');

route::get('/quiz12/{id}', [QuizController::class,'quiz12_show'])->name('quiz12_test');

route::post('/quiz12/update/{id}', [QuizController::class,'quiz12_update'])->name('quiz12_update');

route::delete('/quiz12/delete/{id}', [QuizController::class,'quiz12_delete'])->name('quiz12_test3');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

route::get('/tasks', [App\Http\Controllers\TaskController::class, 'index']);

route::post('/create', [App\Http\Controllers\TaskController::class, 'create'])->name('create'); 
Route::delete('/delete/{taskId}', [App\Http\Controllers\TaskController::class, 'delete'])->name('delete');
