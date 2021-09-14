<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{
    use HasFactory;

    protected $table='tbl_order';
    protected $fillable=['customer_id','shipping_id','payment_id','ordertotal'];
    protected $primaryKey='category_id';
}
