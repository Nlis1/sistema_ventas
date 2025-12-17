<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\detail_order;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        $titulo = 'Cuenta';
        return view('frontend.modules.products.account', compact('titulo'));
    }

    public function listar_orders(){
        return response()->json(
                   Order::with(['details.product.images'])
                                ->where('user_id', Auth::id())
                                ->get() 
        );
    }
}
