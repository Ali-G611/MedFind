<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingDep extends Model
{
    use HasFactory;
    protected $table = 'shipping_dep';
    public function orders(){
        return $this->hasMany(Order::class);
    }
}
