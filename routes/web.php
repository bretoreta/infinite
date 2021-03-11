<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TweetController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //Posts and Posting studd
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/notifications', [HomeController::class, 'notifications'])->name('notifications');
    Route::post('/hydrate', [HomeController::class, 'hydrate'])->name('hydrate');

    // Messaging and stuff 
    Route::get('/messenger',[MessageController::class, 'index'])->name('messenger.index');
    Route::get('/messenger/{message}',[MessageController::class, 'show'])->name('messenger.show');

    //Liking and Unliking of Posts
    Route::post('/tweets/{tweet}/like',  [TweetController::class, 'toggle']);

    //Uploading and media files management
    Route::post('/media', [MediaController::class, 'store'])->name('media.store');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');

    //user and Followers(ing) management
    Route::get('/{user:username}', [TweetController::class, 'index']);
    Route::get('/{user:username}/followings', [TweetController::class, 'followings']);
    Route::post('/{user:username}/follow/{id}', [TweetController::class, 'follow']);
    Route::delete('/{user:username}/unfollow/{id}', [TweetController::class, 'unfollow']);
    Route::get('/{user:username}/followers', [TweetController::class, 'followers']);

});