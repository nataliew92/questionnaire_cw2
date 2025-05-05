<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuestionnairesController;
use App\Http\Controllers\ThankyouController;
use App\Http\Controllers\ResponsesController;
use App\Http\Controllers\AdminQuestionnairesController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;

// Routes for all public views.
Route::resource('/', HomeController::class);
Route::resource('/questionnaires', QuestionnairesController::class);
Route::resource('/thankyou', ThankyouController::class);

// Post routes, unused atm.
Route::post('/responses', [ResponsesController::class, 'store'])->name('responses.store');

// Admin named routes.
Route::prefix('admin')->middleware(['auth'])->group(function ()
{
    Route::get('/questionnaires', [AdminQuestionnairesController::class, 'index'])->name('admin.questionnaires.index');
    Route::get('/questionnaires/create', [AdminQuestionnairesController::class, 'create'])->name('questionnaires.create');
    Route::post('/questionnaires/submit', [AdminQuestionnairesController::class, 'store'])->name('questionnaires.store');
    Route::get('/questionnaires/{questionnaire}/edit', [AdminQuestionnairesController::class, 'edit'])->name('questionnaires.edit');
    Route::patch('/questionnaires/{questionnaire}', [AdminQuestionnairesController::class, 'update'])->name('questionnaires.update');
    Route::delete('/questionnaires/{questionnaire}', [AdminQuestionnairesController::class, 'destroy'])->name('questionnaires.destroy');
    Route::post('/questionnaires/{questionnaire}/toggle-status', [AdminQuestionnairesController::class, 'toggleStatus'])->name('questionnaires.toggleStatus');
    Route::get('/questionnaires/{questionnaire}/responses', [AdminQuestionnairesController::class, 'responses'])->name('questionnaires.responses');
});

// Routes for Login, Registration and Logout.
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth')->name('logout');

