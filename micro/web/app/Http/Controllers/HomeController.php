<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $url = 'localhost:8001/api/product/latest';
        $res = Http::get($url);
        $dataRes = json_decode($res->body());
        if($dataRes->statusCode != true){
            $session = [
                'status' => false,
                'msg' => 'Data Tidak does\'t exitst!',
            ];
            return redirect('/')->with($session);
        } else {
            $data = [
                'product' => $dataRes->data->product,
            ];
            // return response()->json($dataRes->data->product);
            return view('home', $data);
        }
    }

    public function contactus()
    {
        return view('contactus');
    }

    public function shop()
    {
        $url = 'localhost:8001/api/product';
        $res = Http::get($url);
        $dataRes = json_decode($res->body());
        if($dataRes->statusCode != true){
            $session = [
                'status' => false,
                'msg' => 'Data Tidak does\'t exitst!',
            ];
            return redirect('/')->with($session);
        } else {
            $data = [
                'product' => $dataRes->data->product,
            ];
            return view('shop', $data);
        }
    }
}
