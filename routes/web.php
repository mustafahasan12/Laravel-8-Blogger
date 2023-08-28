<?php

use App\Http\Controllers\Admin\MainController as AdminMainController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\MainController;
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

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/about', [MainController::class, 'about'])->name('about');
Route::get('/contact', [MainController::class, 'contact'])->name('contact');


Route::group(array('prefix' => 'admin'), function() {
    Route::get('/dashboard', [AdminMainController::class, 'index'])->name('admin.dashboard');

    //roles
    Route::get('/role/list', [RoleController::class, 'index'])->name('admin.role.list');
    Route::get('/role/create', [RoleController::class, 'create'])->name('admin.role.create');
    Route::post('/role/store', [RoleController::class, 'store'])->name('admin.role.store');
    Route::get('/role/edit/{id}', [RoleController::class, 'edit'])->name('admin.role.edit');
    Route::post('/role/update/{id}', [RoleController::class, 'update'])->name('admin.role.update');
    Route::post('/role/delete/{id}', [RoleController::class, 'delete'])->name('admin.role.delete');
    //roles

    
    //users
    Route::get('/user/list', [UserController::class, 'index'])->name('admin.user.list');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
    Route::post('/user/delete', [UserController::class, 'delete'])->name('admin.user.delete');
    //users

});


Route::get('/Logout', [MainController::class, 'logout'])->name('Logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
