<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;


Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('blog.about');
})->name('about');

Route::get('/contact', function () {
    return view('blog.contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::get('/messages', [ContactController::class, 'index'])->name('contact.index');
Route::get('/messages/{contactMessage}', [ContactController::class, 'show'])->name('admin.contact.show');



Route::post('/admin/messages/{message}/toggle-status', [ContactController::class, 'toggleStatus'])->name('admin.messages.toggleStatus');



Route::get('/project', function () {
    return view('blog.projects');
})->name('projects');




Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/main', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'index2'])->name('home1');



require __DIR__ . '/auth.php';

Route::get('/posts/{post}', [PostController::class, 'showForClient'])->name('posts.show');
Route::get('/posts/2/{post}', [PostController::class, 'showForClient2'])->name('posts.show.2');

Route::get('/posts2', [PostController::class, 'index2'])->name('posts');




Route::prefix('admin')->name('admin.')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});
