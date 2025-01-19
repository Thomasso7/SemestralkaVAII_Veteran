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

    public function addToCart($id)
    {
        $user = Auth::user();
        $item = new Cart;
        $item->user_id = $user->id;
        $item->vehicle_id = $id;
        $item->save();
        return redirect()->back();
    }
}
