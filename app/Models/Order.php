<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    protected $fillable = [
        'product_name',
        'total_price',
        'customer_name',
        'phone',
        'quantity',
        'status',
        'division',
        'district',
        'upazila',
        'post_office',
        'village',
        'delivery_fee',
        'payment_id',
        'trx_id',
    ];

    public function refund(){
        return $this->hasOne(Refund::class,'order_id');
    }
}
