<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRequest extends Model
{
    use HasFactory;

    protected $table = 'product_request';

    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'icon_id',
        'customer_id'
    ];
}
