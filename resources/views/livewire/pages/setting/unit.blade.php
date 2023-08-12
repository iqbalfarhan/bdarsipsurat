<div class="flex justify-center">
    <div class="card card-compact bg-base-100 w-full max-w-lg">
        <ul class="menu ">
            @foreach ($datas as $dataid => $dataname)
                <li><a wire:click.prevent="selectUnit({{ $dataid }})">{{ $dataname }}</a></li>
            @endforeach
        </ul>
        <div class="divider"></div>
        <div class="card-body">
            <span class="font-semibold">{{ $editMode ? 'Edit nama unit' : 'Tulis nama unit baru' }}:</span>
            @if ($editMode)
                <form class="card-actions" wire:submit.prevent="perbarui">
                    <input type="text" wire:model="newunit" class="input bg-base-200 w-full"
                        placeholder="Edit nama unit">
                    <button class="btn btn-sm btn-success">simpan unit</button>
                    <button class="btn btn-sm" wire:click.prevent="bataledit">batal</button>
                </form>
            @else
                <form class="card-actions" wire:submit.prevent="simpan">
                    <input type="text" wire:model="newunit" class="input bg-base-200 w-full"
                        placeholder="Tambah unit baru">
                    <button class="btn btn-sm btn-primary">tambah unit</button>
                </form>
            @endif
        </div>
    </div>
</div>
