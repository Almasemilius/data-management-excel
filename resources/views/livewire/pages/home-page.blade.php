<div>
    <div class="fixed inset-0" wire:loading>
        <div class="backdrop-blur-sm fixed inset-0 overflow-hidden flex justify-center items-center " style="height: 100%; width: 100%; z-index: 9999;">
            <div class="text-indigo-600 la-ball-clip-rotate la-3x">
                <div></div>
            </div>
        </div>
    </div>
    @if($exporting && !$exportFinished)
    <div class="notification-container" wire:poll="updateExportProgress">
        <div class="notification">
            Exporting in Progress please wait ...
        </div>
    </div>
    @endif

    @if($exportFinished)
    <div class="notification-container">
        <div class="notification">
            Process Completed. <a href="#" wire:click="getExcelFile">Download File</a>
        </div>
    </div>
    @endif
    <div class="px-5 py-10 lg:p-5 flex w-full justify-between">
        <form class="flex items-center gap-2" enctype="multipart/form-data">
            <label class="cursor-pointer" for="csvFile">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-indigo-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
                </svg>
            </label>
            <input class="hidden" type="file" id="csvFile">
            <button class="btn " type="button" onClick="uploadChunks()">Upload</button>
        </form>
        <button class="btn" wire:click="downloadExcel">Download Excel</button>

    </div>
    @livewire('components.csv-data-list')

    @push('scripts')
    <script>
        function uploadChunks() {
            const file = document.querySelector('#csvFile').files[0];

            @this.set('fileName', file.name, true);
            @this.set('fileSize', file.size, true);
            livewireUploadChunk(file, 0);
        }

        function livewireUploadChunk(file, start) {
            const chunkEnd = Math.min(start + @js($chunkSize), file.size);
            const chunk = file.slice(start, chunkEnd);
            @this.upload('fileChunk', chunk, (uName) => {}, () => {}, (event) => {
                if (event.detail.progress == 100) {
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