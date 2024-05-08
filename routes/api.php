<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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

#admin api's
// Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/create/category', [AdminController::class,'creatCeategories']);
Route::post('/create/sub/category', [AdminController::class,'createSubcategories']);
Route::post('/create/book', [AdminController::class,'storeBook']);





#Member Api's
Route::post('/add/to/favorite/book/{id}', [MemberController::class,'addToFavorite']);
Route::post('/rate/book/{id}', [MemberController::class,'rateBook']);



# visitors api's  what about be the all is get api's
Route::get('/all/books', [VisitorController::class,'index']);
Route::get('/filter/category', [VisitorController::class,'CategoryFiler']);
Route::get('/filter/sub/category', [VisitorController::class,'subCategoryFiler']);


