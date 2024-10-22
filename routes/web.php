<?php

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

Route::post('/dashboard', function() {
    return redirect('/dashboard')->with('status', 'autorizacion automatica');
})
->middleware(['auth','verified'])
->name('dashboard');

Route::get('/dashboard', [CommunityLinkController::class, 'index'])
->middleware(['auth', 'verified'])
->name('dashboard');

Route::get('/personal', [PersonalController::class, 'personal'])
->middleware(['auth', 'verified'])
->name('personal');

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
