<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','cmimi'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    protected $primaryKey = 'prod_id';
}
