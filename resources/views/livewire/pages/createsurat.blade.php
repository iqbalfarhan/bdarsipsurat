<form class="fc6" wire:submit.prevent="simpan">
    @livewire('partial.header', [
        'title' => 'Buat surat',
        'subtitle' => 'buat surat',
    ])
    <div class="grid lg:grid-cols-2 gap-6">
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
        
        <div class="fc6 w-full">
            <div class="card bg-base-100 shadow w-full">
                <div class="card-body">
                    <h3 class="card-title">
                        Keamanan file
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
                            <i class="label-text-alt text-neutral">Pastikan anda mengingat password ini untuk membuka file</i>
                        </label>
                    </div>
                    @endif
                </div>
            </div>
            
            <div class="card bg-base-100 shadow w-full">
                <div class="card-body">
                    <h3 class="card-title">
                        Upload file surat
                    </h3>
                    <div class="form-control">
                        <label for="" class="label">
                            <span class="label-text">Upload file surat (*.pdf)</span>
                        </label>
                        <input wire:model="file" type="file" class="file-input bg-base-200 shadow @error('file') input-error @enderror" placeholder="file" accept="application/pdf">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card bg-base-100 shadow w-full">
        <div class="card-body">
            <div class="card-actions justify-between">
                <button class="btn btn-neutral">simpan</button>
                <button class="btn btn-ghost">Batal</button>
            </div>
        </div>
    </div>
</form>