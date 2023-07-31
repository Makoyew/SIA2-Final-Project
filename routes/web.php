<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/teachers/edit/{teacher}',[TeacherController::class,'edit'])->middleware(['permission:edit']);
    Route::get('/teachers/create',[TeacherController::class,'create'])->middleware(['permission:create']);
    Route::post('/teachers', [TeacherController::class, 'store']);
    Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers');
    Route::get('/teachers/{teacher}', [TeacherController::class, 'show']);
    Route::patch('/teachers/{teacher}',[TeacherController::class,'update']);
    Route::delete('/teachers/{teacher}',[TeacherController::class, 'destroy'])->middleware(['permission:delete']);
    Route::get('/teachers/search/{searchKey}', [TeacherController::class, 'search']);
    Route::post('/teachers/toggle/{teacher}', [TeacherController::class, 'toggle']);

    Route::get('/teachers/pdf/{teacher}', [TeacherController::class, 'pdf'])->middleware(['permission:export']);
    Route::get('/teachers/email/{teacher}', [TeacherController::class, 'email'])->middleware(['permission:send']);
});
