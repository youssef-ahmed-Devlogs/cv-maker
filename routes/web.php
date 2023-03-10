<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\AuthController;
use App\Http\Controllers\Frontend\CvController;
use App\Http\Controllers\Frontend\EducationController;
use App\Http\Controllers\Frontend\ExperienceController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\ProjectController;
use App\Http\Controllers\Frontend\SkillController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\SubscriptionController;
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
    Route::post('my-account', [FrontendController::class, 'updateMyAccount'])->name('update_my_account');
    Route::post('my-password', [FrontendController::class, 'updateMyPassword'])->name('update_my_password');
    Route::get('my-cvs', [FrontendController::class, 'myCvs'])->name('my_cvs');
    Route::get('create', [FrontendController::class, 'create'])->name('create');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // SUBSCRIPTIONS
    Route::get('subscription', [SubscriptionController::class, 'index'])->name('subscription');
    Route::post('subscription/{plan}', [SubscriptionController::class, 'subscribe'])->name('subscription.subscribe');
    Route::delete('unsubscribe/{plan}', [SubscriptionController::class, 'unsubscribe'])->name('subscription.unsubscribe');
    Route::get('subscription/success', [SubscriptionController::class, 'subscribe_success'])->name('subscription.success');
    Route::get('subscription/cancel', [SubscriptionController::class, 'subscribe_cancel'])->name('subscription.cancel');

    Route::get('{template}/create', [CvController::class, 'create'])->name('cvs.create');
    Route::get('{cv}/cv', [CvController::class, 'edit'])->name('cvs.edit');
    Route::patch('{cv}/update', [CvController::class, 'update'])->name('cvs.update');
    Route::get('{cv}/download', [CvController::class, 'download'])->name('cvs.download');
    Route::get('{cv}/share', [CvController::class, 'share'])->name('cvs.share');
    Route::delete('{cv}/destroy', [CvController::class, 'destroy'])->name('cvs.destroy');

    Route::post('{cv}/education', [EducationController::class, 'addSection'])->name('cvs.education.addSection');
    Route::delete('{cv}/education', [EducationController::class, 'removeSection'])->name('cvs.education.removeSection');

    Route::post('{cv}/experience', [ExperienceController::class, 'addSection'])->name('cvs.experience.addSection');
    Route::delete('{cv}/experience', [ExperienceController::class, 'removeSection'])->name('cvs.experience.removeSection');

    Route::post('{cv}/project', [ProjectController::class, 'addSection'])->name('cvs.project.addSection');
    Route::delete('{cv}/project', [ProjectController::class, 'removeSection'])->name('cvs.project.removeSection');

    Route::post('{cv}/language', [LanguageController::class, 'addSection'])->name('cvs.language.addSection');
    Route::delete('{cv}/language', [LanguageController::class, 'removeSection'])->name('cvs.language.removeSection');

    Route::post('{cv}/skill', [SkillController::class, 'addSection'])->name('cvs.skill.addSection');
    Route::delete('{cv}/skill', [SkillController::class, 'removeSection'])->name('cvs.skill.removeSection');
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

    Route::group(['prefix' => '/notifications', 'as' => 'notifications.'], function () {
      Route::get('', [NotificationController::class, 'index'])->name('index');
      Route::get('/{notification_id}/read', [NotificationController::class, 'read'])->name('read');
      Route::get('mark-all-as-read', [NotificationController::class, 'markAllAsRead'])->name('markAllAsRead');
    });

    Route::resource('categories', CategoryController::class);
    Route::resource('templates', TemplateController::class);
  });

  Route::group(['middleware' => 'auth', 'prefix' => '/cities', 'as' => 'cities.'], function () {
    Route::get('/ajax', [CityController::class, 'ajaxCities'])->name('ajaxCities');
  });
});

// =============== End Admin ===============
