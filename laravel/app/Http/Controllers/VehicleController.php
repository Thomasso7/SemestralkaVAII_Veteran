<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\error;

class VehicleController extends Controller
{
    public function cars(Request $request)
    {
        $cars = DB::table("vehicles")->where('type', 'LIKE','Auto')->paginate(6);
        if ($request->ajax()) {
            return view('vehicles.cars_data', compact('cars'))->render();
        }
        return view('vehicles.cars', compact('cars'));
    }

    public function motorcycles(Request $request)
    {
        $motorcycles = DB::table("vehicles")->where('type', 'LIKE','Motorka')->paginate(6);
        if ($request->ajax()) {
            return view('vehicles.motorcycles_data', compact('motorcycles'))->render();
        }
        return view('vehicles.motorcycles', compact('motorcycles'));
    }

    public function vehicle($id)
    {
        $vehicle = Vehicle::find($id);
        return view('vehicles.vehicle', compact('vehicle'));
    }

    public function add()
    {
        return view('vehicles.add');
    }

    public function uploadVehicle(Request $request)
    {
        $request->validate([
            'title'=>'required|min:4',
            'description'=>'required|max:200',
            'price'=>'required|integer|min:1',
            'image'=>'required|image|mimes:jpeg,png,jpg,webp'
        ], [
            'title.required'=>'Musíte zadať názov vozidla!',
            'title.min'=>'Názov musí obsahovať aspoň 4 znaky!',
            'description.required'=>'Musíte zadať popis!',
            'description.max'=>'Popis musí byť kratší ako 200 znakov!',
            'price.required'=>'Musíte zadať cenu!',
            'price.integer'=>'Cena musí byť číslo!',
            'price.min'=>'Cena musí byť viac ako 0!',
            'image.required'=>'Musíte zvoliť obrázok!',
            'image.image'=>'Súbor musí byť typu obrázok!',
            'image.mimes'=>'Obrázok musí byť vo formáte jpeg, png, jpg alebo webp!'
        ]);
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
        if ($vehicle->type == 'Auto') {
            return redirect('/cars');
        }
        return redirect('/motorcycles');
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
        $request->validate([
            'title'=>'required|min:4',
            'description'=>'required|max:200',
            'price'=>'required|integer|min:1',
            'image'=>'image|mimes:jpeg,png,jpg,webp'
        ], [
            'title.required'=>'Musíte zadať názov vozidla!',
            'title.min'=>'Názov musí obsahovať aspoň 4 znaky!',
            'description.required'=>'Musíte zadať popis!',
            'description.max'=>'Popis musí byť kratší ako 200 znakov!',
            'price.required'=>'Musíte zadať cenu!',
            'price.integer'=>'Cena musí byť číslo!',
            'price.min'=>'Cena musí byť viac ako 0!',
            'image.image'=>'Súbor musí byť typu obrázok!',
            'image.mimes'=>'Obrázok musí byť vo formáte jpeg, png, jpg alebo webp!'
        ]);
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
        if ($vehicle->type == 'Auto') {
            return redirect('/cars');
        }
        return redirect('/motorcycles');
    }
}
