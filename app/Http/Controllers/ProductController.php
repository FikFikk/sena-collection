<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('pages.admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'availability' => 'required',
            'categories' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('images')) {
            $image = $request->file('images');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/dist/img/product');
            $image->move($destinationPath, $imageName);
            $data['images'] = 'dist/img/product/' . $imageName;
        }

        Product::create($data);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('pages.admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('pages.admin.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $request->validate([
            'brand' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'availability' => 'required',
            'categories' => 'required',
            'images' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $data = $request->all();

        if ($request->hasFile('images')) {
            // Delete the old image if it exists
            if ($product->images && File::exists(public_path($product->images))) {
                File::delete(public_path($product->images));
            }

            $image = $request->file('images');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/dist/img/product');
            $image->move($destinationPath, $imageName);
            $data['images'] = 'dist/img/product/' . $imageName;
        } else {
            $data['images'] = $product->images;
        }

        $product->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->images) {
            Storage::disk('public')->delete($product->images);
        }
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
