<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;
use App\Product;

class OrderDetail extends Model
{
    protected $fillable = [
        'order_id','prod_id','sasia'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    public function getOrder() {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function product() {
        return $this->hasOne(Product::class, 'prod_id','prod_id');
    }
}
