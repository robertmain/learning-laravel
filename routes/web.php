<?php
use Illuminate\Support\Facades\Input;

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

Route::get('cats', function() {
    return 'All cats';
});

Route::get('cats/create', function() {
    return view('partials.cats.create');
});

Route::get('cats/{cat}', function(Furbook\Models\Cat $cat) {
    return view('partials.cats.show')->with('cat', $cat);
})->where('id', '[0-9]+'); 

Route::get('cats/breeds/{name}', function($name) {
    $breed = Furbook\Models\Breed::with('cats')
        ->whereName($name)
        ->first();

    return view('partials.cats.index')
        ->with('breed', $breed)
        ->with('cats', $breed->cats);
});

Route::get('about', function() {
    return view('partials.about')->with('number_of_cats', 9000);
});

Route::post('cats', function() {
    $cat = Furbook\Models\Cat::create(Input::all());

    return redirect('cats/' . $cat->id)
            ->withSuccess('Cat has been created.');
});

Route::get('cats/{cat}/edit', function(Furbook\Models\Cat $cat) {
    return view('partials.cats.edit')->with('cat', $cat);
});

Route::put('cats/{cat}', function(Furbook\Models\Cat $cat) {
    $cat->update(Input::all());
    return redirect('cats/' . $cat->id)
            ->withSuccess('Cat has been updated');
});

Route::delete('cats/{cat}', function(Furbook\Models\Cat $cat) {
    $cat->delete();
    return redirect('cats')
            ->withSuccess('Cat has been deleted');
});