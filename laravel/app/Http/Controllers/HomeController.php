<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $vehicles = Vehicle::all();
        return view('home.index', compact('vehicles'));
    }
}
