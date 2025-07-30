<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingOrder extends Model
{
     protected $fillable = [  'user_id',
    'payment_id',
    'total',
    'name',
    'email',
    'phone',
    'booking_date',
    'status' ,
    'address',];

    public function items()
    {
        return $this->hasMany(BookingItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookingItems()
{
    return $this->hasMany(BookingItem::class, 'booking_order_id');
}
}
