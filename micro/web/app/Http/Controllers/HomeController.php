<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public $BASE_URL;
    
    public function __construct() {
        $url = json_decode(file_get_contents(base_path('data.json')), true);
        $this->BASE_URL = $url['ProductUrl'];
    }

    public function index()
    {
        $url = $this->BASE_URL.'/api/product/latest';
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
        $url = $this->BASE_URL.'/api/product';
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
