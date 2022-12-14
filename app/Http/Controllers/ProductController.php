<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpOption\None;

class ProductController extends Controller
{
    public function store(Request $request)
    {

        $test = Product::create([
            "weight" => $request->input('weight'),
            "unit" => $request->input('unit'),
            "price" => $request->input('price'),
            "description" => $request->input('description'),
            "count" => $request->input("count") ?? 1,
            "series_number" => $request->input("series_number") ?? "undefined"
        ]);
        if ($test) {
            $message = "Úspěšně přidáno";
            $state = "success";
        } else {
            $message = "Error, něco se pokazilo";
            $state = 'error';
        }
        return redirect()->back()->with($state, $message);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id);
        $product->weight = $request->input("weight");
        $product->unit = $request->input("unit");
        $product->price = $request->input("price");
        $product->description = $request->input("description");
        $product->count = $request->input("count") ?? 1;
        $product->series_number = $request->input("series_number") ?? "undefined";
        $saved = $product->save();
        if ($saved) {
            $message = "Úspěšně aktualizováno";
            $state = "success";
        } else {
            $message = "Error, něco se pokazilo";
            $state = 'error';
        }
        return redirect()->back()->with($state, $message);

    }

    public function deleteProduct($what, $id)
    {
        if ($what == "product") {
            $product = Product::find($id);
        } else {
            $product = Package::find($id);
        }
        $deleted = $product->delete();
        if ($deleted) {
            $message = "Úspěšně odstraněno";
            $state = "success";
        } else {
            $message = "Error, něco se pokazilo";
            $state = 'error';
        }
        return redirect()->back()->with($state, $message);
    }

    public function Package(Request $request)
    {
        $test = Package::create([
            "name" => $request->input('name'),
            "product_type" => $request->input('product_type'),
            "count" => $request->input('count'),
            "price" => $request->input('price'),
        ]);
        if ($test) {
            $message = "Balíček vytvořen úspěšně";
            $state = "success";
        } else {
            $message = "Error, něco se pokazilo";
            $state = 'error';
        }
        return ['state'=>$state,'message'=>$message];
//        return redirect()->back()->with($state, $message);
    }

    public function updatePackage(Request $request, $id)
    {
        $product = Package::find($id);
        $product->name = $request->input("name");
        $product->product_type = $request->input("product_type");
        $product->count = $request->input("count");
        $product->price = $request->input("price");
        $saved = $product->save();
        if ($saved) {
            $message = "Úspěšně aktualizováno";
            $state = "success";
        } else {
            $message = "Error, něco se pokazilo";
            $state = 'error';
        }
        return redirect()->back()->with($state, $message);
    }
}
