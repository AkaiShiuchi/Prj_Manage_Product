<?php

namespace App\Http\Controllers;

use App\Exports\ExportProduct;
use App\Imports\ImportProduct;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'import' => 'required|file|mimes:csv,xlsx'
        ], [
            'import.required' => 'Please select a file before importing.',
            'import.mimes' => 'File must be a CSV or XLSX file.'
        ]);

        if ($validator->fails()) {
            toastr()->error($validator->errors()->first('import'));
            return redirect()->back();
        }
        $fileExtension = $request->file('import')->extension();
        if (!in_array($fileExtension, ['csv', 'xlsx'])) {
            toastr()->error('File must be a CSV or XLSX file.');
            return redirect()->back();
        }

        Excel::import(new ImportProduct, $request->file('import'));
        toastr()->success('Import file csv successfully');
        return redirect()->back();
    }
}
