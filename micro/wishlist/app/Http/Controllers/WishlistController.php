<?php

namespace App\Http\Controllers;

use App\Library\JsonRes;
use App\Models\Wishlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WishlistController extends Controller
{
    public function getAll()
    {
        $wishlist = Wishlists::select('wishlist.id', 'wishlist.productId', 'p.img', 'p.name', 'p.price')
                ->leftjoin('product as p', 'p.id', '=', 'wishlist.productId')
                ->get();

        $data = [
            'wishlist' => $wishlist,
        ];
        return JsonRes::data(true, 'Successfulliy', $data);
    }

    public function addWishlist(Request $req)
    {
        $valid = Validator::make($req->all(), [
            'ProductId' => 'required',
        ]);

        if ($valid->fails()) {
            return JsonRes::data(false, 'Data Tidak Berhasil Disimpan Wishlist!');
        } else {
            Wishlists::create([
                'productId' => $req->ProductId
            ]);

            return JsonRes::data(true, 'Data Berhasil Wishlist!');
        }
    }

    public function destroy($id)
    {
        Wishlists::destroy($id);
        return JsonRes::data(true, 'Data Berhasil Dihapus!');
    }

    public function clearWishlist()
    {
        Wishlists::truncate();
        return JsonRes::data(true, 'Data Berhasil Direset!');
    }
}
