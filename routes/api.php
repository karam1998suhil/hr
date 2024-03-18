<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//Employee
Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
Route::get('/add_employee/{id?}', [EmployeeController::class, 'create'])->name('add_employee');
Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employees.show');

Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');

//Approval Process
Route::post('/submit-approval', [ApprovalController::class, 'submitForApproval'])->name('submit_approval');

// Authentication
Route::post('/register', [UserController::class, 'register']);
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/users', [UserController::class, 'index'])->name('user');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        
   
// });
