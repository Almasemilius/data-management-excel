<?php

namespace App\Http\Livewire\Pages;

use App\Exports\CsvDataExport;
use App\Imports\CsvDataImport;
use App\Models\CsvData;
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
    public $chunkSize = 2000000; // 1 MB
    public $fileChunk;

    public $fileName;
    public $fileSize;

    public $finalFile;
    
    protected $rules = [
        'csvFile' => 'required|mimes:csv,xcls|max:20480'
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
        // $curSize = Storage::size('/livewire-tmp/' . $this->fileName);
        // if ($curSize == $this->fileSize) {
        //     $this->finalFile = TemporaryUploadedFile::createFromLivewire('/' . $this->fileName);
        //     $this->uploadExcel();

        // }
        $this->csvFile = TemporaryUploadedFile::createFromLivewire('/' . $this->fileName);
        $this->uploadExcel();
    }

  
    public function downloadExcel()
    {
        (new CsvDataExport)->queue('invoices.xlsx');

        return back()->withSuccess('Export started!');
        // return (new CsvDataExport)->download('diamonds.xlsx');
    }

    public function uploadExcel()
    {
        // dd("Here");
        Excel::import(new CsvDataImport, $this->csvFile);
    }
    public function render()
    {
        $datas = CsvData::query();
        $datas = $datas->paginate(15);
        return view('livewire.pages.home-page', compact('datas'));
    }
}
