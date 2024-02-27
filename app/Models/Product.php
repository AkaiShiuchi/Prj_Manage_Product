<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'total',
        'price',
        'describe',
        'category_id',
        'image',
    ];

    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function purchases()
    {
        return $this->belongsToMany(Purchase::class, 'product_purchase', 'product_id', 'purchase_id')
            ->withPivot('quantity', 'total_amount');
    }
}
