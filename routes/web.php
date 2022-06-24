<?php

use App\Http\Controllers\PaperController;
use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware('auth')->group(function (){
    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function (){
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('paper')->group(function (){
        Route::get('/', [PaperController::class, 'index'])->name('index');
        Route::get('create', [PaperController::class, 'create'])->name('create');
        Route::post('create', [PaperController::class, 'store']);
        Route::get('edit/{id}', [PaperController::class, 'edit'])->name('edit');
        Route::post('update/{id}', [PaperController::class, 'update'])->name('update');
    });

    Route::prefix('question')->group(function (){
        Route::get('/', [QuestionController::class, 'index'])->name('question.index');
        Route::get('create', [QuestionController::class, 'create'])->name('question.create');
        Route::post('create', [QuestionController::class, 'store']);
        Route::get('edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
        Route::post('update/{id}', [QuestionController::class, 'update'])->name('question.update');
        Route::get('delete/{id}', [QuestionController::class, 'delete'])->name('question.delete');
    });
});
