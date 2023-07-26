<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        dd($user->pizzas);
        $cart_items = Pizza::
        dd($cart_items[0]->pizza);
        return view('cart.index',compact('cart_items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pizza_id' => 'required'
        ]);

        if(Cart::where('pizza_id',$request->pizza_id)->where('user_id',auth()->user()->id)->exists())
        {
            $existing_cart_item = Cart::where('pizza_id',$request->pizza_id)->where('user_id',auth()->user()->id)->get();

            $existing_cart_item[0]->quantity += 1;

            $existing_cart_item[0]->save();

            return redirect()->back();

        }

        Cart::create([
            'user_id' => auth()->user()->id,
            'pizza_id' => $request->pizza_id,
            'quantity' => 1
        ]);

        return redirect()->back();
    }
}
