<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontendController::class, 'index'])->name('frontend.index');
Route::get('/about', [FrontendController::class, 'about'])->name('frontend.about');
Route::get('/contact', [FrontendController::class, 'contact'])->name('frontend.contact');
Route::get('/faq', [FrontendController::class, 'faq'])->name('frontend.faq');
Route::get('/download', [FrontendController::class, 'download'])->name('frontend.download');
Route::get('/templates', [FrontendController::class, 'templates'])->name('frontend.templates');
Route::get('/create', [FrontendController::class, 'create'])->name('frontend.create');
Route::get('/my-cvs', [FrontendController::class, 'myCvs'])->name('frontend.my_cvs');
Route::get('/my-account', [FrontendController::class, 'myAccount'])->name('frontend.my_account');
