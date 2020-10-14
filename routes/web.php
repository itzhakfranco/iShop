<?php

use App\Http\Controllers\CmsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


# Shop
Route::prefix('shop')->group(function () {
    Route::post('autocomplete', [ShopController::class, 'autoComplete']);
    Route::get('add-to-cart', [ShopController::class, 'addToCart']);
    Route::get('checkout', [ShopController::class, 'checkout']);
    Route::get('clear-cart', [ShopController::class, 'clearCart']);
    Route::get('update-cart', [ShopController::class, 'updateCart']);
    Route::get('order', [ShopController::class, 'order']);
    Route::get('remove-item/{id}', [ShopController::class, 'removeItem']);
    Route::get('checkout', [ShopController::class, 'checkout']);
    Route::post('search', [ShopController::class, 'search']);
    Route::get('{cat_url}', [ShopController::class, 'products']);
    Route::get('{cat_url}/{prd_url}', [ShopController::class, 'item']);
});

# User
Route::prefix('user')->group(function () {
    Route::get('signin', [UserController::class, 'getSignin']);
    Route::post('signin', [UserController::class, 'postSignin']);
    Route::get('register', [UserController::class, 'getRegister']);
    Route::post('register', [UserController::class, 'postRegister']);
    Route::get('logout', [UserController::class, 'logout']);
    Route::get('profile', [ProfileController::class, 'userProfile']);
    Route::post('profile/{user_id}/update/image', [ProfileController::class, 'updateProfileImage']);
    Route::delete('profile/{user_id}/update/image', [ProfileController::class, 'removeProfileImage']);
    Route::put('profile/{user_id}/edit', [ProfileController::class, 'updateProfile']);
});

# CMS
Route::middleware(['cmsadmin'])->group(function () {
    Route::prefix('cms')->group(function () {
        Route::get('dashboard', [CmsController::class, 'dashboard']);
        Route::get('orders', [CmsController::class, 'orders']);
        Route::get('feature-product', [CmsController::class, 'featuredProductToggle']);
        Route::put('product/{prd_id}/update/image', [ProductsController::class, 'updateProductImage']);

        Route::resource('menu', MenuController::class);
        Route::resource('content', ContentController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('products', ProductsController::class);
        Route::resource('users', UsersController::class);
    });
});


# Pages
Route::get('/', [PagesController::class, 'home']);
Route::get('{url}', [PagesController::class, 'content']);
