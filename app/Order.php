<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    
    public function orderItems(){
        return $this->hasMany(OrderDetail::class,'order_id');
    }

    public function table() {
        return $this->belongsTo(Table::class,'T_id');
    }
} 
