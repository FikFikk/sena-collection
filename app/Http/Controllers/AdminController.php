<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('pages.admin.index', compact('product'));
    }
}
