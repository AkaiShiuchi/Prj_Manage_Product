<?php

namespace App\Http\Controllers;

use App\Exports\ExportProduct;
use App\Imports\ImportProduct;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;

class FileCsvController extends Controller
{
    /**
     * export product file csv
     *
     * @return void
     */
    public function export_products()
    {
        return Excel::download(new ExportProduct, 'products.csv');
    }

    /**
     * function import file csv 
     *
     * @return void
     */
    public function import_products(Request $request)
    {
        if (!$request->hasFile('import')) {
            toastr()->error('Please select a file before importing.');
            return redirect()->back();
        }

        Excel::import(new ImportProduct, $request->file('import'));
        toastr()->success('Import file csv successfully');
        return redirect()->back();
    }
}