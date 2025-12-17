<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = 'Compras';
        $items = Compra::select(
            'compras.*',
            'users.name as name_user',
            'products.name as name_product'
        )
        ->join('users', 'compras.user_id', '=', 'users.id')
        ->join('products', 'compras.product_id', '=', 'products.id')
        ->get();
        
        return view('admin.modules.compras.index', compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $titulo =  "Comprar productos";
        $item = Product::find($id);
        return view('admin.modules.compras.create', compact('titulo', 'item'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $item = new Compra();
            $item->user_id =  Auth::user()->id;
            $item->product_id = $request->id;
            $item->amount = $request->amount;
            $item->price_compra = $request->price_compra;
            if($item->save()){
                $item = Product::find($request->id);
                $item->amount = ($item->amount +  $request->amount);
                $item->price_compra = $request->price_compra;
                $item->save();
            }
            return to_route('products')->with('success', 'Compra realizada con exito!');
        }catch(Exception $e){
            return to_route('products')->with('error', 'La compra no se pudo realizar!'.$e->getMessage());
        }

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
     
        $titulo = 'Editar compra';
        $item = Compra::select(
            'compras.*',
            'users.name as name_user',
            'products.name as name_product'
        )
        ->join('users', 'compras.user_id', '=', 'users.id')
        ->join('products', 'compras.product_id', '=', 'products.id')
        ->where('compras.id', $id)
        ->first();
        
        return view('admin.modules.compras.edit', compact('titulo', 'item'));
        
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $cantidad_anterior = 0;
            $item = Compra::find($id);
            $cantidad_anterior = $item->amount;
            $item->amount = $request->amount;
            $item->price_compra = $request->price_compra;
            if($item->save()){

                $item = Product::find($request->product_id);
                $cantidad_anterior = $item->amount - $cantidad_anterior;
                $item->amount = $cantidad_anterior +  $request->amount;
                $item->save();

                return to_route('compras')->with('success', 'Compra actualizada con exito!');
            }
        }catch(Exception $e){
            return to_route('compras')->with('error', 'La compra no se pudo actualizar!'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Compra::destroy($id);
            return to_route('compras')->with('success', 'Se elimino correctamente la compra!!');
        }catch(Exception $e){
            return to_route('compras')->with('error', 'No se pudo eliminar la compra!!'.$e->getMessage());
        }
    }
}
