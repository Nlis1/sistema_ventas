<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Proveedor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $titulo = "Productos";
        $items = Product::select(
            'products.*',
            'categories.name as name_category',
            'proveedores.name as name_proveedor',
            'images.route as image_product',
            'images.id as image_id'
        )
        
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('proveedores', 'products.proveedor_id', '=', 'proveedores.id')
        ->join('images', 'products.id', '=' , 'images.product_id')
        ->get();


        return view('admin.modules.products.index', compact('titulo', 'items'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $proveedores = Proveedor::all();

        return view('admin.modules.products.create', compact('titulo', 'categories', 'proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $item = new Product();
            $item->user_id = Auth::user()->id;
            $item->category_id = $request->category_id;
            $item->proveedor_id = $request->proveedor_id;
            $item->name = $request->name;
            $item->description = $request->description;
            $item->save();
            
            $id_product = $item->id;
            if($id_product>0){
                if($this->subir_image($request, $id_product)){
                    return to_route('products')->with('success', 'Producto agregado correctamente!!');
                }else{
                    return to_route('products')->with('error', 'No se subio la imagen!!');
                }
            }
        } catch (Exception $e) {
            return to_route('products')->with('error', 'El producto no se pudo agregar correctamente!!'. $e->getMessage());
        }
    }

    public function subir_image($request, $id_product){
        $routeImage = $request->file('image')->store('images', 'public');
        $nameImage = basename($routeImage);

        $item = new Image();
        $item->product_id = $id_product;
        $item->name = $nameImage;
        $item->route = $routeImage;

        return $item->save();
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
        $titulo = "Editar Producto";
        $categories = Category::all();
        $proveedores = Proveedor::all();
        $item = Product::find($id);
        return view('admin.modules.products.edit', compact('titulo', 'item', 'categories', 'proveedores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $item = Product::find($id);
            $item->category_id = $request->category_id;
            $item->proveedor_id = $request->proveedor_id;
            $item->name = $request->name;
            $item->description = $request->description;
            $item->price_venta = $request->price_venta;
            $item->save();

            return to_route('products')->with('success', 'Producto actualizado correctamente!');
        } catch (Exception $e) {
            return to_route('products')->with('error', 'El producto no se pudo actualizar correctamente!'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       try{
            Product::destroy($id);
            return to_route(route: 'products')->with('success', 'Se elimino correctamente el producto!!');
        }catch(Exception $e){
            return to_route('products')->with('error', 'No se pudo eliminar el producto!!'.$e->getMessage());
        }
    }

    public function show_image($id){
        $titulo = "Editar imagen";
        $item = Image::find($id);
        return view('admin.modules.products.show-image', compact('titulo', 'item'));
    }

    public function update_image(Request $request, $id){

        try{
            $item = Image::find($id);

            if($item->route && Storage::disk('public')->exists($item->route)){
                Storage::disk('public')->delete($item->route);
            }
            
            $routeImage = $request->file('image')->store('images', 'public');
            $nameImage = basename($routeImage);
            $item->route = $routeImage;
            $item->name = $nameImage;
            $item->save();
            return to_route('products')->with('success', 'Imagen actualizada correctamente!!');
        }catch(Exception $e){
            return to_route('products')->with('error', 'No se pudo actualizar la imagen del producto!!'.$e->getMessage());

        }
        
    }

}