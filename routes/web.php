<?php

use App\Http\Controllers\GithubController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [GithubController::class, 'listGithubRepositories'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/graphs/{repoName}', [GithubController::class, 'listGraphCommits'])->middleware(['auth', 'verified'])->name('graphs');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/auth/redirect', function() {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', [UserController::class, 'updateOrCreateGithubUser'])->name('githubUser.create');

require __DIR__.'/auth.php';
