<?php

use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\ShopsController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('admin')->as('admin.')
    ->group(function () {

        Route::get('/', function () {
            return view('admin.index');
        })->name('home');

        //danh mục
        Route::prefix('categories')->as('categories.')->group(function () {
            Route::get('listCategory', [CategoriesController::class, 'listCategory'])->name('listCategory');
            Route::get('detailCategory/{slug}', [CategoriesController::class, 'detailCategory'])->name('detailCategory');
            Route::post('updateCategory', [CategoriesController::class, 'updateCategory'])->name('updateCategory');
            Route::post('updateSubCategory', [CategoriesController::class, 'updateSubCategory'])->name('updateSubCategory');
            Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });

        //tài khoản
        Route::prefix('users')->as('users.')->group(function () {
            Route::get('listUser', [UsersController::class, 'listUser'])->name('listUser');
            Route::get('detailUser/{username}', [UsersController::class, 'detailUser'])->name('detailUser');
            // Route::get('detailCategory/{slug}', [CategoriesController::class, 'detailCategory'])->name('detailCategory');
            Route::post('updateUser', [UsersController::class, 'updateUser'])->name('updateUser');
            Route::post('addUser', [UsersController::class, 'addUser'])->name('addUser');
            Route::get('searchUser', [UsersController::class, 'searchUser'])->name('searchUser');

            // Route::post('updateSubCategory', [CategoriesController::class, 'updateSubCategory'])->name('updateSubCategory');
            // Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            // Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });

        //gian hàng
        Route::prefix('shops')->as('shops.')->group(function () {
            Route::get('listShop', [ShopsController::class, 'listShop'])->name('listShop');
            // Route::get('detailCategory/{slug}', [CategoriesController::class, 'detailCategory'])->name('detailCategory');
            // Route::post('updateCategory', [CategoriesController::class, 'updateCategory'])->name('updateCategory');
            // Route::post('updateSubCategory', [CategoriesController::class, 'updateSubCategory'])->name('updateSubCategory');
            // Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            // Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });
    });
