<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Product;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function show()
    {
        $product = Product::all();
        $count = $product->count();
        $i = 0;
        if (isset($product[0])) {
            $id = $product[$i]->id;
        } else {
            $id = "none_id";
        }
        return view("edit", compact("count", "i", "product", "id"));
    }

    public function package()
    {
        $product = Product::all();
        $count = $product->count();
        $i = 0;
        if (isset($product[0])) {
            $id = $product[$i]->id;
        } else {
            $id = "none_id";
        }
        return view("package", compact("count", "i", "product", "id"));
    }

    public function edit_package()
    {
        $product = Package::all();
        $count = $product->count();
        $i = 0;
        if (isset($product[0])) {
            $id = $product[$i]->id;
        } else {
            $id = "none_id";
        }
        return view("edit_package", compact("count", "i", "product", "id"));
    }

    public function edit($id)
    {
        $header = "Upravit produkt";
        $product = Product::where("id", $id)->get();
        $weight = $product[0]->weight;
        $unit = $product[0]->unit;
        $price = $product[0]->price;
        $description = $product[0]->description;
        return view("edit_product", compact("id", "weight", "unit", "price", "description", "header"));
    }



}
