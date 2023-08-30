<?php

use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DetailController;
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

Route::post('/contactus/add', [MainController::class, 'contactusadd'])->name('admin.contactusadd');


Route::middleware(['auth'])->group(function () {

    Route::group(['prefix' => 'admin'], function() {
        Route::get('/dashboard', [AdminMainController::class, 'index'])->name('admin.dashboard');

        Route::get('/profile', [AdminMainController::class, 'profile'])->name('admin.profile');
        Route::post('/user/profile/update/{id}', [AdminMainController::class, 'profileupdate'])->name('admin.profile.update');

        Route::get('/contactus', [AdminMainController::class, 'contactus'])->name('admin.contactus');
        Route::post('/contact/delete', [AdminMainController::class, 'contactdelete'])->name('admin.contact.delete');


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


        //categories
        Route::get('/categories/list', [CategoriesController::class, 'index'])->name('admin.categories.list');
        Route::get('/categories/create', [CategoriesController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories/store', [CategoriesController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/edit/{id}', [CategoriesController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/categories/update/{id}', [CategoriesController::class, 'update'])->name('admin.categories.update');
        Route::post('/categories/delete', [CategoriesController::class, 'delete'])->name('admin.categories.delete');
        //categories


        //blog
        Route::get('/blog/list', [BlogController::class, 'index'])->name('admin.blog.list');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
        Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
        Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
        Route::post('/blog/delete', [BlogController::class, 'delete'])->name('admin.blog.delete');
        //blog


        //detail
        Route::get('/detail', [DetailController::class, 'index'])->name('admin.detail');
        Route::post('/detail/update', [DetailController::class, 'update'])->name('admin.detail.update');


        //aboutus
        Route::get('/aboutus', [AboutusController::class, 'index'])->name('admin.aboutus');
        Route::post('/aboutus/update', [AboutusController::class, 'update'])->name('admin.aboutus.update');


    });

});    


Route::get('/Logout', [MainController::class, 'logout'])->name('Logout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
