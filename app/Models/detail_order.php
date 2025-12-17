<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detail_order extends Model
{
    protected $table = "detail_order";

    public function order()
{
    return $this->belongsTo(Order::class, 'order_id');
}

public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}
}
