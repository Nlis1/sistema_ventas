<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class Dashboard extends Controller
{
    public function index(){
      return view('admin.modules.dashboard.home');
    }
}
