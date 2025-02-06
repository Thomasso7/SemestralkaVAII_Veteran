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
        $vehicles = DB::table('vehicles')->where('title', 'LIKE', "%{$text}%")->get();
        $spareParts = DB::table('spare_parts')->where('name', 'LIKE', "%{$text}%")->get();
        $results = $vehicles->merge($spareParts);
        return response()->json($results);
    }
}
