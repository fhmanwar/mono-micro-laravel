<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public $BASE_URL;
    
    public function __construct() {
        $url = json_decode(file_get_contents(base_path('data.json')), true);
        $this->BASE_URL = $url['CartUrl'];
    }

    public function index()
    {
        $url = $this->BASE_URL.'/api/cart';
        $res = Http::get($url);
        $dataRes = json_decode($res->body());
        if($dataRes->statusCode != true){
            $session = [
                'status' => false,
                'msg' => 'Data Tidak does\'t exitst!',
            ];
            return redirect('/cart')->with($session);
        } else {
            $data = [
                'cart' => $dataRes->data->cart,
            ];
            return view('cart', $data);
        }
    }

    public function addCart(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'ProductId' => 'required',
        ]);

        if ($valid->fails()) {
            $session = [
                'status' => false,
                'msg' => 'Data Tidak Berhasil Disimpan!',
            ];
            return redirect('/product')->with($session);
        } else {

            $url = $this->BASE_URL.'/api/cart';
            $res = Http::post($url, [
                'ProductId' => $req->ProductId
            ]);
            $dataRes = json_decode($res->body());
            // return response()->json($dataRes);
            if($dataRes->statusCode != true){
                $session = [
                    'status' => false,
                    'msg' => 'Tidak Bisa masuk keranjang',
                ];
                return redirect('/product')->with($session);
            } else {
                $session = [
                    'status' => true,
                    'msg' => 'Data Berhasil Disimpan!',
                ];
                return redirect('/product')->with($session);
            }
        }
    }

    public function destroy($id)
    {
        $url = $this->BASE_URL.'/api/cart/'.$id;
        $res = Http::post($url, [
            '_method' => 'DELETE'
        ]);
        $dataRes = json_decode($res->body());
        if($dataRes->statusCode != true){
            $session = [
                'status' => false,
                'msg' => 'Tidak Bisa masuk keranjang',
            ];
            return redirect('/cart')->with($session);
        } else {
            $session = [
                'status' => true,
                'msg' => 'Data Berhasil dihapus',
            ];
            return redirect('/cart')->with($session);
        }
    }

    public function checkout()
    {
        $url = $this->BASE_URL.'/api/cart/checkout';
        $res = Http::get($url);
        $dataRes = json_decode($res->body());
        if($dataRes->statusCode != true){
            $session = [
                'status' => false,
                'msg' => 'Data Tidak does\'t exitst!',
            ];
            return redirect('/')->with($session);
        } else {
            $session = [
                'status' => true,
                'msg' => 'Pembayaran Berhasil, Terimakasih Sudah Berbelanja di Cattobuyz!',
            ];
            return redirect('/cart')->with($session);
        }
    }
}
