<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class AuthController extends Controller
{
    public function index(){
        $titulo = "Login de usuario";
        return view("frontend.modules.auth.login", compact('titulo'));
    }

    public function loguear(Request $request){
        //validar datos de las credenciales
        $credenciales = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required'
        ]);

        //buscar el email
        $user = User::where('email', $request->email)->first();

        //validar usuario y contraseña
        if(!$user || !Hash::check($request->password, $user->password)){
            return back()->withErrors(['email' => 'credencial incorrecta'])->withInput();
        }

        //validar si el usuario esta activo
        if(!$user->activo){
             return back()->withErrors(['email' => 'tu cuenta esta inactiva']);
        }

        //crear la session de usuario
        Auth::login($user);
        $request->session()->regenerate();

         if ($user->rol === 'admin') {
            return to_route('dashboard');
        }

        return to_route(route: 'home');
    }

    public function register(){
        $titulo = "Crear Usuario";
        return view('frontend.modules.auth.register', compact('titulo'));
    }

    public function store(Request $request){
        try{

            $request->validate([
                'password' => ['required','confirmed']
            ]);

            $item =  new User();
            $item->name = $request->name;
            $item->last_name = $request->last_name;
            $item->phone = $request->phone;
            $item->email= $request->email;
            $item->password = Hash::make($request->password);
            $item->save();

            return to_route('login')->with('success', 'Usuario creado correctamente!');

        }catch(Exception $e){
            return to_route('register')->with('error', 'No se pudo crear el usuario correctamente!'.$e->getMessage());

        }
    }

    public function crearAdmin(){
        User::create([
            'name'=>'Camila Navas',
            'email'=> 'camila@gmail.com',
            'password'=> Hash::make('123'),
            'activo'=>true,
            'rol'=> 'cliente'
        ]);

        return "Admin creado correctamente";
    }

    public function logout(){
        Auth::logout();
        return to_route('login');
    }
}
