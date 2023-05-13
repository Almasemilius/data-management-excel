<?php

namespace App\Http\Controllers\web;

use App\Exports\CsvDataExport;
use App\Http\Controllers\Controller;
use App\Imports\CsvDataImport;
use App\Jobs\ExportExcelJob;
use App\Models\CsvData;
use Illuminate\Bus\Batch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;
use Maatwebsite\Excel\Facades\Excel;

class CsvDataController extends Controller
{
    public function exportExcel()
    {
        // (new CsvDataExport)->store('public/diamonds.xlsx');;
        $batch = Bus::batch([
            new ExportExcelJob(),
        ])->finally(function(Batch $batch){
            dd('Here');
        })->dispatch();
        return back()->with('downloadStarted','Export Process Running');

    }

    public function importCsv(Request $request)
    {
        // $csvFile = $request->csvFile;
        // Excel::import(new CsvDataImport, $csvFile);
        return back()->with('uploadStarted','Import Process Running');
        // dd($csv);
    }

    public function filter(Request $request)
    {
        $datas = CsvData::query();

        $datas->when($request->symmetry, function ($query) use ($request) {
            $query->where('symmetry', $request->symmetry);
        })->when($request->cut, function ($query) use ($request) {
            $query->where('cut', $request->cut);
        })->when($request->polish, function ($query) use ($request) {
            $query->where('polish', $request->polish);
        })->when($request->cut_quality, function ($query) use ($request) {
            $query->where('cut_quality', $request->cut_quality);
        })->when($request->sortByCol, function ($query) use ($request) {
            $query->orderBy($request->sortByCol);
        })->when($request->searchData, function($query) use($request){
            $query->where('depth_percent', 'like', "%$request->searchData%")
                    ->orWhere('carat_weight', 'like', "%$request->searchData%")
                    ->orWhere('table_percent', 'like', "%$request->searchData%")
                    ->orWhere('meas_length', 'like', "%$request->searchData%")
                    ->orWhere('meas_width', 'like', "%$request->searchData%")
                    ->orWhere('meas_depth', 'like', "%$request->searchData%");
        });

        $datas = $datas->sortable()->paginate(15)->withQueryString();
        return view('home',compact('datas'));
    }

    public function index()
    {
        $datas = CsvData::paginate(15);
        return view('home', compact('datas'));
    }
}
