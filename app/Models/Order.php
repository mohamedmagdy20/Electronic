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
        'status',
        'total',
        'client_id'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class,'client_id');
    }    
}
