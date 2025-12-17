<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index(){
        $titulo = 'Categorias';
        return view('frontend.modules.products.category', compact('titulo'));
    }
    public function listar_categories(){
       return response()->json( Category::all());
    }

    public function listar_productos_por_categoria(Request $request, $category_id){
        $query = Product::select(
            'products.*',
            'categories.name as name_category',
            'images.route as image_product'
        )
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('images', 'products.id', '=' , 'images.product_id')
        ->where('category_id', $category_id)
        ->get();
        
        return response()->json($query);
    }
}
