<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\Admin\AdminTaskController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::get('dashboard', [CustomAuthController::class, 'dashboard'])->name('dashboard'); 
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');



Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
Route::post('/tasks/complete', [TaskController::class, 'markTaskAsCompleted'])->name('mark');

Route::get('/user',[UserController::class, 'index'])->name('user.index');
Route::get('user/{user}/edit',[UserController::class, 'edit'])->name('user.edit');
Route::put('user/{user}',[UserController::class, 'update'])->name('user.update');
Route::get('user/password',[UserController::class,'passwordEdit'])->name('user.password');
Route::post('user/password/update',[UserController::class,'passwordUpdate'])->name('user.passwordUpdate');

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {
    Route::get('dashboards',[DashboardController::class,'index']);
    Route::get('user', [AdminUserController::class, 'index'])->name('list.user');
    Route::get('edit/{user}/edit', [AdminUserController::class, 'edit'])->name('edit.user');
    Route::put('edit/{user}', [AdminUserController::class, 'update'])->name('update.user');
    Route::delete('delete/{user}', [AdminUserController::class, 'delete'])->name('delete.user');
    Route::get('task', [AdminTaskController::class, 'index'])->name('task.user');
    Route::get('task/{task}/editTask', [AdminTaskController::class, 'edit'])->name('edit.task');
    Route::put('taskEdit/{task}', [AdminTaskController::class, 'update'])->name('update.task');
    Route::delete('taskDelete/{task}', [AdminTaskController::class, 'delete'])->name('delete.task');


});


