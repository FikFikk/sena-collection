<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function add(Request $request)
    {
        $product = Product::find($request->product_id);
        // $user = Auth::user();
        $user = User::findOrFail(1);

        if ($product && $user) {
            $cart = Cart::firstOrCreate(
                ['product_id' => $product->id, 'user_id' => $user->id],
                ['quantity' => 1]
            );

            if (!$cart->wasRecentlyCreated) {
                $cart->increment('quantity');
            }

            return redirect()->back()->with([
                'status' => 'success',
                'message' => 'Product added to cart'
            ]);
        }

        return redirect()->back()->with([
            'status' => 'error',
            'message' => 'Product or user not found'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}