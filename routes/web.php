<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\StatisticsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Gift\GiftController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PrayerTimeController;
use Illuminate\Support\Facades\Artisan;

require __DIR__ . '/auth.php';

Route::group([], function () {

    Route::get('/', [HomeController::class, 'index'])
        ->name('home');

    Route::get('/about', function () {
        return view('blog.about');
    })->name('about');

    Route::get('/contact', function () {
        return view('blog.contact');
    })->name('contact');

    Route::post('/contact', [ContactController::class, 'submitForm'])
        ->name('contact.submit');

    Route::get('/project', function () {
        return view('blog.projects');
    })->name('projects');

    Route::get('/posts/{post}', [PostController::class, 'showForClient'])
        ->name('posts.show');

    Route::get('/posts', [PostController::class, 'indexForUser'])
        ->name('posts');
});

Route::prefix('admin')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/messages/{contactMessage}', [ContactController::class, 'show'])->name('admin.contact.show');
    Route::get('/messages', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::put('/messages/{contactMessage}/toggle-status', [ContactController::class, 'toggleStatus'])->name('admin.contact.toggleStatus');
    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.posts.store');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('admin.posts.show');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.posts.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.posts.destroy');

    Route::get('/', [StatisticsController::class, 'dashboard'])->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/gift/dashboard', [GiftController::class, 'index'])->name('gift.dashboard')->middleware('auth');
Route::post('/choose-letter', [GiftController::class, 'chooseLetter'])->name('choose.letter');
Route::post('/gifts', [GiftController::class, 'store'])->name('gifts.store');
Route::get('/gifts', [GiftController::class, 'index'])->name('gifts.index');


Route::get('/prayer-times', function () {
    return view('prayer');
});
Route::post('/api/get-prayer-times', [PrayerTimeController::class, 'getTimes'])->name('prayer-times.get');

Route::get('/prayer-times-monthly', function () {
    return view('prayer-monthly');
});
Route::post('/prayer-times-monthly', [PrayerTimeController::class, 'getMonthlyTimes'])->name('prayer-times.monthly');


Route::get('/symlink', function () {
    $targetFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/public/storage';
    symlink($targetFolder, $linkFolder);
    echo 'Symlink process successfully completed';
});


Route::get('/run-migrations', function () {
    if (env('APP_ENV') === 'production') {
        // Production ortamında ise migration'ı çalıştır
        Artisan::call('migrate', [
            '--force' => true  // --force ile onay vermeden çalıştırılmasını sağlarız
        ]);

        return 'Migrations have been run successfully in production!';
    }

    return 'Migrations can only be run in the production environment.';
});
