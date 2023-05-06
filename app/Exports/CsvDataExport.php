<?php

namespace App\Exports;

use App\Models\CsvData;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class CsvDataExport implements FromQuery
{

    use Exportable;

    public function query()
    {
        return CsvData::query();
    }
        
    // }()
    // {
    //     return CsvData::all();
    // }
}
