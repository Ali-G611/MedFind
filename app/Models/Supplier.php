<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'name','address'
    ];

    protected $table = 'supplier';

    public function supply(){
        return $this->belongsToMany(ShippingDep::class,'supply','supplier_id','dep_id');
    }
}
