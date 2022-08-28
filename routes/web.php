<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Dashboard\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Dashboard\DashboardController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function(){
    return redirect('dashboard');
})->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('dashboard', DashboardController::class)->except(['create','store','show','edit','update','destroy']);
    Route::resource('roles', RoleController::class);
    Route::post('getjsonroles', [RoleController::class, 'getJsonRoles'])->name('getjsonroles');
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('permissions', PermissionController::class)->except(['show']);
});
