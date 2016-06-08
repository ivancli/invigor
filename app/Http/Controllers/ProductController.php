<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $products = Product::all();
        return view('product.list')->with(array(
            "products" => $products->toArray()
        ));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'price' => 'required|digits_between:0,99999',
            'description' => 'required|max:500',
            'picture' => 'required|mimes:jpeg,bmp,png,gif',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $data = $request->all();
        $data['picture'] = base64_encode(file_get_contents($data['picture']));
        $product = Product::create($data);
        return redirect('/product/' . $product->id);
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            return view('product.show')->with(array(
                "product" => $product
            ));
        } else {
            abort(404, "Page not found");
            return false;
        }
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            return view('product.edit')->with(array(
                "product" => $product
            ));
        } else {
            abort(404, "Page not found");
            return false;
        }
    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->delete();
            return redirect('/');
        } else {
            abort(404, "Page not found");
            return false;
        }
    }
}
