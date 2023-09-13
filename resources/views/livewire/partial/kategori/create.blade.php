<div>
    <label for="my_modal_6" class="btn btn-neutral">@livewire('component.icon', ['name' => 'plus'])tambah sub kategori</label>

    <!-- Put this part before </body> tag -->
    <input type="checkbox" id="my_modal_6" class="modal-toggle" wire:model="show" />
    <div class="modal">
        <form class="modal-box" wire:submit.prevent="simpan">
            <h3 class="font-bold text-lg">Tambah sub kategori</h3>
            <div class="py-4 flex flex-col gap-3">
                <select class="select bg-base-200 shadow w-full" wire:model="selectkat">
                    <option value="">Pilih kategori</option>
                    @foreach ($categories as $catid => $katname)
                        <option value="{{ $catid }}">{{ $katname }}</option>
                    @endforeach
                    <option value="+">+ buat kategori baru</option>
                </select>

                @if ($selectkat == '+')
                    <input type="text" class="input bg-base-200 shadow w-full" placeholder="Nama kategori baru"
                        wire:model="newkategori">
                @endif

                <input type="text" class="input bg-base-200 shadow w-full" placeholder="Nama sub kategori"
                    wire:model="subkategori">
            </div>
            <div class="modal-action justify-between">
                <label for="my_modal_6" class="btn">Close</label>
                <button type="submit" class="btn btn-primary">simpan</button>
            </div>
        </form>
    </div>
</div>
