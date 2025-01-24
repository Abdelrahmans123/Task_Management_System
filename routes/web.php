<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    TaskController,
    AssignController,
    ProfileController,
    ProjectController,
    EmployeeController,
    HomeController
};

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

// Public routes
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // Home
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Resources
    Route::resource('/project', ProjectController::class);
    Route::resource('/task', TaskController::class);
    Route::resource('/employee', EmployeeController::class);

    // Assignment routes
    Route::prefix('/assign')->group(function () {
        Route::get('/', [AssignController::class, 'index']);
        Route::get('/{id}', [AssignController::class, 'create']);
        Route::post('/', [AssignController::class, 'store']);
        Route::delete('/{id}', [AssignController::class, 'destroy']);
    });

    // Task-specific actions
    Route::get('/changeProgress/{id}', [TaskController::class, 'changeProgress']);
    Route::get('/show/{id}', [TaskController::class, 'show']);
    Route::post('/task/{id}', [TaskController::class, 'destroy']);

    // Error pages
    Route::get('/404', function () {
        return abort(404);
    });
});

require __DIR__ . '/auth.php';
