<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Models\Product;

class ExportProduct implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Product::select('id', 'name', 'total', 'price', 'describe', 'image', 'category_id')->get();
    }

    public function headings(): array
    {
        return ['Id', 'Product Name', 'Total', 'Price', 'Describe', 'Image', 'Category Id'];
    }
}