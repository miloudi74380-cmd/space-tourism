<?php

namespace App\Http\Controllers;

use App\Models\CrewMember;
use Illuminate\Http\Request;

class CrewController extends Controller
{
    public function index()
    {
        $crew = CrewMember::all();
        return view('crew', compact('crew'));
    }
}
