@if ($canAccess)
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
@else
<div>
    <label for="modalPassword" class="btn btn-neutral">Coba buka kembali</label>
    <input type="checkbox" id="modalPassword" class="modal-toggle" checked />
    <div class="modal">
        <form class="modal-box" wire:submit.prevent='periksaPassword'>
            <h3 class="modal-title font-semibold">Input password</h3>
            <div class="py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Membutuhkan password untuk mengakses dokumen ini:</span>
                    </label>
                    <input type="password" wire:model="password" class="input bg-base-200" placeholder="Password dokumen" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="modalPassword" class="btn">Close!</label>
                <button type="button" class="btn btn-neutral">Validasi password</button>
            </div>
        </form>
    </div>
</div>
@endif
