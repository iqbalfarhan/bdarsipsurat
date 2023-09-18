<div>
    <input type="checkbox" id="editUserModal" class="modal-toggle" wire:model="show" />
    <div class="modal">
        @if ($data)
            <form class="modal-box" wire:submit.prevent="simpan">
                <h3 class="font-bold text-lg">Edit user</h3>
                <div class="py-4 flex flex-col gap-3">
                    <input type="text" wire:model="name" class="input bg-base-200 shadow">
                    <input type="text" wire:model="username" class="input bg-base-200 shadow">
                    <select wire:model="role" class="select bg-base-200 shadow">
                        <option value="">Pilih role</option>
                        <option value="admin">Administrator</option>
                        <option value="user">user</option>
                    </select>
                    <select wire:model="unit_id" class="select bg-base-200 shadow">
                        <option value="">Pilih unit</option>
                        @foreach ($units as $unitid => $unit)
                            <option value="{{ $unitid }}">{{ $unit }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-action justify-between">
                    <label for="editUserModal" class="btn">Close</label>
                    <button type="submit" class="btn">Simpan</button>
                </div>
            </form>
        @else
            <div class="modal-box">
                <h3 class="font-bold text-lg">Hello!</h3>
                <p class="py-4">This modal works with a hidden checkbox!</p>
                <div class="modal-action">
                    <label for="editUserModal" class="btn">Close!</label>
                </div>
            </div>
        @endif
    </div>
</div>
