<div>
    <input type="checkbox" id="createSurat" class="modal-toggle" wire:model="show" />
    <div class="modal">
        <form class="modal-box" wire:submit.prevent="simpan">
            <h3 class="font-bold text-lg">Tambah surat baru</h3>
            <div class="py-4 flex flex-col gap-4">
                <select wire:model="subkategori_id"
                    class="select bg-base-200 shadow @error('subkategori_id') select-error @enderror">
                    <option value="masuk">pilih subkategori</option>
                    @foreach ($subkategories as $subkat)
                        <optgroup label="{{ $subkat->name }}">
                            @foreach ($subkat->subs->pluck('name', 'id') as $id => $sub)
                                <option value="{{ $id }}">{{ $sub }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <select wire:model="unit_id" class="select bg-base-200 shadow @error('unit_id') select-error @enderror">
                    <option value="masuk">pilih unit</option>
                    @foreach ($units as $unit_id => $unit)
                        <option value="{{ $unit_id }}">{{ $unit }}</option>
                    @endforeach
                </select>
                <select wire:model="jenis" class="select bg-base-200 shadow @error('jenis') select-error @enderror">
                    <option value="masuk">Surat masuk</option>
                    <option value="keluar">Surat keluar</option>
                </select>
                <textarea wire:model="perihal" class="textarea bg-base-200 shadow @error('perihal') textarea-error @enderror"
                    placeholder="Perihal surat"></textarea>
                <input wire:model="file" type="file"
                    class="file-input bg-base-200 shadow @error('file') input-error @enderror" placeholder="file"
                    accept="application/pdf">
            </div>
            <div class="modal-action justify-between">
                <label for="createSurat" class="btn">Close!</label>
                <button type="submit" class="btn">Simpan</button>
            </div>
        </form>
    </div>
</div>
