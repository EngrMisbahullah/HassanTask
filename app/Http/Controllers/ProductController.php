<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Create a new product
    public function store(Request $request)
    {
        // Validate and create the product
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',// Adjust the validation rules as needed
        ]);

        // Handle image upload
        if ($request->hasFile('url')) {
            $image = $request->file('url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Store the image in the public/images directory (adjust as needed)
        }

        // Create a new product with form data and the image path
        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'stock_quantity' => $request->input('stock_quantity'),
            'is_published' => 1,
            'url' => 'images/' . $imageName, // Path to the uploaded image
        ]);

        $product->save();

        return response()->json(['message' => 'Product created successfully'], 201);
    }

    // Retrieve a single product
    public function show()
    {
        $products = Product::get();
        return response()->json($products);
    }

    public function getDataById($id)
    {
        $product = Product::where('id',$id)->first();
        return response()->json($product);
    }

    // Update a product
    public function update(Request $request,$id)
    {
         // Validate and create the product
         $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',// Adjust the validation rules as needed
        ]);
        $product = Product::where('id',$id)->first();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock_quantity = $request->input('stock_quantity');
        $product->is_published = 1;
        if ($request->hasFile('url')) {
            $image = $request->file('url');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Store the image in the public/images directory (adjust as needed)
            $product->url = 'images/' . $imageName; // Path to the uploaded image
        }
            $product->save();

        return response()->json(['message' => 'Product created successfully'], 201);
    }

    // Delete a product
    public function destroy($id)
    {
        // Delete the product
        $product = Product::where('id',$id)->first();
        $product->delete();

        return response()->json(null, 204);
    }
}
