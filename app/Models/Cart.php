<?php

namespace App\Models;

use App\Models\Pizza;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pizza()
    {
        return $this->belongsTo(Pizza::class,'pizza_id','id','pizza');
    }

}
