<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Carrito de compras';
                //session()->remove('cart');
            return view('frontend.modules.products.cart',compact('titulo'));
    }

    public function obtenerCarrito(){
        $cart = session()->get('cart',  []);
        return response()->json($cart );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function add(Request $request, $id)
    {
        $image = Image::find($id);
        $product = Product::findOrFail($id);
        $cart = session()->get('cart.items', [])  ;

        if (isset($cart[$id])) { 
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price_venta,
                "quantity" => 1,
                "iva" => $product->iva,
                "image" => $image->route,
            ];
        }
        
        session()->put('cart.items', $cart);
        $this->sumaTotal();
        $this->obtenerCarrito();

        return response()->json([
            "message" => "Producto agregado",
            "cart_count" => array_sum(array_column($cart, 'quantity')),
        ]);

    }

    public function sumaTotal(){
        $subtotal = 0;
        $iva = 0;

        $cartItems = session()->get('cart.items', []);

      foreach ($cartItems  as $product) {
              $subtotal += $product['price'] * $product['quantity'];
             $iva += $product['iva'] * $product['price'] / 100;
        }

        $total = $subtotal + $iva;
         session()->put('cart', [   
        'items'    => $cartItems,
        'subtotal' => $subtotal,
        'iva'      => $iva,
        'total'    => $total,
        'cart_count' => array_sum(array_column($cartItems, 'quantity'))
        ]);

        return $total;
    }

    public function remove($id){
        $cart = session()->get('cart.items', []);
        
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart.items', $cart);
        }

        $this->sumaTotal();

        return response()->json([
            'message' => 'Producto eliminado',
            'cart-count' => array_sum(array_column($cart, 'quantity'))
        ]);
    }

    public function checkout(){
        $titulo = 'Pagar';
        $cart = session()->get('cart',  []);
        return view('frontend.modules.products.checkout', compact('titulo', 'cart'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
