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
    public function cars()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.cars', compact('vehicles'));
    }

    public function motorcycles(Request $request)
    {
        //$vehicles2 = Vehicle::all();
        $vehicles = DB::table("vehicles")->where('type', 'Motorka')->paginate(6);
        if ($request->ajax()) {
            return view('vehicles.motorcycles_data', compact('vehicles'))->render();
        }
        return view('vehicles.motorcycles', compact('vehicles'));
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

    public function addToCart($id)
    {
        $user = Auth::user();
        $item = new Cart;
        $item->user_id = $user->id;
        $item->vehicle_id = $id;
        $item->save();
        return redirect()->back();
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
