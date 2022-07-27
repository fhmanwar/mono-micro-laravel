<?php

namespace App\Http\Controllers;

use App\Library\JsonRes;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function latestItem()
    {
        $getProduct = Products::orderBy('Id', 'desc')->limit(4)->get();
        $data = [
            'product' => $getProduct,
        ];
        return JsonRes::data(true, 'Succesfully', $data);
    }

    public function getAll()
    {
        $product = Products::all();

        $data = [
            'product' => $product,
        ];
        return JsonRes::data(true, 'Succesfully', $data);
    }

}
