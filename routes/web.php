<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

route::get('/restaurants/create',[RestaurantController::class,'create'])->name('restaurant.create');
route::post('/restaurant/store',[RestaurantController::class,'store'])->name('restaurant.store');
route::get('restaurant/{id}/edit',[RestaurantController::class,'edit'])->name('restaurant.edit');
route::put('restaurant/{id}/update',[RestaurantController::class,'update'])->name('restaurant.update');

route::get('/restaurants',[RestaurantController::class,'index'])->name('restaurant.index');
route::get('/restaurant/{id}',[RestaurantController::class,'deatils'])->name('restaurant.details');
Route::get('/restaurants/search', [RestaurantController::class, 'search'])->name('restaurant.search');
require __DIR__.'/auth.php';
