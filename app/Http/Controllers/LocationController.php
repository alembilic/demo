<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::with('country')->paginate(1);
        return view('locations', compact('locations'));
    }

    public function create()
    {
        $countries = Country::get();
        return view('locations-create', compact('countries'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'address' => 'required|string' ,
            'country_id' => 'required' ,
        ]);

        Location::create($data);

        return redirect()->to(route('locations'));
    }
}
