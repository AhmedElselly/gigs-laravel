<?php

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

Route::get('/', function () {
    return view('listings', [
        'heading' => 'Latest listings',
        'listings' => Listing::all()
    ]);
});

Route::get('/listings/{id}', function($id){
    $listing = Listing::find($id);
    if($listing){
        return view('listing', [
            'listing' => $listing
        ]);
    } else {
        abort(404);
    }    
});

Route::get('/hello', function(){
    return response('<h1>Hello, World</h1>', 200)
        ->header('Content-Type', 'html');
});

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