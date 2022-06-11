<?php

use App\Mail\NewUserWelcomeMail;
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

Auth::routes();

Route::get('/email', function(){
    return new NewUserWelcomeMail();
});

Route::get('/profile/{user}/edit', [App\Http\Controllers\ProfilesController::class, 'edit']);
Route::patch('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'update']);
Route::get('/profile/{user}', [App\Http\Controllers\ProfilesController::class, 'index']);
Route::get('/find', [App\Http\Controllers\ProfilesController::class, 'find']);

Route::get('/p/create', [App\Http\Controllers\PostsController::class, 'create']);
Route::get('/p/{post}', [App\Http\Controllers\PostsController::class, 'show']);
Route::delete('/p/{post}', [App\Http\Controllers\PostsController::class, 'destroy']);
Route::post('/p', [App\Http\Controllers\PostsController::class, 'store']);
Route::get('/search', [App\Http\Controllers\PostsController::class, 'search']);
Route::get('/', [App\Http\Controllers\PostsController::class, 'index']);

Route::get('/topic/create', [App\Http\Controllers\TopicsController::class, 'create']);
Route::get('/topic/{topic}', [App\Http\Controllers\TopicsController::class, 'show']);
Route::post('/topic', [App\Http\Controllers\TopicsController::class, 'store']);
Route::get('/topic', [App\Http\Controllers\TopicsController::class, 'index']);

Route::post('/follow/{topic}', [App\Http\Controllers\FollowsController::class, 'store'] );

// Route::get('/dm/{user}', [App\Http\Controllers\DmsController::class, 'show']);
// Route::post('/dm', [App\Http\Controllers\DmsController::class, 'store']);
// Route::get('/dm', [App\Http\Controllers\DmsController::class, 'index']);


