<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function cars()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.cars', compact('vehicles'));
    }

    public function add()
    {
        return view('vehicles.add');
    }

    public function uploadVehicle(Request $request)
    {
        $vehicle = new Vehicle;
        $vehicle->title = $request->title;
        $vehicle->description = $request->description;
        $vehicle->price = $request->price;
        $vehicle->type = $request->type;
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('Obrazky'), $imageName);
            $vehicle->image = $imageName;
        }
        $vehicle->save();
        return redirect('/cars');
    }

    public function deleteVehicle($id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        return redirect()->back();
    }

    public function editVehicle($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.edit', compact('vehicle'));
    }

    public function submitEdit(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->title = $request->title;
        $vehicle->description = $request->description;
        $vehicle->price = $request->price;
        $vehicle->type = $request->type;
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('Obrazky'), $imageName);
            $vehicle->image = $imageName;
        }
        $vehicle->save();
        return redirect('/cars');
    }
}
