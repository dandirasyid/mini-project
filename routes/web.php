<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\DetailPostingController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\PostingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchingController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginUser'])->name('login.user');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Profile
Route::get('/myProfile', [ProfileController::class, 'index'])->name('profile')->middleware('authenticate');
Route::post('/confirmPass', [ProfileController::class, 'confirmPass'])->name('profile.pass')->middleware('authenticate');
Route::get('/editProfile', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['authenticate']);
Route::post('/updateProfile', [ProfileController::class, 'update'])->name('profile.update')->middleware(['authenticate']);

// Following
Route::get('/seeFollowing', [FollowingController::class, 'index'])->name('following')->middleware('authenticate');
Route::delete('/following/unfollow/{user}', [FollowingController::class, 'unfollow'])->name('following.unfollow')->middleware('authenticate');
// Followers
Route::get('/seeFollower', [FollowerController::class, 'index'])->name('follower')->middleware('authenticate');
Route::delete('/follower/{follower}/unfollow', [FollowerController::class, 'unfollow'])->name('follower.unfollow')->middleware('authenticate');

// Beranda
Route::get('/', [BerandaController::class, 'home'])->name('home');
Route::get('/home', [BerandaController::class, 'home'])->name('home');
Route::get('/home2', [BerandaController::class, 'homeFollowing'])->name('home.following');

// Detail Posting
Route::get('/seePost/{post_id}', [DetailPostingController::class, 'show'])->name('seePost');

// Explore
Route::get('/searching', [SearchingController::class, 'search'])->name('search');

// Notifikasi
Route::get('/myNotifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.all')->middleware('authenticate');
Route::get('/myNotifikasi/comments', [NotifikasiController::class, 'comments'])->name('notifikasi.comments')->middleware('authenticate');
Route::get('/myNotifikasi/likes', [NotifikasiController::class, 'likes'])->name('notifikasi.likes')->middleware('authenticate');

// Posting
Route::get('/formPost', [PostingController::class, 'index'])->name('posting')->middleware('authenticate');
Route::post('/formPost', [PostingController::class, 'store'])->name('posting.store')->middleware('authenticate');

// Bookmarks
Route::get('/MyBookmark', [BookmarkController::class, 'index'])->name('bookmark')->middleware('authenticate');
Route::post('/posts/{post}/bookmarks', [BookmarkController::class, 'store'])->name('bookmark.store')->middleware('authenticate');

// Like dan Unlike
Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posting.like')->middleware('authenticate');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posting.like')->middleware('authenticate');

// Follow dan Unfollow
Route::post('/user/{user}/follow', [UserController::class, 'follow'])->name('follow');
Route::delete('/user/{user}/unfollow', [UserController::class, 'unfollow'])->name('unfollow');