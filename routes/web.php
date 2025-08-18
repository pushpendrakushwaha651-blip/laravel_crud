<?php

use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::get('/', 'showUsers')->name('home');
    Route::get('/user/{id}', 'singelUser')->name('view.user');

    Route::get('/delete/{id}', 'deleteUser')->name('delete.user');

    Route::post('/update/{id}', 'updateUser')->name('update.user');

    Route::get('/updatePage/{id}', 'updatePage')->name('update.page');

    Route::post('/add', 'addUser')->name('add.user');
});

// अलग view routes (controller के बिना)
Route::view('/newuser', 'adduser')->name('add.user.page');

// routes/web.php
Route::get('/search', [UserController::class, 'search'])->name('search.users');

//   login page 

Route::get('/login', function () {
    return view('login');
})->name('login.page');

Route::post('/login', function (Request $request) {
    $username = $request->input('username');
    $password = $request->input('password');

    if ($username === 'admin' && $password === 'admin123456') {
        return redirect()->route('home')->with('success', 'Login Successful!');
    } else {
        return redirect()->route('login.page')->with('error', 'Invalid Username or Password!');
    }
})->name('login.check');

// Home Page -> showUsers
Route::get('/', [UserController::class, 'showUsers'])->name('home');