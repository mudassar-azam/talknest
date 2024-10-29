<?php
use App\Http\Controllers\FrontController;

Route::post('/deletePost/{id}', [FrontController::class, 'deletePost'])->name('deletePost');
Route::post('/addCatComment', [FrontController::class, 'addCatComment'])->name('addCatComment');
Route::get('/fetchCatComment/{id}', [FrontController::class, 'fetchCatComment'])->name('fetchCatComment');
