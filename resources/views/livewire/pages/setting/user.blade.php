<div class="fc6">
    <div class="flex justify-between gap-6">
        @livewire('partial.header', [
            "title" => "Pengaturan data user",
            "subtitle" => "Menambahkan, mengubah dan menhapus data user",
        ])
        @livewire('partial.user.tambah')
    </div>
    <div class="flex">
        <div>
            <input type="search" class="input bg-base-100 shadow" placeholder="Cari user dengan nama, username, unit atau role user">
        </div>
    </div>
    <div class="overflow-x-auto bg-base-100 overflow-hidden rounded-xl shadow">
        <table class="table whitespace-nowrap">
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
                        @can('user.edit')
                        <button class="btn btn-xs btn-success" wire:click.prevent="$emit('showEdit', {{ $data->id }})">
                            edit
                        </button>
                        <button class="btn btn-xs btn-neutral" wire:click.prevent="$emit('resetuserpass', {{ $data->id }})">
                            reset
                        </button>
                        @endcan

                        @can('user.delete')    
                        <button class="btn btn-xs btn-error" wire:click.prevent="deleteUser('{{ $data->id }}')">
                            delete
                        </button>
                        @endcan
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        @livewire('partial.user.edit')
        @livewire('partial.user.resetpass')
    </div>
</div>
