<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\FontviewConteoller;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\NewsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FontviewConteoller::class, 'home']);
Route::get('/travel', [FontviewConteoller::class, 'travel']);
Route::get('/sports', [FontviewConteoller::class, 'sports']);
Route::get('/politics', [FontviewConteoller::class, 'politics']);


Route::get('/magazine', [FontviewConteoller::class, 'magazine']);
Route::get('/business', [FontviewConteoller::class, 'business']);
Route::get('/arts', [FontviewConteoller::class, 'arts']);

Route::get('/contact', [FontviewConteoller::class, 'contact']);



Route::get('/admin', [LayoutController::class, 'index']);
Route::get('/Category', [CategoriesController::class, 'create'])->name('Category');
Route::get('/all-Category', [CategoriesController::class, 'index'])->name('all-Category');
Route::post('/save-category', [CategoriesController::class, 'saveCategory']);
Route::get('/Category.publish/{id}', [CategoriesController::class, 'publish'])->name('Category.publish');
Route::get('/Category.unpublish/{id}', [CategoriesController::class, 'unpublish'])->name('Category.unpublish');
Route::get('/edit-category/{id}', [CategoriesController::class, 'editCategory']);
Route::post('/update-category', [CategoriesController::class, 'updateCategory']);
Route::get('/delete-category/{id}', [CategoriesController::class, 'destroy']);


Route::get('/add-news', [NewsController::class, 'create'])->name('add-news');
Route::post('/Save-news', [NewsController::class, 'store'])->name('Save-news');
Route::get('/all-news', [NewsController::class, 'index'])->name('all-news');
Route::get('/edit-news/{id}', [NewsController::class, 'edit']);
Route::post('/update-news', [NewsController::class, 'update']);