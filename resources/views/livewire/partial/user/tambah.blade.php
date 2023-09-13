<div>
    <label for="createUserModal" class="btn btn-primary btn-circle">
        @livewire('component.icon', ['name' => 'plus'])
    </label>
    <input type="checkbox" id="createUserModal" class="modal-toggle" wire:model="show" />
    <div class="modal">
        <form wire:submit.prevent="simpan" class="modal-box">
            <h3 class="font-bold text-lg">Tambah user baru</h3>
            <div class="py-4 flex flex-col gap-3">
                <input type="text" wire:model="name" class="input bg-base-200 shadow w-full"
                    placeholder="nama lengkap">
                <input type="text" wire:model="username" class="input bg-base-200 shadow w-full"
                    placeholder="username">
                <input type="password" wire:model="password" class="input bg-base-200 shadow w-full"
                    placeholder="password">
                <select wire:model="role" class="select bg-base-200 shadow w-full">
                    <option value="">pilih role</option>
                    <option value="admin">Administartor</option>
                    <option value="user">User</option>
                </select>
                <select wire:model="unit_id" class="select bg-base-200 shadow w-full">
                    <option value="">pilih unit</option>
                    @foreach ($units as $id => $unit)
                        <option value="{{ $id }}">{{ $unit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="modal-action justify-between">
                <label for="createUserModal" class="btn">Close</label>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
