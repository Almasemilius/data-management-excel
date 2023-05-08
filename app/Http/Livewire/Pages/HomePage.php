<?php

namespace App\Http\Livewire\Pages;

use App\Exports\CsvDataExport;
use App\Imports\CsvDataImport;
use App\Jobs\ExportExcelJob;
use App\Models\CsvData;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\TemporaryUploadedFile;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class HomePage extends Component
{
    use WithPagination, WithFileUploads;
    public $csvFile;
    public $chunkSize = 2000000;
    public $fileChunk;

    public $fileName;
    public $fileSize;

    public $exporting =false;
    public $exportFinished =false;
    public $batchId;
    
    protected $rules = [
        'csvFile' => 'required|file|mimes:csv,xcls|max:20480'
    ];

    public function updatedFileChunk()
    {
        $chunkFileName = $this->fileChunk->getFileName();
        $finalPath = Storage::path('/livewire-tmp/' . $this->fileName);
        $tmpPath   = Storage::path('/livewire-tmp/' . $chunkFileName);
        $file = fopen($tmpPath, 'rb');
        $buff = fread($file, $this->chunkSize);
        fclose($file);

        $final = fopen($finalPath, 'ab');
        fwrite($final, $buff);
        fclose($final);
        unlink($tmpPath);
        $curSize = Storage::size('/livewire-tmp/' . $this->fileName);
        if ($curSize == $this->fileSize) {
            $this->csvFile = TemporaryUploadedFile::createFromLivewire('/' . $this->fileName);
            $this->uploadExcel();
        }
    }

    public function getExcelFile()
    {
        return Storage::download('public/diamonds.xlsx');
        $this->exportFinished = false;
    }

  
    public function downloadExcel()
    {
        $this->exporting = true;
        $this->exportFinished = false;

        $batch = Bus::batch([
            new ExportExcelJob(),
        ])->dispatch();

        $this->batchId = $batch->id;
    }

    public function updateExportProgress()
    {
        $this->exportFinished = $this->exportBatch->finished();

        if ($this->exportFinished) {
            $this->exporting = false;
        }
    }

    public function getExportBatchProperty()
    {
        if (!$this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function uploadExcel()
    {
        Excel::import(new CsvDataImport, $this->csvFile);

    }
    public function render()
    {
        return view('livewire.pages.home-page');
    }
}
