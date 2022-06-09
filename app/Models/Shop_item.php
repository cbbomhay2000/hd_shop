<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop_item extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'des',
        'image',
        'price',
        'quantity',
        'sell_count',
        'shop_id',
    ];

    public function product()
        {
                return $this->belongsTo(Product::class, 'shop_id');
        }

}


