<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $fillable=[
        'name',
        'description',
        'cover',
        'category_id',
        'brand_id',
    ];


    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
    public function brand(){
        return $this->belongsTo('App\Models\Brand');
    }
    public function primes(){
        return $this->hasMany('App\Models\Prime');
    }
}
