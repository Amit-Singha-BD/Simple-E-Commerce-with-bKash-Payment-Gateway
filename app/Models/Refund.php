<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model {
    use HasFactory;
    protected $fillable = [
        'order_id',
        'payment_id',
        'trx_id',
        'refund_amount',
        'refund_reason',
    ];

    public function order(){
        return $this->belongsTo(Order::class,'order_id');
    }
}
