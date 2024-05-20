<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_created_id',
        'status',
        'total_price',
        'address',
        'note',
    ];

    protected $table = 'purchases';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_purchase', 'purchase_id', 'product_id')
            ->withPivot('quantity', 'total_amount');
    }

    public function product_purchases()
    {
        return $this->hasMany(ProductPurchase::class);
    }
}
