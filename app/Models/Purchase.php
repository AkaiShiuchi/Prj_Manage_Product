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
    ];

    protected $table = 'purchases';

    public function purchases()
    {
        return $this->belongsToMany(Product::class, 'product_purchase', 'product_id', 'purchase_id')
            ->withPivot('quantity', 'total_amount');
    }
}
