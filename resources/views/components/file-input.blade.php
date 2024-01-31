@props([
'name' => null,
'multiple' => false
])
@use(Spatie\MediaLibrary\Support\File)
<div class="w-full mb-3 " x-data="fileUpload()">
    <label id="FileUpload" for="dropzone-file"
        class="relative flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg h-44 bg-gray-50"
        :class="{ 'border-indigo-500': isDragging }">
        <input {{ $attributes->merge(['name' => $name, 'multiple' => $multiple]) }} type="file" id="dropzone-file"
        class="absolute inset-0 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer"
        @change="handleFileChange($event)"
        @dragover="setDragState(true)"
        @dragleave="setDragState(false)"
        @drop="handleDrop"
        />
        <div class="flex flex-col items-center justify-center pt-5 pb-6">
            <div>
                <svg class="w-8 h-8 mb-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 20 16">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                </svg>
            </div>
            <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to
                    upload</span> or drag and drop</p>
            <p class="text-xs text-gray-500">Maximum file size {{ File::getHumanReadableSize((int) config('filesystems.maximum_filesize') * 1024) }}.</p>
        </div>
    </label>
    <template x-if="files.length">
        <template x-for="(file, index) in files" :key="index">
            <div class="flex flex-col mt-5 space-y-1 border border-indigo-300 rounded-md">
                <div class="flex items-center justify-between p-3">
                    <div class="flex items-center gap-3">
                        <div class="p-2 border border-gray-300 rounded-md">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" width="18"
                                height="18">
                                <path
                                    d="M2.9918 21C2.44405 21 2 20.5551 2 20.0066V3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918ZM20 15V5H4V19L14 9L20 15ZM20 17.8284L14 11.8284L6.82843 19H20V17.8284ZM8 11C6.89543 11 6 10.1046 6 9C6 7.89543 6.89543 7 8 7C9.10457 7 10 7.89543 10 9C10 10.1046 9.10457 11 8 11Z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm leading-3" x-text="file.name"></p>
                            <span class="text-xs text-gray-600" x-text="formatBytes(file.size)"></span>
                        </div>
                    </div>
                    <!-- remove file -->
                    <div class="cursor-pointer" @click="removeFile(index)">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(230,84,84,1)" width="24"
                            height="24">
                            <path
                                d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z">
                            </path>
                        </svg>
                    </div>
                </div>
            </div>
        </template>
    </template>
</div>

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data('fileUpload', () => ({
            files: [],
            isDragging: false,
            handleFileChange(event) {
                if (this.multiple) {
                    const newFiles = Array.from(event.target.files)
                    this.files = this.files.concat(newFiles)
                } else {
                    this.files = Array.from(event.target.files)
                }
            },
            setDragState(isDragging) {
                isDragging = isDragging
            },
            handleDrop(event) {
                event.preventDefault();
                this.setDragState(false);
                if (this.multiple) {
                    const newFiles = Array.from(event.target.files)
                    this.files = this.files.concat(newFiles)
                } else {
                    this.files = Array.from(event.target.files)
                }
            },
            removeFile(index) {
                this.files.splice(index, 1);
            },
            formatBytes(bytes, decimals) {
                if (bytes == 0) return '0 Bytes';
                var k = 1024,
                    dm = decimals || 2,
                    sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
                    i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
            }
        }));
    })
</script>