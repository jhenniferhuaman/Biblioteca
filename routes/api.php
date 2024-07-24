<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PartnerController;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Partner;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

// Route::get('authors', [AuthorController::class, 'index']);
// Route::get('authors/{author}', [AuthorController::class, 'show']);
// Route::post('authors', [AuthorController::class,'store']);
// Route::put('authors/{author}', [AuthorController::class, 'update']);
// Route::delete('authors/{author}',[AuthorController::class, 'destroy']);


route:: group(
    [
        'prefix' => 'authors',
        'controller' => AuthorController::class,
       'middleware' => 'jwt'
    ], static function () {
        route::get('/', 'index');
        route::get('/{author}', 'show'); 
    }
);




// Route::get('books', [BookController::class, 'index'])->middleware('jwt');
// Route::get('books/{book}',  [BookController::class,'show']);
// Route::post('books', [BookController::class,'store'])->middleware('jwt');
// Route::put('books/{book}', [BookController::class, 'update']);
// Route::delete('books/{book}', [BookController::class, 'destroy']);


route:: group(
    [
        'prefix' => 'books',
        'controller' => BookController::class,
       'middleware' => 'jwt'
    ], static function () {
        route::get('/', 'index');
        route::get('/{book}', 'show'); 
    }
);


// Route::get('categories', [CategoryController::class, 'index']);
// Route::get('categories/{category}', [CategoryController::class,'show']);
// Route::post('categories', [CategoryController::class,'store']);
// Route::put('categories/{category}', [CategoryController::class, 'update']);
// Route::delete('categories/{category}', [CategoryController::class, 'destroy']);

route:: group(
    [
        'prefix' => 'categories',
        'controller' => CategoryController::class,
        'middleware' => 'jwt'
    ], static function () {
        route::get('/', 'index');
        route::get('/{category}', 'show'); 
    }
);


// Route::get('partners', [PartnerController::class, 'index']);
// Route::get('partners/{partner}', [PartnerController::class,'show']);
// Route::post('partners', [PartnerController::class,'store']);
// Route::put('partners/{partner}', [PartnerController::class, 'update']);
// Route::delete('partners/{partner}', [PartnerController::class, 'destroy']);



route:: group(
    [
        'prefix' => 'partners',
        'controller' => PartnerController::class,
       'middleware' => 'jwt'
    ], static function () {
        route::get('/', 'index');
        route::get('/{partner}', 'show'); 
    }
);


