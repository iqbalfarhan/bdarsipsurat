<div class="flex flex-col gap-6">
    <div>
        <button for="modalaction" class="btn btn-neutral" wire:click.prevent='tambahunit'>
            @livewire('component.icon', ['name' => 'plus'])
            Open modal
        </button>
    </div>

    <div class="overflow-x-auto bg-base-100 shadow">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama unit</th>
                <th>Jumlah surat</th>
                <th>Jumlah user</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->surats_count }}</td>
                    <td>{{ $data->users_count }}</td>
                    <td>
                        <a wire:click.prevent="selectUnit({{ $data->id }})" class="btn btn-xs btn-primary">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <input type="checkbox" id="modalaction" class="modal-toggle" wire:model='showModal' />
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">{{ $editMode ? 'Edit nama unit' : 'Tulis nama unit baru' }}</h3>
            @if ($editMode)
            <form class="card-actions" wire:submit.prevent="perbarui">
                <input type="text" wire:model="newunit" class="input bg-base-200 w-full"
                placeholder="Edit nama unit">
                <div class="modal-action">
                <button class="btn btn-success">simpan unit</button>
                <button class="btn" wire:click.prevent="bataledit">batal</button>
                </div>
            </form>
            @else
            <form class="card-actions" wire:submit.prevent="simpan">
                <input type="text" wire:model="newunit" class="input bg-base-200 w-full"
                placeholder="Tambah unit baru">
                <div class="modal-action">
                    <label for="modalaction" class="btn">batal</label>
                    <button class="btn btn-primary">tambah unit</button>
                </div>
            </form>
            @endif
        </div>
    </div>
</div>
