<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Place;

class PlaceController extends Controller
{
    public function index()
    {
        $place = Place::all();
        return view('maps.index', [
            'page' => 'pemetaan',
            'title' => 'UAS SIG Dasar',
            'peta' => $place
        ]);
        
    }

    public function create()
    {
        
    }

    public function store(Request $request)
    {
        $peta = new Peta();
        $peta->name = $request->input('name');
        $peta->asal = $request->input('asal');
        $peta->latitude = $request->input('latitude');
        $peta->longitude = $request->input('longitude');
        $peta->save();

        return redirect()->back();
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
}
