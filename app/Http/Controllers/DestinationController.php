<?php

namespace App\Http\Controllers;

use App\Models\Planet;

class DestinationController extends Controller
{
    public function index()
    {
        $planets = Planet::all();

        return view('destination', compact('planets'));
    }
}
