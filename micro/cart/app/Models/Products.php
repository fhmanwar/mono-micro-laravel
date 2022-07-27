<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    // use HasFactory;
    // use SoftDeletes;

    protected $table = "product";
    protected $fillable = [
        "name",
        "is_active",
    ];

    public $timestamps = true;
}
