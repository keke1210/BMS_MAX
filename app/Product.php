<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name','cmimi','gjendja'
    ];

    protected $hidden = [
        'created_at','updated_at','shfaq'
    ];

    protected $primaryKey = 'prod_id';

    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }
}
