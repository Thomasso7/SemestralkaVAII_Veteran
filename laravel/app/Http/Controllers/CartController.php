<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $user = Auth::user();
        $cartItems = Cart::where('user_id', $user->id)->get();
        return view('cart.cart', compact('cartItems'));
    }

    public function addToCart($id, $type)
    {
        $user = Auth::user();
        $item = new Cart;
        if ($type == "Auto" || $type == "Motorka") {
            $item->category = "Vozidlo";
            $item->vehicle_id = $id;
        } else {
            $item->category = "Diel";
            $item->spare_part_id = $id;
        }
        $item->user_id = $user->id;
        $item->save();
        return redirect()->back();
    }

    public function deleteFromCart($id)
    {
        $item = Cart::find($id);
        $item->delete();
        return redirect()->back();
    }
}
