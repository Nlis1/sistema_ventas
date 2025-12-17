<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Exception;
use Illuminate\Http\Request;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = "Proveedores";
        $items = Proveedor::all();
        return view('admin.modules.proveedores.index', compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo = "Nuevo Proveedor";
        return view('admin.modules.proveedores.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $item = new Proveedor();
            $item->name =  $request->name;
            $item->phone =  $request->phone;
            $item->email =  $request->email;
            $item->cp =  $request->cp;
            $item->sitio_web =  $request->sitio_web;
            $item->notas =  $request->notas;
            $item->save();

            return to_route('proveedores')->with('success', 'Proveedor agregado correctamente!');
        } catch (Exception $e) {
            return to_route('proveedores')->with('error', 'No se pudo agregar correctamente!'. $e->getMessage());
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
        $titulo = "Editar Proveedor";
        $item = Proveedor::find($id);
        return view('admin.modules.proveedores.edit', compact('titulo', 'item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $item = Proveedor::find($id);
            $item->name = $request->name;
            $item->phone = $request->phone;
            $item->email = $request->email;
            $item->cp = $request->cp;
            $item->sitio_web = $request->sitio_web;
            $item->notas = $request->notas;
            $item->save();

            return to_route('proveedores')->with('success', 'Proveedor Actualizado Correctamente!');
        } catch (Exception $e) {
            return to_route('proveedores')->with('error', value: 'No se pudo actualizar correctamente!'.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            Proveedor::destroy($id);
            return to_route('proveedores')->with('success', 'Proveedor eliminado correctamente!');
        }catch(Exception $e){
            return to_route('proveedores')->with('error', 'No se puedo eliminar correctamente!'. $e->getMessage());
        }
    }
}
