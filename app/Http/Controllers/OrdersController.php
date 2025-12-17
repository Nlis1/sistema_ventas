<?php

namespace App\Http\Controllers;

use App\Models\detail_order;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Pedidos Realizados';
        $items = Order::all();
        return view('admin.modules.orders.index', compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart',  []);
        
        $item = new Order();
        $item->user_id = Auth::user()->id;
        $item->adress = $request->adress;
        $item->city = $request->city;
        $item->country = $request->country;
        $item->code_order = 'ORD-' . Str::upper(Str::random(8)); // ejemplo: ORD-8FJ3ZKLP
        $item->total = $cart['total'];
        $item->subtotal =  $cart['subtotal'];
        $item->iva= $cart['iva'];
        $item->status = "Pagado";

        if($item->save()){
            foreach ($cart['items'] as $product) {
                $order = new detail_order();
                $order->product_id = $product['id'];
                $order->order_id = $item->id;
                $order->quantity = $product['quantity'];
                $order->price = $product['price'];
                $order->iva = $product['iva'];
                $order->image = $product['image'];
                $order->save();
            }
        }

        session()->forget('cart');
        return to_route('home')->with('success', 'Orden realizada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
