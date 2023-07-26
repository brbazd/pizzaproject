<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Pizza;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $ongoing_order = Order::where('user_id',auth()->user()->id)->where('status','pending')->first();

        if(!$ongoing_order)
        {
            $ongoing_order = Order::create([
                'user_id' => auth()->user()->id,
                'total' => 0
            ]);
        }

        $existing_cart = Cart::where('pizza_id',$request->pizza_id)->where('order_id',$ongoing_order->id)->first();

        if($existing_cart)
        {
            $existing_cart->qty += $request->qty;
            $existing_cart->save();
        }
        else
        {
            $cart = Cart::create([
                'order_id' => $ongoing_order->id,
                'pizza_id' => (int)$request->pizza_id,
                'qty' => $request->qty
            ]);
        }



        // dd($cart->pizza);

        $total = 0;
        foreach($ongoing_order->carts as $cart)
        {
            $price = $cart->qty * $cart->pizza->price;
            $total += $price;
        }

        $ongoing_order->total += $total;

        $ongoing_order->save();

        return redirect(route('pizzas.index'));
    }

    public function show()
    {
        $order = Order::where('user_id',auth()->user()->id)->where('status','pending')->first();

        $carts = $order->carts;

        return view('cart.index',compact('order','carts'));
    }
}
