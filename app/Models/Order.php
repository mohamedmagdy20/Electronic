<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'phone',
        'address',
        'type',
        'code',
        'status',
        'total',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }    

    public function order_details()
    {
        return $this->hasMany(OrderDetails::class,'order_id');
    }
}
