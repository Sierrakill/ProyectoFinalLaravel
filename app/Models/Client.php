<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'lastname',
        'user_id',
        'avatar',
        'phone_number',
        'email',
        'password',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
}
