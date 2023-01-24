<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

Route::post("/localization", [LocalizationController::class, 'changeLanguage'])->name('localization.change_language');

// =============== Start Frontend ===============

Route::group(['prefix' => '/', 'as' => 'frontend.'], function () {
  Route::middleware(['guest'])->group(function () {
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register'])->name('register');
  });

  Route::middleware(['auth'])->group(function () {
    Route::get('my-account', [FrontendController::class, 'myAccount'])->name('my_account');
    Route::get('my-cvs', [FrontendController::class, 'myCvs'])->name('my_cvs');
    Route::get('create', [FrontendController::class, 'create'])->name('create');
    Route::get('download', [FrontendController::class, 'download'])->name('download');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
  });

  Route::get('', [FrontendController::class, 'index'])->name('index');
  Route::get('about', [FrontendController::class, 'about'])->name('about');
  Route::get('contact', [FrontendController::class, 'contact'])->name('contact');
  Route::get('faq', [FrontendController::class, 'faq'])->name('faq');
  Route::get('templates', [FrontendController::class, 'templates'])->name('templates');
});

// =============== End Frontend ===============


// =============== Start Admin ===============

Route::group(['prefix' => '/admin', 'as' => 'admin.'], function () {
  Route::get('/login', [AdminController::class, 'index'])->name('login')->middleware('guest');

  Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    Route::get('/users/create', [AdminController::class, 'create'])->name('create');
  });
});

// =============== End Admin ===============
