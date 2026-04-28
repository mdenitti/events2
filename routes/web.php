<?php

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = Category::all();
    return view('welcome', compact('categories'));
});

Route::get('/events', function () {
    $events = Event::with('categories')->get();
    return view('events', compact('events'));
});

Route::get('/events/edit/{id}', function ($id) {
    $event      = Event::with('categories')->findOrFail($id);
    $categories = Category::all();
    return view('edit', compact('event', 'categories'));
});

Route::post('/events/update/{id}', function (Request $request, $id) {
    $event = Event::findOrFail($id);

    $event->update([
        'name'        => $request->name,
        'description' => $request->description,
        'start_date'  => $request->start_date,
        'end_date'    => $request->end_date,
    ]);

    // Prepare the sync data no need to include 'featured' in the sync data
    $event->categories()->sync($request->categories);

    return redirect('/events')->with('success', 'Event updated successfully!');
});

Route::get('/events/delete/{id}', function ($id) {
    $event = Event::findOrFail($id);
    $event->categories()->detach(); // Detach all categories first
    $event->delete();               // Then delete the event

    return redirect('/events')->with('success', 'Event deleted successfully!');
});

Route::post('/events', function (Request $request) {
    dd($request->categories);

    $event = Event::create([
        'name'        => $request->name,
        'description' => $request->description,
        'start_date'  => $request->start_date,
        'end_date'    => $request->end_date,
    ]);

    // Attach the event to the selected categories with the 'featured' pivot value
    $event->categories()->attach($request->categories, [
        'featured' => $request->featured,
    ]);

    return redirect('/')->with('success', 'Event created successfully!');

});
