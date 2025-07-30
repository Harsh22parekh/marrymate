<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingItem extends Model
{
     protected $fillable = ['booking_order_id', 'service_id', 'package_id', 'name', 'service_image','price', 'qty'];

    public function order()
    {
        return $this->belongsTo(BookingOrder::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
