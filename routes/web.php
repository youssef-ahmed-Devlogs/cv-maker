<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\UserController;
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
  Route::get('/login', [AdminAuthController::class, 'loginView'])->name('loginView')->middleware('guest');
  Route::post('/login', [AdminAuthController::class, 'login'])->name('login')->middleware('guest');

  Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('', [AdminController::class, 'index'])->name('index');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');

    Route::group(['prefix' => '/users', 'as' => 'users.'], function () {
      Route::get('', [UserController::class, 'index'])->name('index');
      Route::post('', [UserController::class, 'store'])->name('store');
      Route::get('/create', [UserController::class, 'create'])->name('create');
      Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
      Route::put('/{user}', [UserController::class, 'update'])->name('update');
      Route::get('/{user}/show', [UserController::class, 'show'])->name('show');
      Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    });


    Route::group(['prefix' => '/cities', 'as' => 'cities.'], function () {
      Route::get('/ajax', [CityController::class, 'ajaxCities'])->name('ajaxCities');
    });
  });
});

// =============== End Admin ===============
