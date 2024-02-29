<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\Storage;

class ImportProduct implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $file = Storage::putFile('public/uploads', $row['image']);

        return new Product([
            'name' => $row['name'],
            'total' => $row['total'],
            'price' => $row['price'],
            'describe' => $row['describe'],
            'image' => basename($file),
            'category_id' => $row['category_id'],
        ]);
    }
}
