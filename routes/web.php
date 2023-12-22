<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class, 'main'])->name('main');
Route::get('about',[PageController::class, 'about'])->name('about');
Route::get('service',[PageController::class, 'service'])->name('service');
Route::get('price',[PageController::class, 'price'])->name('price');
Route::get('location',[PageController::class, 'location'])->name('location');
Route::get('contact',[PageController::class, 'contact'])->name('contact');

// Route::get('posts',[PostController::class, 'index'])->name('posts.index');
// Route::get('posts/{post}', [PostController::class, 'show'])->name('post.show');
// Route::get('posts/create', [PostController::class, 'create'])->name('post.create');
// Route::post('posts/create', [PostController::class, 'store'])->name('post.store');
// Route::get('posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
// Route::put('posts/{post}/edit', [PostController::class, 'update'])->name('post.update');
// Route::delete('posts/{post}/delete', [PostController::class, 'delete'])->name('post.delete');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('authenticate',[AuthController::class, 'authenticate'])->name('authenticate');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('register', [AuthController::class, 'register_store'])->name('register.store');


Route::resources([
    'posts' => PostController::class,
    'comments' => CommentController::class,
]);






