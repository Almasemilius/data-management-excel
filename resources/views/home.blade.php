@extends('layouts.default')

@section('content')
<div class="px-5 py-10 lg:p-5 flex w-full justify-between">
    <form class="flex items-center gap-2" enctype="multipart/form-data" method="post" action="{{route('import.csv')}}">
        @csrf
        <label class="cursor-pointer" for="csvFile">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-indigo-600">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
            </svg>
        </label>
        <input class="hidden" type="file" name="csvFile" id="csvFile">
        <button class="btn " type="submit">Upload</button>
    </form>
    <a href="{{route('export.excel')}}" class="btn " type="button">Download</a>
</div>
<div class="px-5 lg:p-5">
    <form action="{{route('filter')}}" method="GET" id="filterForm">
        @csrf
        <div class="grid grid-cols-9 gap-5">
            <div class="col-span-8 lg:col-span-4 relative">
                <input name="searchData" type="text" class="border-2 py-1 px-2 w-full">
                <button class="absolute right-3 inset-y-0 my-auto" onclick="document.getElementById('filterForm').submit()">Search</button>
            </div>
            <div class="col-span-8 lg:col-span-4 w-full grid grid-cols-2 lg:grid-cols-5 gap-5">
                <select name="symmetry" id="" class="header-select" onchange="document.getElementById('filterForm').submit()">
                    <option value="">Symmetry</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                </select>
                <select name="cut" id="" class="header-select" onchange="document.getElementById('filterForm').submit()">
                    <option value="">Cut</option>
                    <option value="Oval">Oval</option>
                    <option value="Round">Round</option>
                    <option value="Pear">Pear</option>
                    <option value="Emerald">Emerald</option>
                    <option value="Princess">Princess</option>
                    <option value="Heart">Heart</option>
                    <option value="Marquise">Marquise</option>
                </select>
                <select name="cut_quality" id="" class="header-select" onchange="document.getElementById('filterForm').submit()">
                    <option value="">Cut Quality</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                </select>
                <select name="polish" id="" class="header-select" onchange="document.getElementById('filterForm').submit()">
                    <option value="">Polish</option>
                    <option value="Excellent">Excellent</option>
                    <option value="Very Good">Very Good</option>
                    <option value="Good">Good</option>
                </select>
                <div>
                    <button class="header-select" href="" onclick="resetQueryParams()">Reset</button>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="w-full overflow-x-auto py-5">
    <table class="w-full whitespace-no-wrap border-2 shadow-md">
        <thead>
            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                <th class="table-cell">S/N</th>
                <th class="table-cell">@sortablelink('cut', 'Cut')</th>
                <th class="table-cell">@sortablelink('color', 'Color')</th>
                <th class="table-cell">@sortablelink('clarity', 'Clarity')</th>
                <th class="table-cell">@sortablelink('carat_weight', 'Carat Weight')</th>
                <th class="table-cell">@sortablelink('cut_quality', 'cut quality')</th>
                <th class="table-cell">@sortablelink('lab', 'lab')</th>
                <th class="table-cell">@sortablelink('symmetry', 'symmetry')</th>
                <th class="table-cell">@sortablelink('polish', 'polish')</th>
                <th class="table-cell">@sortablelink('eye_clean', 'Eye Clean')</th>
                <th class="table-cell">@sortablelink('culet_size', 'culet size')</th>
                <th class="table-cell">@sortablelink('culet_condition', 'culet condition')</th>
                <th class="table-cell">@sortablelink('depth_percent', 'depth percent')</th>
                <th class="table-cell">@sortablelink('table_percent', 'table percent')</th>
                <th class="table-cell">@sortablelink('meas_length', 'meas length')</th>
                <th class="table-cell">@sortablelink('meas_width', 'meas width')</th>
                <th class="table-cell">@sortablelink('meas_depth', 'meas depth')</th>
                <th class="table-cell">@sortablelink('girdle_min', 'girdle min')</th>
                <th class="table-cell">@sortablelink('girdle_max', 'girdle max')</th>
                <th class="table-cell">@sortablelink('fluor_color', 'fluor color')</th>
                <th class="table-cell">@sortablelink('fluor_intensity', 'fluor intensity')</th>
                <th class="table-cell">@sortablelink('fancy_color_dominant_color', 'fancy color dominant color')</th>
                <th class="table-cell">@sortablelink('fancy_color_secondary_color', 'fancy color secondary color')</th>
                <th class="table-cell">@sortablelink('fancy_color_overtone', 'fancy color overtone')</th>
                <th class="table-cell">@sortablelink('fancy_color_intensity', 'fancy color intensity')</th>
                <th class="table-cell">@sortablelink('total_sales_price', 'total sales price')</th>
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','cut')">cut</th=> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','color')">color</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','clarity')">clarity</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','carat_weight')">carat weight</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','cut_quality')">cut quality</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','lab')">lab</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','symmetry')">symmetry</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','polish')">polish</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','eye_clean')">eye clean</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','culet_size')">culet size</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','culet_condition')">culet condition</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','depth_percent')">depth percent</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','table_percent')">table percent</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','meas_length')">meas length</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','meas_width')">meas width</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','meas_depth')">meas depth</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','girdle_min')">girdle min</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','girdle_max')">girdle max</th> -->
                <!-- <th class="table-cell header" wire:click="$set('sortByCol','fluor_color')">fluor color</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fluor_intensity')">fluor intensity</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fancy_color_dominant_color')">fancy color dominant color</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fancy_color_secondary_color')">fancy color secondary color</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fancy_color_overtone')">fancy color overtone</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fancy_color_intensity')">fancy color intensity</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','total_sales_price')">Total Sales price</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index=>$data)
            <tr class="@if($index%2 == 0) bg-gray-100 @else bg-white @endif">
                <td class="table-cell">{{$index + 1}}</td>
                <td class="table-cell">{{$data->cut}}</td>
                <td class="table-cell">{{$data->color}}</td>
                <td class="table-cell">{{$data->clarity}}</td>
                <td class="table-cell">{{$data->carat_weight}}</td>
                <td class="table-cell">{{$data->cut_quality}}</td>
                <td class="table-cell">{{$data->lab}}</td>
                <td class="table-cell">{{$data->symmetry}}</td>
                <td class="table-cell">{{$data->polish}}</td>
                <td class="table-cell">{{$data->eye_clean}}</td>
                <td class="table-cell">{{$data->culet_size}}</td>
                <td class="table-cell">{{$data->culet_condition}}</td>
                <td class="table-cell">{{$data->depth_percent}}</td>
                <td class="table-cell">{{$data->table_percent}}</td>
                <td class="table-cell">{{$data->meas_length}}</td>
                <td class="table-cell">{{$data->meas_width}}</td>
                <td class="table-cell">{{$data->meas_depth}}</td>
                <td class="table-cell">{{$data->girdle_min}}</td>
                <td class="table-cell">{{$data->girdle_max}}</td>
                <td class="table-cell">{{$data->fluor_color}}</td>
                <td class="table-cell">{{$data->fluor_intensity}}</td>
                <td class="table-cell">{{$data->fancy_color_dominant_color}}</td>
                <td class="table-cell">{{$data->fancy_color_secondary_color}}</td>
                <td class="table-cell">{{$data->fancy_color_overtone}}</td>
                <td class="table-cell">{{$data->fancy_color_intensity}}</td>
                <td class="table-cell">{{$data->total_sales_price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-10 w-full">
        {{$datas->links()}}
    </div>
</div>
<script>
  function resetQueryParams() {
    var currentUrl = window.location.href;
    var url = new URL(currentUrl);
    url.search = '';
    window.history.replaceState({}, document.title, url.toString());
  }
</script>
@endsection