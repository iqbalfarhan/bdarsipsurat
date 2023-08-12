<div class="flex flex-col gap-6">
    <div class="flex gap-6">
        <input type="search" class="input bg-base-100 w-full shadow"
            placeholder="Cari user dengan nama, username, unit atau role user">
        @livewire('partial.user.tambah')
    </div>
    <div>Total data yang ditampilkan : {{ $datas->count() }}</div>
    <div class="overflow-x-auto bg-base-100 overflow-hidden rounded-xl">
        <table class="table table-xs">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>role</th>
                    <th>Unit</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <th>{{ $data->id }}</th>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->username }}</td>
                        <td>{{ $data->role }}</td>
                        <td>{{ $data->unit->name ?? '' }}</td>
                        <td>
                            <button class="btn btn-xs btn-success tooltip" data-tip="edit user"
                                wire:click.prevent="$emit('showEdit', {{ $data->id }})">
                                @livewire('component.icon', ['name' => 'edit'], key(uniqid()))
                            </button>

                            <button class="btn btn-xs btn-neutral tooltip" data-tip="reset password"
                                wire:click.prevent="$emit('resetuserpass', {{ $data->id }})">
                                @livewire('component.icon', ['name' => 'key'], key(uniqid()))
                            </button>

                            <button class="btn btn-xs btn-error tooltip" data-tip="hapus user"
                                wire:click.prevent="deleteUser('{{ $data->id }}')">
                                @livewire('component.icon', ['name' => 'x'], key(uniqid()))
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @livewire('partial.user.edit')
        @livewire('partial.user.resetpass')
    </div>
</div>
