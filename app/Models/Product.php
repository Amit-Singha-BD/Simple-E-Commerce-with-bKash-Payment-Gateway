<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $fillable = [
        "name",
        "title",
        "description",
        "category",
        "price",
        "previous_price",
        "badge",
        "stock_status",
        "photos_path",
    ];
}
