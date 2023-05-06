<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Imports\CsvDataImport;
use App\Jobs\UploadCsv;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CsvDataController extends Controller
{
    public function importCsv(Request $request)
    {
        Excel::import(new CsvDataImport,$request->file('data')->store('tmp'));
    }
}
