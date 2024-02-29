<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\TagController;

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

Route::group([
    'middleware' => 'api',
    'prefix' => 'articles'
], function () {
    Route::get('', [ArticleController::class, 'index']);
    Route::post('', [ArticleController::class, 'store']);
    Route::get('/{slug}', [ArticleController::class, 'show']);
    Route::put('/{slug}', [ArticleController::class, 'update']);
    Route::delete('/{slug}', [ArticleController::class, 'destroy']); 
});

Route::get('/tags', [TagController::class, 'index']);