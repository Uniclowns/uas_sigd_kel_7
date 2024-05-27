<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $place = Place::get();
        return view('maps.index', [
            'places' => $place
        ]);
        
    }

    public function create()
    {
        $place = Place::get();
        return view('maps.create', [
            'places' => $place
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required'
        ]);

        Place::create($validated);

        return redirect()->route('maps.index');
    }

    public function edit()
    {
        
    }

    public function update(Request $request)
    {
        
    }

    public function delete()
    {
        
    }

    public function show()
    {
        
    }

    public function menu()
    {
        return view('maps.menu', [
            'places' => Place::get(),
        ]);
    }
}
