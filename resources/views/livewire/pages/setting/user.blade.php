<div class="flex flex-col gap-6">
    <div class="flex justify-between gap-6">
        <input type="search" class="input bg-base-100 shadow"
        placeholder="Cari user dengan nama, username, unit atau role user">
        @livewire('partial.user.tambah')
    </div>
    <div class="overflow-x-auto bg-base-100 overflow-hidden rounded-xl">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Unit</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                <tr>
                    <th>{{ $data->id }}</th>
                    <td>
                        <div class="flex items-center gap-2">
                            <div class="avatar">
                                <div class="w-6 rounded-full">
                                    <img src="{{ $data->gambar }}" />
                                </div>
                            </div>
                            {{ $data->name }}
                        </div>
                    </td>
                    <td>{{ $data->username }}</td>
                    <td>{{ implode(', ', $data->getRoleNames()->toArray()) }}</td>
                    <td>{{ $data->unit->name ?? '' }}</td>
                    <td>
                        <button class="btn btn-xs btn-primary"
                        wire:click.prevent="$emit('showEdit', {{ $data->id }})">
                        detail
                    </button>
                    
                    <button class="btn btn-xs btn-primary"
                    wire:click.prevent="$emit('resetuserpass', {{ $data->id }})">
                    reset
                </button>
                
                <button class="btn btn-xs btn-primary"
                wire:click.prevent="deleteUser('{{ $data->id }}')">
                delete
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
