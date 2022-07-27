<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shop()
    {
        $product = Products::all();

        $data = [
            'product' => $product,
        ];
        return view('shop', $data);
    }

    public function latestItem()
    {
        $getProduct = Products::orderBy('Id', 'desc')->paginate(4);
        return response()->json($getProduct);
    }

    public function getAll()
    {
        $product = Products::all();
        return response()->json($product);
    }
}
