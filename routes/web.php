<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CrudController;


// Home page - show all posts
Route::get('/', [PostController::class, 'index'])->name('index');

Route::resource('cruds', CrudController::class);






// Post detail page (slug required)
Route::get('/post/{slug}', [PostController::class, 'detail'])
        ->name('post.detail');

// Example extra routes
Route::get('/old-url', [PostController::class, 'oldurl']);
Route::get('/new-something-url', [PostController::class, 'newurl'])
        ->name('new_url');

Route::get('/contact', [HomeController::class, 'contactForm'])->name('contact.show');
Route::post('/contact', [HomeController::class, 'submitContactForm'])->name('contact.store');

