<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'address',
        'email',
        'phone',
        'total',
        'state',
    ];
    public function orderproduct(){
        return $this->hasMany(OrderPorduct::class, 'orders_id','id');
    }
}
;