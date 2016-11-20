<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('cats');
});

Route::get('cats', function(){
    return 'All cats';
});

Route::get('cats/{cat}', function(Furbook\Models\Cat $cat){
    return view('partials.cats.show')->with('cat', $cat);
})->where('id', '[0-9]+'); 

Route::get('cats/breeds/{name}', function($name){
    $breed = Furbook\Models\Breed::with('cats')
        ->whereName($name)
        ->first();

    return view('partials.cats.index')
        ->with('breed', $breed)
        ->with('cats', $breed->cats);
});

Route::get('about', function(){
    return view('partials.about')->with('number_of_cats', 9000);
});