<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $vehicles = Vehicle::all();
        return view('home.index', compact('vehicles'));
    }

    public function search(Request $request)
    {
        $text = $request->input('query');
        $results = DB::table('vehicles')->where('title', 'LIKE', "%{$text}%")->get();
        return response()->json($results);
    }
}
