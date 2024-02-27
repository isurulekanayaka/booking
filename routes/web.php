<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BusController;
use App\Http\Controllers\UserController;

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


// Route::get('/contact', function () {
//     return view('user/contactUs');
// });
// Route::get('/fqa', function () {
//     return view('user/fqa');
// });
Route::get('/login', function () {
    return view('auth/login');
});
Route::get('/register', function () {
    return view('auth/register');
});
// Route::get('/booking', function () {
//     return view('booking/booking');
// });
// Route::get('/tmp', function () {
//     return view('admin/template');
// });
Route::get('/add-user', function () {
    return view('admin/add-user');
});
Route::get('/add-root', function () {
    return view('admin/add-root');
});
Route::get('/add-bus', function () {
    return view('admin/add-bus');
});

// User Controller
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::get('/', [UserController::class,'index'])->name('user.home');
Route::get('/contact', [UserController::class,'contact'])->name('user.contact');
Route::get('/fqa', [UserController::class,'fqa'])->name('user.fqa');
Route::get('/booking', [UserController::class,'booking'])->name('user.booking');

// Define routes for user authentication
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login'])->name('login.post');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');


Route::get('/edit-user/{id}', [UserController::class, 'editUser'])->name('admin.edit-user');
Route::post('/update-user/{id}', [UserController::class, 'updateUser'])->name('admin.update-user');
Route::delete('/delete-user/{id}', [UserController::class, 'deleteUser'])->name('admin.delete-user');


// Protected routes requiring authentication
Route::middleware(['auth'])->group(function () {
    // Route for the user's profile
    Route::get('/profile', [UserController::class, 'profile'])->name('user.profile');
    Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('user.profile.update');
});

// Bus Controller
Route::post('/busregister', [BusController::class, 'register'])->name('busregister');
Route::get('/tmp', [BusController::class, 'index'])->name('admin.template');
Route::post('/bus-search', [BusController::class, 'search'])->name('bus-search');
Route::post('/bus-seat', [BusController::class, 'seat'])->name('bus-seat');
Route::post('/select-seat', [BusController::class, 'select'])->name('select-seat');

Route::get('/edit-bus/{id}', [BusController::class, 'editBus'])->name('admin.edit-bus');
Route::delete('/delete-bus/{id}', [BusController::class, 'deleteBus'])->name('admin.delete-bus');

Route::post('/update-bus/{id}', [BusController::class, 'updateBus'])->name('admin.update-bus');

// Route to show the form for selecting seats
Route::get('/select-seats', [BusController::class, 'showSeats'])->name('show-seats');

// Route to handle seat selection submission
Route::post('/select-seats', [BusController::class, 'selectSeats'])->name('select-seats');
