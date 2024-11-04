<?php

use App\Http\Controllers\CommunityLinkUsersController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityLinkController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/dashboard', [CommunityLinkController::class, 'store'])
->middleware(['auth','verified'])
->name('dashboard');

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::post('/dashboard/votes/{link}', [CommunityLinkUsersController::class, 'store']);

Route::get('/dashboard/{channel:slug}', [CommunityLinkController::class, 'index']);


Route::get('/mylinks', [CommunityLinkController::class, 'personal'])
->middleware(['auth', 'verified'])
->name('mylinks');

Route::get('/contacts', function() {
    return view('contacts');
})->middleware(['auth', 'verified'])->name('contacts');

Route::get('/analitycs', function() {
    return view('analitycs');
})->middleware(['auth', 'verified'])->name('analitycs');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
