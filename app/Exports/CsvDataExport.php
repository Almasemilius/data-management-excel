<?php

namespace App\Exports;

use App\Models\CsvData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CsvDataExport implements FromQuery, WithHeadings
{

    use Exportable;
    public $timeout = 2000;
    public function headings(): array
    {
        return [
            ' ',
            'cut',
            'color',
            'clarity',
            'carat_weight',
            'cut_quality',
            'lab',
            'symmetric',
            'polish',
            'eye_clean',
            'culet_size',
            'culet_condition',
            'depth_percent',
            'table_percent',
            'meas_length',
            'meas_width',
            'meas_depth',
            'girdle_min',
            'girdle_max',
            'fluor_color',
            'fluor_intensity',
            'fancy_color_dominant_color',
            'fancy_color_secondary_color',
            'fancy_color_overtone',
            'fancy_color_intensity',
            'total_sales_price',
        ];
    }

    public function query()
    {
        return CsvData::query();
    }

}
