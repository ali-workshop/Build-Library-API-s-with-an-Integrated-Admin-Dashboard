<?php

use App\Http\Livewire\Rtl;

use Illuminate\Http\Request;
use App\Http\Livewire\Tables;
use App\Http\Livewire\Billing;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\StoreBook;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\AddCategory;
use App\Http\Livewire\Auth\SignUp;
use App\Http\Livewire\StaticSignIn;
use App\Http\Livewire\StaticSignUp;

use App\Http\Livewire\AddSubCategory;

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Auth\ResetPassword;
use App\Http\Livewire\Auth\ForgotPassword;
use App\Http\Controllers\AdminWebController;
use App\Http\Controllers\VisitorWebController;
use App\Http\Livewire\LaravelExamples\UserProfile;
use App\Http\Livewire\LaravelExamples\UserManagement;

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

// Route::get('/', function() {
//     return redirect('/login');
// });

#visitor web routes.
Route::get('/books', [VisitorWebController::class,'index'])->name('home');
Route::get('/filter/category', [VisitorWebController::class,'getCategoryFiler'])->name('Category.filer');
Route::get('/filter/sub/category', [VisitorWebController::class,'getsubCategoryFiler'])->name('subCategory.filer');
Route::post('/filter/category', [VisitorWebController::class,'CategoryFiler'])->name('Category.filer.update');
Route::post('/filter/sub/category', [VisitorWebController::class,'subCategoryFiler'])->name('subCategory.filer.update');




#admin web routes
Route::get('/create/category', [AdminWebController::class,'getCategoryName'])->name('get.category');
Route::post('/create/category', [AdminWebController::class,'creatCeategories'])->name('store.category');
Route::get('/create/sub/category', [AdminWebController::class,'getSubCategoryName'])->name('get.subcategory');
Route::post('/create/sub/category', [AdminWebController::class,'createSubcategories'])->name('store.sub.category');
Route::get('/create/book', [AdminWebController::class,'createBook'])->name('get.book.info');
Route::post('/create/book', [AdminWebController::class,'storeBook'])->name('store.book');


#LiveWire Routes
Route::get('/add/category', AddCategory::class)->name('get.category.livewire');
Route::get('/add/subcategory', AddSubCategory::class)->name('get.sub.category.livewire');







Route::get('/sign-up', SignUp::class)->name('sign-up');
Route::get('/login', Login::class)->name('login');

Route::get('/login/forgot-password', ForgotPassword::class)->name('forgot-password');

Route::get('/reset-password/{id}',ResetPassword::class)->name('reset-password')->middleware('signed');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/billing', Billing::class)->name('billing');
    Route::get('/profile', Profile::class)->name('profile');
    Route::get('/tables', Tables::class)->name('tables');
    Route::get('/static-sign-in', StaticSignIn::class)->name('sign-in');
    Route::get('/static-sign-up', StaticSignUp::class)->name('static-sign-up');
    Route::get('/rtl', Rtl::class)->name('rtl');
    Route::get('/laravel-user-profile', UserProfile::class)->name('user-profile');
    Route::get('/laravel-user-management', UserManagement::class)->name('user-management');
});

