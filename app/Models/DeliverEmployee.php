<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverEmployee extends Model
{
    use HasFactory;
    protected $table= 'deliver_employee';
    protected $fillable = [
        'name','phone','wage','address'
    ];

    public function shipping_dep(){
        return $this->belongsTo(ShippingDep::class);
    }
}
