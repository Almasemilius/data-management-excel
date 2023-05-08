<?php

namespace App\Jobs;

use App\Imports\CsvDataImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class UploadCsv implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable,SerializesModels;



    /**
     * Create a new job instance.
     */
    public function __construct(protected string $filePath)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Excel::import(new CsvDataImport,$this->filePath);

    }
}
