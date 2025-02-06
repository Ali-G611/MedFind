<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliverEmployee extends Model
{
    protected $fillable = [
        'name','phone','wage','address'
    ];

    public function shipping_dep(){
        return $this->belongsTo(ShippingDep::class);
    }
}
