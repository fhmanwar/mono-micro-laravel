<?php

namespace App\Http\Controllers;

use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        $cart = Carts::select('cart.id', 'cart.productId', 'p.img', 'p.name', 'p.price')
                ->leftjoin('product as p', 'p.id', '=', 'cart.productId')
                ->get();

        $data = [
            'cart' => $cart,
        ];
        return view('cart', $data);
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
            Carts::create([
                'productId' => $req->ProductId
            ]);

            $session = [
                'status' => true,
                'msg' => 'Data Berhasil Disimpan!',
            ];
            return redirect('/product')->with($session);
        }
    }

    public function destroy($id)
    {
        // Carts::find($id)->delete();
        Carts::destroy($id);
        $session = [
            'status' => true,
            'msg' => 'Data Berhasil dihapus',
        ];
        return redirect('/cart')->with($session);
    }

    public function checkout()
    {
        Carts::truncate();
        $session = [
            'status' => true,
            'msg' => 'Pembayaran Berhasil, Terimakasih Sudah Berbelanja di Cattobuyz!',
        ];
        return redirect('/cart')->with($session);
    }

    public function loaddata()
    {
        $cart = Carts::select('cart.id', 'cart.productId', 'p.img', 'p.name', 'p.price')
                ->leftjoin('product as p', 'p.id', '=', 'cart.productId')
                ->get();

        return response()->json($cart);
    }

    public function view($id)
    {
        $cart = Carts::select('cart.id', 'cart.productId', 'p.img', 'p.name', 'p.price')
                ->leftjoin('product as p', 'p.id', '=', 'cart.productId')
                ->where('cart.id', '=', $id)
                ->first();

        return response()->json($cart);
    }

}
