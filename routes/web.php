<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\MenuController as FrontendMenuController;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController;
use App\Http\Controllers\Frontend\WelcomeController;

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

Route::get('/', [WelcomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/categories', [FrontendCategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class,'show'])->name('categories.show');
Route::get('/menus', [FrontendMenuController::class,'index'])->name('menus.index');
Route::get('/reservation/step-one', [FrontendReservationController::class,'stepOne'])->name('reservations.step.one');
Route::post('/reservation/store/step-one/', [FrontendReservationController::class,'storeStepOne'])->name('reservations.store.step.one');
Route::get('/reservation/step-two', [FrontendReservationController::class,'stepTwo'])->name('reservations.step.two');
Route::post('/reservation/store/step-two/', [FrontendReservationController::class,'storeStepTwo'])->name('reservations.store.step.two');
Route::get('/thankYou',[WelcomeController::class,'thankYou'])->name('thankYou');


Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    route::resource('/categories', CategoryController::class);
    route::resource('/menus', MenuController::class);
    route::resource('/tables', TableController::class);
    route::resource('/reservations', ReservationController::class);
    
});
require __DIR__.'/auth.php';
