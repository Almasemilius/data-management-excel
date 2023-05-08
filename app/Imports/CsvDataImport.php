<?php

namespace App\Imports;

use App\Models\CsvData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class CsvDataImport implements ToModel, WithHeadingRow ,WithChunkReading, WithBatchInserts ,ShouldQueue,WithValidation
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new CsvData([
            'cut' => $row['cut'],
            'color' => $row['color'],
            'clarity' => $row['clarity'],
            'carat_weight' => $row['carat_weight'],
            'cut_quality' => $row['cut_quality'],
            'lab' => $row['lab'],
            'symmetry' => $row['symmetry'],
            'polish' => $row['polish'],
            'eye_clean' => $row['eye_clean'],
            'culet_size' => $row['culet_size'],
            'culet_condition' => $row['culet_condition'],
            'depth_percent' => $row['depth_percent'],
            'table_percent' => $row['table_percent'],
            'meas_length' => $row['meas_length'],
            'meas_width' => $row['meas_width'],
            'meas_depth' => $row['meas_depth'],
            'girdle_min' => $row['girdle_min'],
            'girdle_max' => $row['girdle_max'],
            'fluor_color' => $row['fluor_color'],
            'fluor_intensity' => $row['fluor_intensity'],
            'fancy_color_dominant_color' => $row['fancy_color_dominant_color'],
            'fancy_color_secondary_color' => $row['fancy_color_secondary_color'],
            'fancy_color_overtone' => $row['fancy_color_overtone'],
            'fancy_color_intensity' => $row['fancy_color_intensity'],
            'total_sales_price' => $row['total_sales_price'],
        ]);
    }

    public function chunkSize(): int
    {
        return 500;
    }

    public function batchSize(): int
    {
        return 500;
    }

    public function rules() : array
    {
        return [
            'cut' => 'required',
            'color' => 'required',
            'clarity' => 'required',
            'carat_weight' => 'required',
            'cut_quality' => 'required',
            'lab' => 'required',
            'symmetry' => 'required',
            'polish' => 'required',
            'eye_clean' => 'required',
            'culet_size' => 'required',
            'culet_condition' => 'required',
            'depth_percent' => 'required',
            'table_percent' => 'required',
            'meas_length' => 'required',
            'meas_width' => 'required',
            'meas_depth' => 'required',
            'girdle_min' => 'required',
            'girdle_max' => 'required',
            'fluor_color' => 'required',
            'fluor_intensity' => 'required',
            'fancy_color_dominant_color' => 'required',
            'fancy_color_secondary_color' => 'required',
            'fancy_color_overtone' => 'required',
            'fancy_color_intensity' => 'required',
            'total_sales_price' => 'required',
        ];
    }
}
