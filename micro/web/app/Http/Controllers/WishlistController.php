<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    public function index()
    {
        $url = 'localhost:8003/api/wishlist';
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
                'wishlist' => $dataRes->data->wishlist,
            ];
            return view('wishlist', $data);
        }
    }

    public function addWishlist(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'ProductId' => 'required',
        ]);

        if ($valid->fails()) {
            $session = [
                'status' => false,
                'msg' => 'Data Tidak Berhasil Disimpan Wishlist!',
            ];
            return redirect('/product')->with($session);
        } else {
            $url = 'localhost:8003/api/wishlist';
            $res = Http::post($url, [
                'ProductId' => $req->ProductId
            ]);
            $dataRes = json_decode($res->body());
            if($dataRes->statusCode != true){
                $session = [
                    'status' => false,
                    'msg' => 'Data Tidak does\'t exitst!',
                ];
                return redirect('/product')->with($session);
            } else {
                $session = [
                    'status' => true,
                    'msg' => 'Data Berhasil Wishlist!',
                ];
                return redirect('/product')->with($session);
            }
        }
    }

    public function destroy($id)
    {
        $url = 'localhost:8003/api/wishlist/'.$id;
        $res = Http::post($url, [
            '_method' => 'DELETE'
        ]);
        $dataRes = json_decode($res->body());
        if($dataRes->statusCode != true){
            $session = [
                'status' => false,
                'msg' => 'Data Tidak does\'t exitst!',
            ];
            return redirect('/wishlist')->with($session);
        } else {
            $session = [
                'status' => true,
                'msg' => 'Data Berhasil Dihapus',
            ];
            return redirect('/wishlist')->with($session);
        }
    }

    public function clearWishlist()
    {
        $url = 'localhost:8003/api/wishlist/reset';
        $res = Http::get($url);
        $dataRes = json_decode($res->body());
        if($dataRes->statusCode != true){
            $session = [
                'status' => false,
                'msg' => 'Data Tidak does\'t exitst!',
            ];
            return redirect('/cart')->with($session);
        } else {
            $session = [
                'status' => true,
                'msg' => 'Data berhasil direset',
            ];
            return redirect('/wishlist')->with($session);
        }
    }
}
