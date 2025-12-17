<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulo = "Usuarios";
        $items = User::all();
        return view('admin.modules.users.index', compact('titulo', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulo= "Usuario Nuevo";
        return view('admin.modules.users.create', compact('titulo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        User::create([
            'name'=> $request->name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email'=> $request->email,
            'password'=> Hash::make($request->password),
            'activo'=>true,
            'rol'=> $request->rol
        ]);

        return to_route('users')->with('success', 'Usuario fue creado correctamente!');
       } catch (Exception $e) {
        return to_route('users')->with('error', 'No se pudo crear!'. $e->getMessage());
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
        $item = User::find($id);
        $titulo= 'Editar usuario';
        return view('admin.modules.users.edit', compact('item', 'titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         try {
        $item = User::find($id);
        $item->name = $request->name;
        $item->last_name = $request->last_name;
        $item->phone = $request->phone;
        $item->email = $request->email;
        $item->rol = $request->rol;
        $item->save();

        return to_route('users')->with('success', 'Usuario actualizado correctamente!');
       } catch (Exception $e) {
        return to_route('users')->with('error', 'No se pudo actualizar!'. $e->getMessage());
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function tbody(){
        $items= User::all();
        return view('admin.modules.users.tbody', compact('items'));
    }

    public function estado($id , $estado){
        $item = User::find($id);
        $item->activo = $estado;
        return $item->save();

    }

    public function cambio_password($id, $password){
        $item = User::find($id);
        $item->password = Hash::make($password);
        return $item->save();
    }
}
