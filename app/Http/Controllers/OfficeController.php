<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::with('location.country')->paginate(1);
        return view('offices', compact('offices'));
    }

    public function create()
    {
        $locations = Location::get();
        return view('offices-create', compact('locations'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string' ,
            'location_id' => 'required' ,
        ]);

        Office::create($data);

        return redirect()->to(route('offices'));
    }
}
