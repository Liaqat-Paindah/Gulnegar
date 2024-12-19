<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GulnegarController;
use App\Http\Controllers\CatagoriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ModelsController;
use App\Http\Controllers\FabricsController;
use App\Http\Controllers\FabricController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ModelController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PenddingController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();

});
*/

Route::middleware('api')->group(function () {
    Route::post('/login', [App\Http\Controllers\API\AuthController::class, 'login']);
    Route::resource('/Image', ImageController::class)->only(['index','create','store', 'show', 'edit', 'destroy']);
    Route::resource('/orders', OrderController::class)->only(['index','create','store', 'show', 'edit','destroy']);
    Route::resource('/fabrics', FabricsController::class)->only(['index','create','store', 'show', 'edit']);
    Route::resource('/fabric', FabricController::class)->only(['index','create','store', 'show', 'edit']);
    Route::resource('/deliveries', DeliveryController::class)->only(['index','create','store', 'show', 'edit', 'destroy']);
    Route::resource('/product', ProductsController::class)->only(['index','create','store', 'show', 'edit']);
    Route::resource('/products', ProductController::class)->only(['index','create','store', 'show', 'update', 'destroy']);
    Route::resource('/penddings', PenddingController::class)->only(['index','create','store', 'show', 'update', 'destroy']);
    Route::resource('/customers', CustomerController::class)->only(['index','create','store', 'show', 'update','login', 'destroy']);


    Route::get('/approved', [CustomController::class,'Approved']);
    Route::get('/pendding', [CustomController::class,'Pendding']);
    
    Route::get('/newmodels', [CustomController::class,'ShowModels']);
    Route::get('/fabricshow', [CustomController::class,'ShowFabrics']);
    Route::get('/sewings', [CustomController::class,'ShowSewings']);
    Route::get('/deleteproducts', [customController::class,'DeleteProduct']);
    

    Route::resource('/models', ModelsController::class)->only(['index','create','store', 'show', 'edit']);
    Route::resource('/model', ModelController::class)->only(['index','create','store', 'show', 'edit']);
    Route::resource('/catagories', CatagoriesController::class)->only(['index','create','store', 'show', 'edit']);
    Route::resource('users', UsersController::class)->only(['index','store','show','update','destroy']);
});