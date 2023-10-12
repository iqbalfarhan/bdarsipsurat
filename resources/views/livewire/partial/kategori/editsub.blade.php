<div>
    <input type="checkbox" id="modaleditsub" class="modal-toggle" wire:model='show' />
    <div class="modal">
        <form class="modal-box" wire:submit.prevent='simpan'>
            <h3 class="font-bold text-lg">Edit nama sub kategori!</h3>
            <div class="py-4 space-y-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Kategori</span>
                    </label>
                    <select type="text" class="select bg-base-200 @error('name') select-error @enderror" wire:model='kategori_id'>
                        <option value="">Pilih kategori</option>
                        @foreach ($kats as $katid => $katname)
                            <option value="{{ $katid }}">{{ $katname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama sub kategori</span>
                    </label>
                    <input type="text" class="input bg-base-200 @error('name') input-error @enderror" wire:model='name'>
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="modaleditsub" class="btn">Close</label>
                <button class="btn btn-neutral">Simpan</button>
            </div>
        </form>
    </div>
</div>
