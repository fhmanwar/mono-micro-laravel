<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $getProduct = Products::orderBy('Id', 'desc')->paginate(4);
        $data = [
            'product' => $getProduct,
        ];
        return view('home', $data);
    }

    public function contactus()
    {
        return view('contactus');
    }
}
