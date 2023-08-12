<div class="grid grid-cols-4 gap-6 min-h-16">
    <div>
        <div class="card card-compact bg-base-100">
            <div class="card-body">
                <div class="flex flex-col">
                    <b>Kategori</b>
                    <span>{{ $data->subkategori->name ?? '-' }} ({{ $data->subkategori->kategori->name ?? '-' }})</span>
                </div>

                <div class="flex flex-col">
                    <b>unit</b>
                    <span>{{ $data->unit->name ?? '-' }}</span>
                </div>

                <div class="flex flex-col">
                    <b>jenis</b>
                    <span>surat {{ $data->jenis }}</span>
                </div>

                <div class="flex flex-col">
                    <b>perihal</b>
                    <span>{{ $data->perihal }}</span>
                </div>

                <div class="divider"></div>

                <button class="btn btn-success" wire:click.prevent="downloadfile({{ $data->id }})">
                    @livewire('component.icon', ['name' => 'download'])
                    download
                </button>

            </div>
        </div>
    </div>
    <div class="col-span-3">
        <iframe src="{{ Storage::url($data->file) }}" frameborder="0" class="w-full min-h-full"></iframe>
    </div>
</div>
