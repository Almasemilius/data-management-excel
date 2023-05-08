<div class="px-5 lg:p-5">
    <div class="grid grid-cols-8 gap-5">
        <div class="col-span-8 lg:col-span-4">
            <input type="search" class="border-2 py-1 px-2 w-full" wire:model="searchData">
        </div>
        <div class="col-span-8 lg:col-span-4 w-full grid grid-cols-2 lg:grid-cols-4 gap-5">
            <select name="" id="" class="header-select" wire:model="symmetry">
                <option value="">Symmetry</option>
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
            </select>
            <select name="" id="" class="header-select" wire:model="cut">
                <option value="">Cut</option>
                <option value="Oval">Oval</option>
                <option value="Round">Round</option>
                <option value="Pear">Pear</option>
                <option value="Emerald">Emerald</option>
                <option value="Princess">Princess</option>
                <option value="Heart">Heart</option>
                <option value="Marquise">Marquise</option>
            </select>
            <select name="" id="" class="header-select" wire:model="cutQuality">
                <option value="">Cut Quality</option>
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
            </select>
            <select name="" id="" class="header-select" wire:model="polish">
                <option value="">Polish</option>
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
            </select>
        </div>
    </div>
    <div class="w-full overflow-x-auto py-5">
        <table class="w-full whitespace-no-wrap border-2 shadow-md">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                    <th class="table-cell header">S/N</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','cut')">cut</th=>
                    <th class="table-cell header" wire:click="$set('sortByCol','color')">color</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','clarity')">clarity</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','carat_weight')">carat weight</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','cut_quality')">cut quality</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','lab')">lab</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','symmetry')">symmetry</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','polish')">polish</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','eye_clean')">eye clean</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','culet_size')">culet size</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','culet_condition')">culet condition</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','depth_percent')">depth percent</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','table_percent')">table percent</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','meas_length')">meas length</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','meas_width')">meas width</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','meas_depth')">meas depth</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','girdle_min')">girdle min</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','girdle_max')">girdle max</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fluor_color')">fluor color</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fluor_intensity')">fluor intensity</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fancy_color_dominant_color')">fancy color dominant color</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fancy_color_secondary_color')">fancy color secondary color</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fancy_color_overtone')">fancy color overtone</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','fancy_color_intensity')">fancy color intensity</th>
                    <th class="table-cell header" wire:click="$set('sortByCol','total_sales_price')">Total Sales price</th>
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
</div>