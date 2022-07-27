<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wishlists extends Model
{
    protected $table = "wishlist";
    protected $fillable = [
        "productId",
    ];

    public $timestamps = true;
}
