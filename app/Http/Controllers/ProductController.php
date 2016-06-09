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

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'price' => 'required|digits_between:0,99999',
            'description' => 'required|max:500',
            'picture' => 'mimes:jpeg,bmp,png,gif',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $product = Product::findOrFail($id);
        if ($product) {
            $product->name = $request->get('name');
            $product->price = $request->get('price');
            $product->description = $request->get('description');
            if ($request->get('picture')) {
                $picture = base64_encode(file_get_contents($request->get('picture')));
                $product->picture = $picture;
            }
            try {
                $product->save();
                return redirect("product/" . $product->id);
            } catch (Exception $e) {
                Log::error($e->getMessage());
                return redirect()->back()->withErrors(["errors" => array("Unable to update product. Please try again later")]);
            }
        } else {
            Log::error("Product with ID ($id) cannot be found to update.");
            abort(404, "Page not found");
            return false;
        }

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product) {
            $product->delete();
            Log::notice("Product with ID ($id) is now deleted.");
            return redirect('/');
        } else {
            Log::error("Product with ID ($id) cannot be found to destroy.");
            abort(404, "Page not found");
            return false;
        }
    }
}
