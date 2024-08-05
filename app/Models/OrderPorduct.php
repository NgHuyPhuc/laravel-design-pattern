<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPorduct extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'price',
        'quantity',
        'image',
        'orders_id',
    ];
    public function order(){
        return $this->belongsTo(Order::class, 'orders_id','id');
    }
}
