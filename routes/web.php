<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

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


// frontend routes

Route::get('/', function () {
    return view('frontend/index');
})->name('main');

Route::get('404',function(){
    return view('frontend/404');
})->name('404');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// user routes

Route::middleware('auth')->group(function () {
    //user profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// admin panel routes

Route::middleware(['admin'])->group(function () {
    Route::get('/admin', function () {
        return view('backend/admin-dashboard');
    })->name('admin');

    // Admin Category

    Route::get('/add-category',[CategoryController::class, 'index'])->name('admin.add-cat');
    Route::post('/insert-category',[CategoryController::class, 'create'])->name('admin.insert-cat');
    Route::get('/all-category',[CategoryController::class, 'show'])->name('admin.all-cat');
    Route::get('/edit-category/{slug}',[CategoryController::class, 'edit'])->name('admin.edit-cat');
    Route::post('/update-category/{slug}',[CategoryController::class, 'update'])->name('admin.update-cat');
    Route::delete('/delete-category/{slug}', [CategoryController::class, 'destroy'])->name('admin.delete-cat');
    Route::get('/category-analytic/{slug}',[CategoryController::class, 'analytics'])->name('admin.cat-analytic');


    // Admin Product

    Route::get('/add-product',[ProductController::class, 'index'])->name('admin.add-product');

});

require __DIR__.'/auth.php';
