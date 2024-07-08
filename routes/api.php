<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\CheckPermission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('admin')->middleware(['auth:sanctum' ])->group(function (){
    //start brand controllers ############################################
    Route::apiResource('Brand' , BrandController::class);
    Route::GET('Brand/{Brand}/product' , [BrandController::class,'GetProducts']);
//end brand controllers ############################################

//start category controllers ############################################
    Route::apiResource('Category' , CategoryController::class);
    Route::GET('Category/{Category}/parent' , [CategoryController::class,'parent']);
    Route::GET('Category/{Category}/children' , [CategoryController::class,'children']);
    Route::GET('Category/{Category}/product' , [CategoryController::class,'GetProducts']);
//end category controllers ### #########################################

//start product controllers ############################################
    Route::apiResource('Product' , ProductController::class);
    Route::apiResource('Product.Gallery' , GalleryController::class);
    Route::delete('Gallery/{Gallery}' , [GalleryController::class,'destroy']);
//end product controllers ############################################

//start Role controllers ############################################
    Route::apiResource('Role' , RoleController::class);
//end Role controllers ############################################

});

//start auth controllers ############################################
Route::post('Register' , [AuthController::class , 'Register']);
Route::post('Login' , [AuthController::class , 'login']);
Route::post('LogOut' , [AuthController::class , 'logOut']);
//end auth controllers ############################################

//start Role controllers ############################################
Route::apiResource('Order' , OrderController::class)->middleware(['auth:sanctum' ]);
//end Role controllers ############################################
