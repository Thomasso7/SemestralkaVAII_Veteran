<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SparePart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SparePartsController extends Controller
{
    public function spareParts($model, Request $request)
    {
        $spareParts = DB::table("spare_parts")->where("vehicle_model", "LIKE", $model)->paginate(10);
        if ($request->ajax()) {
            return view('vehicles.spare_parts_data', compact('spareParts'))->render();
        }
        return view('vehicles.spare_parts', compact('spareParts'));
    }

    public function add()
    {
        return view('vehicles.add_spare_part');
    }

    public function editSparePart($id)
    {
        $sparePart = SparePart::find($id);
        return view('vehicles.edit_spare_part', compact('sparePart'));
    }

    public function deleteSparePart($id)
    {
        $sparePart = SparePart::find($id);
        $sparePart->delete();
        return redirect()->back();
    }

    public function uploadSparePart(Request $request)
    {
        $request->validate([
            'name'=>'required|min:4',
            'price'=>'required|integer|min:1',
            'image'=>'required|image|mimes:jpeg,png,jpg,webp'
        ], [
            'name.required'=>'Musíte zadať názov dielu!',
            'name.min'=>'Názov musí obsahovať aspoň 4 znaky!',
            'price.required'=>'Musíte zadať cenu!',
            'price.integer'=>'Cena musí byť číslo!',
            'price.min'=>'Cena musí byť viac ako 0!',
            'image.required'=>'Musíte zvoliť obrázok!',
            'image.image'=>'Súbor musí byť typu obrázok!',
            'image.mimes'=>'Obrázok musí byť vo formáte jpeg, png, jpg alebo webp!'
        ]);
        $sparePart = new SparePart();
        $sparePart->name = $request->name;
        $sparePart->price = $request->price;
        $sparePart->vehicle_model = $request->type;
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('Obrazky'), $imageName);
            $sparePart->image = $imageName;
        }
        $sparePart->save();
        return redirect('/spare_parts/' . $sparePart->vehicle_model);
    }

    public function submitEditSparePart(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|min:4',
            'price'=>'required|integer|min:1',
            'image'=>'image|mimes:jpeg,png,jpg,webp'
        ], [
            'name.required'=>'Musíte zadať názov dielu!',
            'name.min'=>'Názov musí obsahovať aspoň 4 znaky!',
            'price.required'=>'Musíte zadať cenu!',
            'price.integer'=>'Cena musí byť číslo!',
            'price.min'=>'Cena musí byť viac ako 0!',
            'image.required'=>'Musíte zvoliť obrázok!',
            'image.image'=>'Súbor musí byť typu obrázok!',
            'image.mimes'=>'Obrázok musí byť vo formáte jpeg, png, jpg alebo webp!'
        ]);
        $sparePart = SparePart::find($id);
        $sparePart->name = $request->name;
        $sparePart->price = $request->price;
        $sparePart->vehicle_model = $request->type;
        $image = $request->image;
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('Obrazky'), $imageName);
            $sparePart->image = $imageName;
        }
        $sparePart->save();
        return redirect('/spare_parts/' . $sparePart->vehicle_model);
    }
}
