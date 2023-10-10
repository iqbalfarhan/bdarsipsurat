<div>
    <input type="checkbox" id="editkat" class="modal-toggle" wire:model='show' />
    <div class="modal">
        <form class="modal-box" wire:submit.prevent='simpan'>
            <h3 class="font-bold text-lg">Edit kategori</h3>
            <div class="py-4 space-y-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama kategori</span>
                    </label>
                    <input type="text" class="input w-full" placeholder="Nama kategori" wire:model='name'>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Warna label</span>
                    </label>
                    <input type="color" class="input w-full" placeholder="Nama kategori" wire:model='warna'>
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="editkat" class="btn">Batal</label>
                <button class="btn btn-neutral">Simpan</button>
            </div>
        </form>
    </div>
</div>
