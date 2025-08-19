 <?php

 

    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;


// Route::controller(UserController::class)->group(function () {
//     Route::get('/', 'showUsers')->name('home');
//     Route::get('/user/{id}', 'singelUser')->name('view.user');

//     Route::get('/delete/{id}', 'deleteUser')->name('delete.user');

//     Route::post('/update/{id}', 'updateUser')->name('update.user');

//     Route::get('/updatePage/{id}', 'updatePage')->name('update.page');

//     Route::post('/add', 'addUser')->name('add.user');
// });

// // अलग view routes (controller के बिना)
// Route::view('/newuser', 'adduser')->name('add.user.page');

// // routes/web.php
// Route::get('/search', [UserController::class, 'search'])->name('search.users');

// //   login page 
// // Login form
// Route::get('/login', function () {
//     return view('login');
// })->name('login.page');

// // Login action
// // Route::post('/login', [UserController::class, 'login'])->name('login.action');
// Route::get('/', [UserController::class, 'showUsers'])->name('home');




// ✅ Ab pura flow sahi hai:

// GET /login → login form show karega

// POST /login → user credentials check karega

// Password check karega bcrypt + plain text dono

// Priya Yadav
// 984567890
// password123

// Pushpendra Kushwaha
// 977050872 
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\UserController;

// User controller routes
// Route::controller(UserController::class)->group(function () {
//     Route::get('/user/{id}', 'singelUser')->name('view.user')->middleware('check.login');
//     Route::get('/delete/{id}', 'deleteUser')->name('delete.user')->middleware('check.login');
//     Route::post('/update/{id}', 'updateUser')->name('update.user')->middleware('check.login');
//     Route::get('/updatePage/{id}', 'updatePage')->name('update.page')->middleware('check.login');
//     Route::post('/add', 'addUser')->name('add.user')->middleware('check.login');
// });

// // Separate view routes
// Route::view('/newuser', 'adduser')->name('add.user.page')->middleware('check.login');

// // Search route
// Route::get('/search', [UserController::class, 'search'])->name('search.users')->middleware('check.login');

// // Login routes (no middleware)
// Route::get('/login', function () {
//     return view('login');
// })->name('login.page');

// Route::post('/login', [UserController::class, 'login'])->name('login.action');

// // Home page → protected by middleware
// Route::get('/', [UserController::class, 'showUsers'])->name('home')->middleware('check.login');

// // middlewar
// Route::get('/', [UserController::class, 'showUsers'])->name('home')->middleware('check.login');
// Route::get('/user/{id}', [UserController::class, 'singelUser'])->middleware('check.login');
// Route::get('/delete/{id}', [UserController::class, 'deleteUser'])->middleware('check.login');
// // baaki routes bhi same tarike se


// Login routes (public)
Route::get('/', function () {
    return view('login');
})->name('login.page');

Route::post('/login', [UserController::class, 'login'])->name('login.action');

// Home page → only accessible after login
Route::get('/home', [UserController::class, 'showUsers'])
    // ->middleware('check.login')
    ->name('home');

// Other protected routes
Route::get('/user/{id}', [UserController::class, 'singelUser'])
    // ->middleware('check.login')
    ->name('view.user');

Route::get('/delete/{id}', [UserController::class, 'deleteUser'])
    // ->middleware('check.login')
    ->name('delete.user');

Route::post('/update/{id}', [UserController::class, 'updateUser'])
    // ->middleware('check.login')
    ->name('update.user');

Route::get('/updatePage/{id}', [UserController::class, 'updatePage'])
    // ->middleware('check.login')
    ->name('update.page');

Route::post('/add', [UserController::class, 'addUser'])
    // ->middleware('check.login')
    ->name('add.user');

Route::view('/newuser', 'adduser')
    // ->middleware('check.login')
    ->name('add.user.page');

Route::get('/search', [UserController::class, 'search'])
    // ->middleware('check.login')
    ->name('search.users');

    // Logout route
Route::post('/logout', [UserController::class, 'logout'])->name('logout.action');



