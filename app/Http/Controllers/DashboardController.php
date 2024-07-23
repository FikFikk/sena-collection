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

    public function about(){
        return view('pages.user.about');
    }

    public function service(){
        return view('pages.user.service');
    }

    public function blog(){
        return view('pages.user.blog');
    }

    public function contact(){
        return view('pages.user.contact');
    }

    public function cart(){
        return view('pages.user.cart.cart');
    }

    public function checkout(){
        return view('pages.user.cart.checkout');
    }
}
