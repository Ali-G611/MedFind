<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'location',
        'phone',
        'birth'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
