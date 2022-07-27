<?php

namespace App\Http\Controllers;

use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlists::select('wishlist.id', 'wishlist.productId', 'p.img', 'p.name', 'p.price')
                ->leftjoin('product as p', 'p.id', '=', 'wishlist.productId')
                ->get();

        $data = [
            'wishlist' => $wishlist,
        ];
        return view('wishlist', $data);
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
            Wishlists::create([
                'productId' => $req->ProductId
            ]);

            $session = [
                'status' => true,
                'msg' => 'Data Berhasil Wishlist!',
            ];
            return redirect('/product')->with($session);
        }
    }

    public function destroy($id)
    {
        Wishlists::destroy($id);
        $session = [
            'status' => true,
            'msg' => 'Data Berhasil Dihapus',
        ];
        return redirect('/wishlist')->with($session);
    }

    public function clearWishlist()
    {
        Wishlists::truncate();
        $session = [
            'status' => true,
            'msg' => 'Data berhasil direset',
        ];
        return redirect('/wishlist')->with($session);
    }
}
