<?php

namespace App\Http\Controllers;

use App\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
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
            'picture' => 'required|mimes:jpeg,bmp,png,gif|max:500',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data = $request->all();
        $data['picture'] = base64_encode(file_get_contents($data['picture']));
        $product = Product::create($data);
        return Redirect::to('/product/' . $product->id);
    }

    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('product.show')->with(array(
                "product" => $product
            ));
        } catch (ModelNotFoundException $e) {
            abort(404, "Page not found");
            return false;
        }
    }

    public function edit($id)
    {
        try {
            $product = Product::findOrFail($id);
            return view('product.edit')->with(array(
                "product" => $product
            ));
        } catch (ModelNotFoundException $e) {
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
            'picture' => 'mimes:jpeg,bmp,png,gif|max:500',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $data = $request->all();
        try {
            $product = Product::findOrFail($id);
            $product->name = $data['name'];
            $product->price = $data['price'];
            $product->description = $data['description'];
            if (isset($data['picture'])) {
                $picture = base64_encode(file_get_contents($data['picture']));
                $product->picture = $picture;
            }
            try {
                $product->save();
                return Redirect::to("product/" . $product->id);
            } catch (Exception $e) {
                Log::error($e->getMessage());
                return Redirect::back()->withErrors(["errors" => array("Unable to update product. Please try again later")]);
            }
        } catch (ModelNotFoundException $e) {
            Log::error("Product with ID ($id) cannot be found to update.");
            abort(404, "Page not found");
            return false;
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->delete();
            Log::notice("Product with ID ($id) is now deleted.");
            return Redirect::to('/');
        } catch (ModelNotFoundException $e) {
            Log::error("Product with ID ($id) cannot be found to destroy.");
            abort(404, "Page not found");
            return false;
        }
    }
}
