<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\api\v1\AdminController;
use App\Http\Controllers\api\v1\MemberController;
use App\Http\Controllers\api\v1\VisitorController;

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
Route::controller(AuthController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

#admin api's
// first way
Route::post('/create/category', [AdminController::class,'creatCeategories']);
Route::post('/create/sub/category', [AdminController::class,'createSubcategories']);
// Route::post('/create/book', [AdminController::class,'storeBook']);

#Member Api's
#first way 
// Route::put('/add/to/favorite/book/{id}', [MemberController::class,'addToFavorite']);
// Route::put('/rate/book/{id}', [MemberController::class,'rateBook']);

// second way using group 
// // Admin protected routes
// Route::middleware('auth:sanctum,role:Admin')->group( function () {
//     Route::post('/logout', [AuthController::class, 'logout']);

//     Route::controller(AdminController::class)->group(function() {
//         // Route::post('/create/category', 'creatCeategories');
//         // Route::post('/create/sub/category', 'createSubcategories');
//         Route::post('/create/book', 'storeBook');
//     });

// });

// #Member protected routes
// Route::middleware('auth:sanctum,role:Member')->group( function ()
//      {
//     Route::controller(MemberController::class)->group(function() {
//         Route::put('/add/to/favorite/book/{id}', 'addToFavorite');
//         Route::put('/rate/book/{id}', 'rateBook');  
//     });
// });

# visitors api's  what about be the all is get api's
Route::get('/all/books', [VisitorController::class,'index']);
Route::get('/filter/category', [VisitorController::class,'CategoryFiler']);
Route::get('/filter/sub/category', [VisitorController::class,'subCategoryFiler']);


