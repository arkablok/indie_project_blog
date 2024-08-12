<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetController;
use App\Http\Controllers\Auth\ForgotController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\CommentController;


Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/',[HomeController::class,'home']);

Route::get('signup',[SignupController::class,'index'])->name('signup');
Route::post('signup',[SignupController::class,'store']);

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'store']);

Route::middleware(['auth','is_admin'])->prefix('admin')->group(function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('dashboard/list',[DashboardController::class,'user'])->name('user.data');
    Route::get('/read-post',[PostController::class,'index'])->name('read.post');
    Route::get('/create-post',[PostController::class,'post'])->name('create.post');
    Route::post('/create-post/upload',[PostController::class,'store'])->name('create.post.upload');
    Route::get('/read-post',[PostController::class,'save'])->name('read.post');
    Route::patch('/toggle-post/{post:slug}',[PostController::class,'toggle'])->name('post.toggle');   
    Route::get('/read-post',[PostController::class,'save'])->name('read.post');
    Route::patch('/feature-post/{post:Slug}',[PostController::class,'feature'])->name('post.feature');
    Route::put('/users/{id}/make-admin', [DashboardController::class, 'makeAdmin'])->name('admin.make-admin');
    Route::put('/users/remove-admin/{id}', [DashboardController::class, 'removeAdmin'])->name('admin.remove-admin');
});

// Post Read

Route::get('/post/{post:slug}',[PostController::class,'read'])->name('posts');

// Delete Route

Route::delete('/post/{post:slug}/delete',[PostController::class,'destroy'])->name('post.delete');

// View Content

Route::get('/view-content/{post:slug}',[PostController::class,'content'])->name('view.content');

// Update route

Route::get('/post/update/{post:slug}',[PostController::class,'update'])->name('post.update')->middleware('auth');
Route::patch('/post/update/{post:slug}/now',[PostController::class,'update_post'])->name('post.update.now')->middleware('auth');


// Forgot and Reset Controller

Route::get('/forgot-password',[ForgotController::class,'index'])->middleware('guest')->name('password.request');
Route::post('/forgot-password',[ForgotController::class,'store'])->middleware('guest')->name('password.email');
Route::get('/reset-password',[ResetController::class,'index'])->name('reset.password');
Route::get('/reset-password/{token}',[ResetController::class,'store'])->middleware('guest')->name('password.reset');
Route::post('/reset-password',[ResetController::class,'token'])->middleware('guest')->name('password.update');

// Logout Controller

Route::post('/logout',[LogoutController::class,'destroy'])->name('logout')->middleware('auth');


// Comments Route

 Route::post('/comments/{post:slug}',[CommentController::class,'comment_store'])->name('comments.store')->middleware('auth');

 // Update Comments

 Route::patch('/comments/{comment:comment_num}/{slug}', [CommentController::class, 'update_comments'])->name('comments.update');

 // search

 Route::get('/posts/search', [PostController::class, 'search'])->name('posts.search');