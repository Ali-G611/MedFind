<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'total_cost','shipping_dep_id','deliver_date'
    ];
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function shipping_dep(){
        return $this->belongsTo(ShippingDep::class);
    }
    public function cart(){
        return $this->belongsToMany(Item::class,'cart','order_id',relatedPivotKey:'item_id');
    }
}
