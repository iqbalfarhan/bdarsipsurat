<div class="fc6">
    <div class="flex justify-between">
        @livewire('partial.header', [
            'title' => 'Edit detail surat',
            'subtitle' => 'Edit surat, perihal jenis dan keterangan lainnya',
        ])

        <div class="flex gap-2">
            <a href="{{ route('detailsurat', $surat_id) }}" class="btn btn-active">
                @livewire('component.icon', ['name' => 'arrowleft'])
                <span class="hidden lg:block">Batal</span>
            </a>
            <button wire:click.prevent='simpan' class="btn btn-neutral">
                @livewire('component.icon', ['name' => 'check'])
                <span class="hidden lg:block">Simpan</span>
            </button>
        </div>
    </div>

    <div class="grid lg:grid-cols-2 gap-6">
        <div>
            <div class="card bg-base-100 shadow w-full">
                <div class="card-body">
                    <h3 class="card-title">
                        Keterangan surat
                    </h3>
                    <div class="fc4">
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Kategori surat</span>
                            </label>
                            <select wire:model="subkategori_id" class="select bg-base-200 shadow @error('subkategori_id') select-error @enderror">
                                <option value="masuk">Pilih subkategori</option>
                                @foreach ($subkategories as $subkat)
                                <optgroup label="{{ $subkat->name }}">
                                    @foreach ($subkat->subs->pluck('name', 'id') as $id => $sub)
                                    <option value="{{ $id }}">{{ $sub }}</option>
                                    @endforeach
                                </optgroup>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Unit departement</span>
                            </label>
                            <select wire:model="unit_id" class="select bg-base-200 shadow @error('unit_id') select-error @enderror">
                                <option value="masuk">pilih unit</option>
                                @foreach ($units as $unit_id => $unit)
                                <option value="{{ $unit_id }}">{{ $unit }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Jenis surat</span>
                            </label>
                            <select wire:model="jenis" class="select bg-base-200 shadow @error('jenis') select-error @enderror">
                                <option value="masuk">Surat masuk</option>
                                <option value="keluar">Surat keluar</option>
                            </select>
                        </div>
                        <div class="form-control">
                            <label for="" class="label">
                                <span class="label-text">Perihal</span>
                            </label>
                            <textarea wire:model="perihal" class="textarea bg-base-200 shadow @error('perihal') textarea-error @enderror" placeholder="Perihal surat"></textarea>
                            <label for="" class="label">
                                <i class="label-text-alt">Tuliskan perihal surat untuk mempermudah pencarian surat</i>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="fc6 w-full">
            <div class="card bg-base-100 shadow w-full">
                <div class="card-body">
                    <h3 class="card-title">
                        Ubah Keamanan file
                    </h3>
                    <div class="form-control">
                        <label class="label cursor-pointer">
                            <span class="label-text">Lindungi dokumen ini dengan password?</span> 
                            <input type="checkbox" class="toggle" wire:model="use_password" />
                        </label>
                    </div>
                    
                    @if ($use_password)
                    <span class="divider"></span>
                    <div class="form-control">
                        <input type="password" class="input bg-base-200 @error('password') input-error @enderror"  placeholder="Password dokumen" wire:model="password">
                        <label for="" class="label">
                            <i class="label-text-alt text-neutral">Pastikan anda mengingat password ini untuk membuka file. kosongkan field ini bila tidak ingin merubah password.</i>
                        </label>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="card bg-base-100 shadow w-full">
                <div class="card-body">
                    <h3 class="card-title">
                        Upload file surat baru
                    </h3>

                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Upload file surat (*.pdf) :</span>
                        </label>
                        <input wire:model="file" type="file" class="file-input bg-base-200 shadow @error('file') input-error @enderror" placeholder="file" accept="application/pdf">
                    </div>
                    
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Preview file :</span>
                        </label>
                        @if ($file)
                            <iframe src="{{  $file->temporaryUrl() }}" frameborder="0" class="aspect-video w-full"></iframe>
                        @elseif($filebefore)
                            <iframe src="{{ Storage::url($filebefore) }}" frameborder="0" class="aspect-video w-full"></iframe>
                        @else
                            <div class="card bg-base-200 shadow text-center">
                                <div class="card-body text-xs">Tidak ada file</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
