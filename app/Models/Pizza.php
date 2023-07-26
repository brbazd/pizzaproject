<?php

namespace App\Models;

use App\Models\User;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pizza extends Model
{
    use HasFactory;


    public function orders()
    {
        return $this->belongsToMany(Order::class, 'carts','pizza_id','order_id');
    }
}
