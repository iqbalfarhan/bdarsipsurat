<div class="fc6">
    <div class="flex justify-between">
        @livewire('partial.header', [
        'title' => 'Detail ticket',
        'subtitle' => $data->perihal
        ])
        
        <div>
            @if ($canAccess)
            <button class="btn btn-success">
                @livewire('component.icon', ['name' => 'download'])
                <span class="hidden lg:block">Download</span>
            </button>
            @endif
        </div>
    </div>
    @if ($canAccess)
    <div class="grid lg:grid-cols-3 gap-6 min-h-16">
        <div class="lg:col-span-2 fc4">
            <div class="card bg-base-100 shadow">
                <div class="card-body">
                    @if ($data->file)
                    <iframe src="{{ Storage::url($data->file) }}" frameborder="0" class="w-full min-h-full"></iframe>
                    @else    
                    File tidak ditemukan
                    @endif
                </div>
            </div>
        </div>
        <div class="fc4">
            <div class="card bg-base-100 shadow">
                <div class="card-body text-sm">
                    <h3 class="card-title">Kategori</h3>
                    {{ $data->kategori->name }}                    
                    sub:{{ $data->subkategori->name }}                    
                </div>
            </div>
            <div class="card bg-base-100 shadow">
                <div class="card-body text-sm">
                    <h3 class="card-title">Jenis surat</h3>
                    Surat {{ $data->jenis }}
                </div>
            </div>
            <div class="card bg-base-100 shadow">
                <div class="card-body text-sm">
                    <h3 class="card-title">Diinput oleh</h3>
                    {{ $data->user->name }} ({{ $data->user->unit->name }})
                </div>
            </div>
            <div class="card bg-base-100 shadow">
                <div class="card-body text-sm">
                    <h3 class="card-title">Tanggal input</h3>
                    {{ $data->created_at->format('d F Y H:i') }} ({{ $data->created_at->diffForHumans() }})
                </div>
            </div>
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
                        <input type="password" wire:model="password" class="input @error('password') input-error @enderror bg-base-200" placeholder="Password dokumen" />
                    </div>
                </div>
                <div class="modal-action justify-between">
                    <label for="modalPassword" class="btn">Close!</label>
                    <button type="submit" class="btn btn-neutral">Validasi password</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    
</div>