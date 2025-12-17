<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $titulo = "Administrar Categorias";
        $items = Category::all();
        return view('admin.modules.categories.index', compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = "Crear Categoria";
        return view('admin.modules.categories.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $item = new Category();
            $item->user_id = Auth::user()->id;
            $item->name = $request->name;
            $item->save();

            return to_route('categories')->with('success', 'Categoria agregada!');
        } catch (Exception $e) {
            return to_route('categories')->with('error', 'No se pudo guardar!'. $e->getMessage());

        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $titulo = 'Editar Categoria';
        $item = Category::find($id);
        return view('admin.modules.categories.edit', compact('titulo', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       try {
        $item = Category::find($id);
        $item->name = $request->name;
        $item->save();
        return to_route('categories')->with('success', 'Categoria actualizada correctamente!');;
       } catch (Exception $e) {
        return to_route('categories')->with('error', 'No se pudo actualizar!'. $e->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

         try {
            Category::destroy($id);
            return to_route('categories')->with('success', 'Categoria Eliminada Correctamente!');;
       } catch (Exception $e) {
        return to_route('categories')->with('error', 'No se pudo eliminar!'. $e->getMessage());
       }
      
    }
}
