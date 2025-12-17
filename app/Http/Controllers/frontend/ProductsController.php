<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
        public function index()
    {
        $titulo = 'Home';
        return view('frontend.modules.products.home', compact('titulo'));
    }

    public function listar_products(Request $request)
    {
        $query = Product::select(
            'products.*',
            'categories.name as name_category',
            'images.route as image_product'
        )
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('images', 'products.id', '=' , 'images.product_id');

        if($request->filled('search')){
            $term = $request->input('search');
            $query->where('products.name','like', "%{$term}%")
                ->orWhere('categories.name', 'like', "%{$term}%");
        }

        if($request->ajax()){
            return response()->json($query->get());
        }
    }

    public function detail_product($id){
        $titulo = "Detalle del producto";
        $item = Product::select(
               'products.*',
            'images.route as image_product',
            'categories.name as name_category',
        )
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('images', 'products.id', '=' , 'images.product_id')
        ->where('products.id', $id)
        ->first();
        
        return view('frontend.modules.products.product_detail', compact('titulo', 'item'));
    }

  
}
