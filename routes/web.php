<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\MailController;

Route::middleware(['web'])->group(function () {
    // Main Routes
    Route::get('/', function () {
        return view('intro'); // intro avec logo
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');

    // Reviews Routes
    Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');
    Route::get('/reviews/create', [ReviewController::class, 'create'])->name('reviews.create')->middleware('auth');
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store')->middleware('auth');

    // Authentication Routes
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    // Contact Form Submission
    Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

    // Profile Routes (authenticated users only)
    Route::middleware(['auth'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });
    // Admin Routes (authenticated admin users only)
    Route::middleware(['auth'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/users', [AdminController::class, 'users'])->name('admin.users');

        // Page Settings Routes
        Route::get('/page-settings', [App\Http\Controllers\Admin\PageSettingController::class, 'index'])->name('admin.page-settings.index');
        Route::get('/page-settings/create', [App\Http\Controllers\Admin\PageSettingController::class, 'create'])->name('admin.page-settings.create');
        Route::post('/page-settings', [App\Http\Controllers\Admin\PageSettingController::class, 'store'])->name('admin.page-settings.store');
        Route::get('/page-settings/{id}/edit', [App\Http\Controllers\Admin\PageSettingController::class, 'edit'])->name('admin.page-settings.edit');
        Route::put('/page-settings/{id}', [App\Http\Controllers\Admin\PageSettingController::class, 'update'])->name('admin.page-settings.update');
        Route::delete('/page-settings/{id}', [App\Http\Controllers\Admin\PageSettingController::class, 'destroy'])->name('admin.page-settings.destroy');

        // Messages management
        Route::get('/messages', [ContactController::class, 'adminIndex'])->name('admin.messages');
        Route::patch('/messages/{message}/status', [ContactController::class, 'updateStatus'])->name('admin.messages.update-status');
        Route::delete('/messages/{message}', [ContactController::class, 'destroy'])->name('admin.messages.destroy');
        
        // User management routes
        Route::get('/users/{id}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
        Route::put('/users/{id}', [AdminController::class, 'updateUser'])->name('admin.users.update');
        Route::delete('/users/{id}', [AdminController::class, 'deleteUser'])->name('admin.users.delete');
        Route::put('/users/{id}/toggle-block', [AdminController::class, 'toggleBlock'])->name('admin.users.toggleBlock');


        // Project management routes
        Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects');
        Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
        Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
        Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('admin.projects.update');
        Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.delete');
        Route::delete('/project-images/{id}', [ProjectController::class, 'deleteImage'])->name('admin.projects.deleteImage');

        // Reviews management routes
        Route::get('/reviews', [ReviewController::class, 'adminIndex'])->name('admin.reviews.index');
        Route::get('/reviews/{id}/edit', [ReviewController::class, 'edit'])->name('admin.reviews.edit');
        Route::put('/reviews/{id}', [ReviewController::class, 'update'])->name('admin.reviews.update');
        Route::delete('/reviews/{id}', [ReviewController::class, 'destroy'])->name('admin.reviews.destroy');
});
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');    });

Route::get('/send-test-mail', [MailController::class, 'sendTestMail']);

