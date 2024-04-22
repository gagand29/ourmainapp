<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\MustBeLoggedIn;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;



Route::get('/admins-only', function(){
    if(Gate::allows('visitAdminPages')){
        return 'only admins should able to see this page.';
    }
    return 'you cannot view this page';
});
//->middleware('can:visitAdminPages');

//user related routes
Route::get('/', [UserController::class, "showCorrectHomepage"])->name('login');

Route::post('/register',[UserController::class, "register"])->middleware('guest');

Route::post('/login',[UserController::class, "login"])->middleware('guest');

Route::post('/logout',[UserController::class, "logout"])->middleware('auth');

Route::get('/manage-avatar',[UserController::class,'showAvatarForm'])->middleware('auth');

Route::post('/manage-avatar',[UserController::class,'storeAvatar'])->middleware('auth');


//follow related routes
Route::post('/create-follow/{user:username}',[FollowController::class,'createFollow'])->middleware('auth');

Route::post('/remove-follow/{user:username}',[FollowController::class,'removeFollow'])->middleware('auth');


// Blog post related routes

Route::get('/create-post',[PostController::class, 'showCreateForm'])->middleware('auth');

Route::post('/create-post',[PostController::class, 'storeNewPost'])->middleware('auth');

Route::get('/post/{post}',[PostController::class, 'viewSinglePost']);

Route::delete('/post/{post}',[PostController::class, 'delete'])->middleware('can:delete,post');

Route::get('/post/{post}/edit',[PostController::class, 'showEditForm'])->middleware('can:update,post');

Route::put('/post/{post}',[PostController::class, 'actuallyUpdate'])->middleware('can:update,post');
   
//profile related routes

Route::get('/profile/{user:username}',[UserController::class, 'profile']);

Route::get('/profile/{user:username}/followers',[UserController::class, 'profileFollowers']);

Route::get('/profile/{user:username}/following',[UserController::class, 'profileFollowing']);