<?php

namespace App\Http\Livewire\Components;

use App\Models\CsvData;
use Livewire\Component;
use Livewire\WithPagination;

class CsvDataList extends Component
{
    use WithPagination;
    public $searchData;
    public $symmetry;
    public $cut;
    public $polish;
    public $cutQuality;
    public $sortByCol;
    public function render()
    {
        $datas = CsvData::query();

        $datas->when($this->symmetry, function ($query) {
            $query->where('symmetry', $this->symmetry);
        })->when($this->cut, function ($query) {
            $query->where('cut', $this->cut);
        })->when($this->polish, function ($query) {
            $query->where('polish', $this->polish);
        })->when($this->cutQuality, function ($query) {
            $query->where('cut_quality', $this->cutQuality);
        })->when($this->sortByCol, function ($query) {
            $query->orderBy($this->sortByCol);
        });

        if (strlen($this->searchData > 0)) {
            $datas->where('depth_percent', 'like', "%$this->searchData%")
                ->orWhere('carat_weight', 'like', "%$this->searchData%")
                ->orWhere('table_percent', 'like', "%$this->searchData%")
                ->orWhere('meas_length', 'like', "%$this->searchData%")
                ->orWhere('meas_width', 'like', "%$this->searchData%")
                ->orWhere('meas_depth', 'like', "%$this->searchData%");
        }

        $datas = $datas->paginate(15);
        return view('livewire.components.csv-data-list', compact('datas'));
    }
}
