<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'max_uses',
        'count_uses',
        'min_amount',
        'discount',
    ];

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
}
