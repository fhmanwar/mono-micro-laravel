<?php

namespace App\Http\Controllers;

use App\Library\JsonRes;
use App\Models\Carts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function getAll()
    {
        $cart = Carts::select('cart.id', 'cart.productId', 'p.img', 'p.name', 'p.price')
                ->leftjoin('product as p', 'p.id', '=', 'cart.productId')
                ->get();

        $data = [
            'cart' => $cart,
        ];
        return JsonRes::data(true, 'Succesfully', $data);
    }

    public function addCart(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'ProductId' => 'required',
        ]);

        if ($valid->fails()) {
            return JsonRes::data(false, 'Unsuccesfully');
        } else {
            Carts::create([
                'productId' => $req->ProductId
            ]);

            return JsonRes::data(true, 'Succesfully Add to Cart');
        }
    }

    public function destroy($id)
    {
        Carts::destroy($id);
        return JsonRes::data(true, 'Data Berhasil dihapus');
    }

    public function checkout()
    {
        Carts::truncate();
        return JsonRes::data(true, 'Pembayaran Berhasil, Terimakasih Sudah Berbelanja di Cattobuyz!');
    }

    public function view($id)
    {
        $cart = Carts::select('cart.id', 'cart.productId', 'p.img', 'p.name', 'p.price')
                ->leftjoin('product as p', 'p.id', '=', 'cart.productId')
                ->where('cart.id', '=', $id)
                ->first();

        return JsonRes::data(true, 'Succesfully', $cart);
    }

}
