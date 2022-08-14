<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

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

// Get all listings
Route::get('/', [ListingController::class, 'index']);


// Showing create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// creating listing data
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// Showing edit form
Route::get('/listings/{listing}/edit', [ListingController::class, 'edit'])->middleware('auth');

// Update single listing
Route::put('/listings/{listing}/update', [ListingController::class, 'update'])->middleware('auth');

// Remove single listing
Route::delete('/listings/{listing}/remove', [ListingController::class, 'remove'])->middleware('auth');

// Get single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

// User Routes

// User Register form
Route::get('/register', [UserController::class, 'create'])->middleware('guest');

// User storing
Route::post('/users', [UserController::class, 'store']);

// Logout for user
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

// Show login form
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// Logging in user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

// Common resources Routes:
// index - showing all listings
// show - showing single listing
// create - showing the form new listing
// store - creating and storing a new listing 
// edit - show form to edit listing
// update - update single listing
// destroy - removing single listing

// CONSTRAINTS
// Route::get('/posts/{id}', function($id){
//     return response('post ' . $id);
// })->where('id', '[0-9]+');

// Route::get('/posts/{id}', function($id){
//     return response('post ' . $id);
// });

// Route::get('/search', function(Request $request){
//     return $request->name . ' ' . $request->city;
// });