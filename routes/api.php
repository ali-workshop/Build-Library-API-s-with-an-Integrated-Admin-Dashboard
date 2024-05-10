<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\V1\AdminController;
use App\Http\Controllers\api\V1\MemberController;
use App\Http\Controllers\api\V1\VisitorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Public routes of authtication
// in the case below both the admin and the member can register and login 
Route::middleware(['role:Admin|Member'])->group( function ()
 {
Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});
});

// in the case below just the member can register and login , and the admin just login











# DEFINE API'S
#admin api's
// first way                                                                        
// Route::post('/create/category', [AdminController::class, 'createCategories'])->middleware('auth:sanctum','permission:Create Category'); test permission
// Route::post('/create/sub/category', [AdminController::class,'createSubcategories']);
// Route::post('/create/book', [AdminController::class,'storeBook']);

#Member Api's
#first way 
// Route::put('/add/to/favorite/book/{id}', [MemberController::class,'addToFavorite']);
// Route::put('/rate/book/{id}', [MemberController::class,'rateBook']);

// second way using group 
// Admin protected routes
Route::middleware(['auth:sanctum','role:Admin'])->group( function ()
 {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::controller(AdminController::class)->group(function() {
        Route::post('/create/category', 'createCategories');
        Route::post('/create/sub/category', 'createSubcategories');
        Route::post('/create/book', 'storeBook');
    });

});

#Member protected routes
Route::middleware(['auth:sanctum','role:Member'])->group( function ()
     {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::controller(MemberController::class)->group(function() {
        Route::put('/add/to/favorite/book/{id}', 'addToFavorite');
        Route::put('/rate/book/{id}', 'rateBook');  
    });
});

#public visitors api's 
Route::get('/all/books', [VisitorController::class,'index']);
Route::get('/filter/category', [VisitorController::class,'CategoryFiler']);
Route::get('/filter/sub/category', [VisitorController::class,'subCategoryFiler']);


