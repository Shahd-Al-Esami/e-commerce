<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id','product_id'

    ];
    protected $table = 'category_products';
}
