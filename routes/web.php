<?php

use App\Http\Controllers\admin\BankController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\ShopsController;
use App\Models\Categories;
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
            Route::get('listShop1', [ShopsController::class, 'listShop1'])->name('listShop1');
            Route::get('listShopStatus2', [ShopsController::class, 'listShopStatus2'])->name('listShopStatus2');
            Route::get('listShopStatus3', [ShopsController::class, 'listShopStatus3'])->name('listShopStatus3');
            Route::get('detailShop/{slug}/{status}', [ShopsController::class, 'detailShop'])->name('detailShop');
            Route::post('updateStatusShop', [ShopsController::class, 'updateStatusShop'])->name('updateStatusShop');
            // Route::post('updateSubCategory', [CategoriesController::class, 'updateSubCategory'])->name('updateSubCategory');
            // Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            // Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });

        Route::prefix('banks')->as('banks.')->group(function () {
            Route::get('listBank', [BankController::class, 'listBank'])->name('listBank');
            Route::get('detailBank/{id}', [BankController::class, 'detailBank'])->name('detailBank');
            Route::post('updateBank', [BankController::class, 'updateBank'])->name('updateBank');
            Route::post('addBank', [BankController::class, 'addBank'])->name('addBank');
            // Route::post('addSubCategory', [CategoriesController::class, 'addSubCategory'])->name('addSubCategory');
            // Route::post('addCategory', [CategoriesController::class, 'addCategory'])->name('addCategory');
        });
    });




// Route::get('/', function () {
//     // $categoriesSub = Categories::with('children')->get();
//     // $categories = Categories::whereNull('parent_id')->get();
//     $categories = Categories::whereNull('parent_id')->with('children')->first();
//     return view('client.index')->with(['categories'=>$categories]);
// })->name('home');

Route::get('/', function () {
    $categories = Categories::whereNull('parent_id')
        ->with('children.children') 
        ->get();
    
    return view('client.index')->with(['categories' => $categories]);
})->name('home');

