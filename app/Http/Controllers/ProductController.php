<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Classes\Sell_product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products')->with(['products' => $products]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'stocks' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());
        redirect()->back()->with('message', 'Successfully created a new product');
    }

    public function edit($product_id)
    {
        $product = Product::find($product_id);
        if(empty($product)){
            abort(404, 'Product not found');
        }
        return view('editProduct')->with(['product' => $product]);
    }

    public function update($product_id, Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'stocks' => 'required|integer',
            'price' => 'required|numeric',
        ]);
        $product = Product::find($product_id);
        if(empty($product))
        {
            abort(404, 'Product not found');
        }

        $product->update($request->all());
        return redirect()->route('list')->with('message', 'Successfully updated a product');

    }

    public function sellProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity');
        $sell = new Sell_product($product_id, $quantity);
        $return = $sell->sell();
        if(!$return)
        {
            return redirect()->back()->with(['message' => $sell->message]);
        }
        return redirect()->route('transactions')->with(['message' => $sell->message]);

    }

    
}
