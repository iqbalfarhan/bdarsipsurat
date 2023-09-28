<div>
    <input type="checkbox" id="editDokumentasi" class="modal-toggle" wire:model='show' />
    <div class="modal">
        <form class="modal-box w-full max-w-4xl" wire:submit.prevent='simpan'>
            <h3 class="font-bold text-lg">Tambah dokumentasi</h3>
            @if ($data)
            <div class="py-4 space-y-3">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Group dokumentas</span>
                    </label>
                    <input type="text" class="input bg-base-200 w-full @error('group') input-error @enderror" wire:model="group" placeholder="Group dokumentasi">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Permission</span>
                    </label>
                    <select class="select bg-base-200 w-full @error('permission') select-error @enderror" wire:model="permission">
                        <option value="">Pilih permission</option>
                        @foreach ($permissions as $permit)
                            <option value="{{ $permit }}">{{ $permit }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Judul dokumentasi</span>
                    </label>
                    <input type="text" class="input bg-base-200 w-full @error('title') input-error @enderror" wire:model="title" placeholder="Judul dokumentasi">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Text dokumentasi</span>
                    </label>
                    <textarea rows="5" class="textarea bg-base-200 w-full @error('description') textarea-error @enderror" wire:model="description" placeholder="Deskripsi dokumentasi"></textarea>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">link video</span>
                    </label>
                    <input type="text" class="input bg-base-200 w-full @error('video') input-error @enderror" wire:model="video" placeholder="Link Video (bila ada)">
                </div>
            </div>
            @endif
            <div class="modal-action">
                <label for="editDokumentasi" class="btn">Close!</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
