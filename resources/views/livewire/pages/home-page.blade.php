<div>
    <button wire:click="downloadExcel">Download Excel</button>
    <form enctype="multipart/form-data">
        <input type="file" id="csvFile">
        <button type="button" onClick="uploadChunks()">Upload Excel</button>
    </form>
    <table class="">
        <thead class="min-w-full overflow-x-scroll">
            <tr class=" min-w-full overflow-x-scroll">
                <th class="thead-cell">S/N</th>
                <th class="thead-cell">cut</th=>
                <th class="thead-cell">color</th>
                <th class="thead-cell">clarity</th>
                <th class="thead-cell">carat weight</th>
                <th class="thead-cell">cut quality</th>
                <th class="thead-cell">lab</th>
                <th class="thead-cell">symmetry</th>
                <th class="thead-cell">polish</th>
                <th class="thead-cell">eye clean</th>
                <th class="thead-cell">culet size</th>
                <th class="thead-cell">culet condition</th>
                <th class="thead-cell">depth percent</th>
                <th class="thead-cell">table percent</th>
                <th class="thead-cell">meas length</th>
                <th class="thead-cell">meas width</th>
                <th class="thead-cell">meas depth</th>
                <th class="thead-cell">girdle min</th>
                <th class="thead-cell">girdle max</th>
                <th class="thead-cell">fluor color</th>
                <th class="thead-cell">fluor intensity</th>
                <th class="thead-cell">fancy color dominant color</th>
                <th class="thead-cell">fancy color secondary color</th>
                <th class="thead-cell">fancy color overtone</th>
                <th class="thead-cell">fancy color intensity</th>
                <th class="thead-cell">Total Sales price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($datas as $index=>$data)
            <tr>
                <td>{{$index + 1}}</td>
                <td>{{$data->cut}}</td>
                <td>{{$data->color}}</td>
                <td>{{$data->clarity}}</td>
                <td>{{$data->carat_weight}}</td>
                <td>{{$data->cut_quality}}</td>
                <td>{{$data->lab}}</td>
                <td>{{$data->symmetry}}</td>
                <td>{{$data->polish}}</td>
                <td>{{$data->eye_clean}}</td>
                <td>{{$data->culet_size}}</td>
                <td>{{$data->culet_condition}}</td>
                <td>{{$data->depth_percent}}</td>
                <td>{{$data->table_percent}}</td>
                <td>{{$data->meas_length}}</td>
                <td>{{$data->meas_width}}</td>
                <td>{{$data->meas_depth}}</td>
                <td>{{$data->girdle_min}}</td>
                <td>{{$data->girdle_max}}</td>
                <td>{{$data->fluor_color}}</td>
                <td>{{$data->fluor_intensity}}</td>
                <td>{{$data->fancy_color_dominant_color}}</td>
                <td>{{$data->fancy_color_secondary_color}}</td>
                <td>{{$data->fancy_color_overtone}}</td>
                <td>{{$data->fancy_color_intensity}}</td>
                <td>{{$data->total_sales_price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="py-10">
        {{$datas->links()}}
    </div>
    @push('scripts')
    <script>
        function uploadChunks() {
            const file = document.querySelector('#csvFile').files[0];

            // Send the following later at the next available call to component
            @this.set('fileName', file.name, true);
            @this.set('fileSize', file.size, true);
            livewireUploadChunk(file, 0);
        }

        function livewireUploadChunk(file, start) {
            const chunkEnd = Math.min(start + @js($chunkSize), file.size);
            const chunk = file.slice(start, chunkEnd);
            // @this.upload('fileChunk', chunk);
            // @this.upload('fileChunk', chunk);
            @this.upload('fileChunk', chunk, (uName) => {}, () => {}, (event) => {
                if (event.detail.progress == 100) {
                    // We recursively call livewireUploadChunk from within itself
                    start = chunkEnd;
                    if (start < file.size) {
                        livewireUploadChunk(file, start);
                    }
                }
            });
        }
    </script>
    @endpush
</div>