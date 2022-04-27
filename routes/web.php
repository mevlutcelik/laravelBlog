<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileEditController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CommentController;

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

// Index
Route::get('/', [HomeController::class, 'index'])->name('home.index');

// Post
Route::get('/posts', [PostsController::class, 'show'])->name('post.show');
Route::get('/post', [PostsController::class, 'show'])->name('post.show');
Route::get('/post/all', [PostsController::class, 'postAll'])->name('post.show.all');
Route::get('/post/{postLink?}', [PostsController::class, 'singlePost'])->name('post.single');

// Comment
Route::post('/post/comment-add', [CommentController::class, 'commentAdd'])->name('comment.add');

// Author
Route::get('/authors', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author', [AuthorController::class, 'show'])->name('author.show');
Route::get('/author/{username?}', [AuthorController::class, 'authorProfile'])->name('author.profile');

// User
Route::group(['middleware' => ['guest']], function() {

   // Guest Register
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    // Guest Login
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');

});

// User (Auth)
Route::group(['middleware' => ['auth']], function() {

    // User Logout
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

    // User Profile
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // User Profile Edit
    Route::get('/profile-edit', [ProfileEditController::class, 'show'])->name('profile.edit');
    Route::post('/profile-edit', [ProfileEditController::class, 'edit'])->name('profile.perform');

    // User New Post
    Route::get('/posts-new', [PostsController::class, 'newPost'])->name('post.new');
    Route::post('/post-new', [PostsController::class, 'newPostSubmit'])->name('post.new.perform');

});
