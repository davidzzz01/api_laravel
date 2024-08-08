<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProducts(){
        $products = Product::all();
        dd($products); // Adicione isso para depurar
        return response()->json($products);
    }
    


    public function getProduct($id){

        $product= Product::findOrFail($id);
        $product = Product::where('id', $id)->first();

        return response()->json($product);
    }


    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }
    
    public function createProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
        ]);
    
        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);
    
        return response()->json($product, 201);
    }
    


public function updateProduct(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'sometimes|required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'sometimes|required|numeric',
    ]);

    $product->update([
        'name' => $request->input('name', $product->name),
        'description' => $request->input('description', $product->description),
        'price' => $request->input('price', $product->price),
    ]);

    return response()->json($product);
}



    
}
