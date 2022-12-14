<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::get('/', function () {
    return view('auth.login');
})->name("login");
/*Route::get("/logout", [\App\Http\Controllers\HomeController::class, "index"]);*/

Route::middleware(["auth"])->group(function () {
    Route::get('/home_page', function () {
        return view('welcome');
    });
    Route::get('/add_product', function () {
        return view('add_product');
    })->name("add_product");



    Route::get("/edit_product",[\App\Http\Controllers\TaskController::class, "show"])->name("edit_product");
    Route::get("/edit_package",[\App\Http\Controllers\TaskController::class, "edit_package"])->name("edit_package");
    Route::get("/package",[\App\Http\Controllers\TaskController::class, "package"])->name("package");
    Route::post("/store",[\App\Http\Controllers\ProductController::class, "store"])->name("product_store");
    Route::post("/package",[\App\Http\Controllers\ProductController::class, "package"])->name("create_package");
    Route::patch("/product/{id}/update", [\App\Http\Controllers\ProductController::class, "updateProduct"])->name("product_update");
    Route::patch("/package/{id}/update", [\App\Http\Controllers\ProductController::class, "updatePackage"])->name("package_update");
    Route::get("{what}/{id}/delete", [\App\Http\Controllers\ProductController::class, "deleteProduct"])->name("product_delete");
    Route::get("/logout", [\App\Http\Controllers\HomeController::class, "logout"])->name("logout");


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();
