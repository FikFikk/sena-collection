<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index(){
        return view('pages.user.index');
    }

    public function shop(){
        $products = Product::all();
        return view('pages.user.shop', compact('products'));
    }
}
