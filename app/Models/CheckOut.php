<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckOut extends Model
{
    use HasFactory;
    protected $fillable = [
        'checkout_id',
        'sold_to',
        'payment_method',
        'ship_cost',
        'ship_price',
        'address',
        'note',

        'card_name',
        'tcgplacer_id',
        'tcg_mid',
        'qty',
        'total',
        'payment_status',
      

        'checkout_id',
        'user_id',
        'cart_contents',
        'status',

    ];

    protected $casts = [
        'cart_contents' => 'json', // Add this line to cast the cart_contents attribute as JSON
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'tcgplayer_id', 'product_id');
    }
}
