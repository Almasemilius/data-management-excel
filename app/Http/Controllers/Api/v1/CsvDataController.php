<?php

namespace App\Http\Controllers\Api\v1;

use App\Exports\CsvDataExport;
use App\Http\Controllers\Controller;
use App\Imports\CsvDataImport;
use App\Jobs\UploadCsv;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CsvDataController extends Controller
{
    public function importCsv(Request $request)
    {
        $request->validate([
            'data' => 'required|file|mimes:csv'
        ]);
        Excel::import(new CsvDataImport,$request->file('data')->store('tmp'));  
        return response()->json(['message' => 'uploading']);
    }

}
