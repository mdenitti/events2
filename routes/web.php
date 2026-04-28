<?php

use Illuminate\Support\Facades\Route;
use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

Route::get('/', function () {
    $categories = Category::all();
    return view('welcome', compact('categories'));
});

Route::post('/events', function (Request $request) {
    dd($request->categories);

    $event = Event::create([
        'name' => $request->name,
        'description' => $request->description,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date
    ]);

    // Attach the event to the selected categories with the 'featured' pivot value
    $event->categories()->attach($request->categories, [
        'featured' => $request->featured
    ]);

    return redirect('/')->with('success', 'Event created successfully!');
    
});
