<div class="flex flex-col gap-6">
    <div class="flex justify-between">
        <input type="text" placeholder="Cari permission" wire:model='cari' class="input input-shadow">
        <label class="btn btn-neutral" for="createRoleModal">
            @livewire('component.icon', ['name' => 'plus'])
            add permission
        </label>
    </div>
    <div class="overflow-x-auto bg-base-100">
        <table class="table">
            <thead class="bg-base-300">
                <th>Permissions</th>
                @foreach ($roles as $rlid => $rl)
                <th class="capitalize">{{ $rl }}</th>
                @endforeach
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($permissions as $permitid => $permit)
                <tr>
                    <td>{{ $permit }}</td>
                    @foreach ($roles as $rlid => $rl)
                    <td>
                        <input type="checkbox" class="toggle" />
                    </td>
                    @endforeach
                    <td>
                        <button class="btn btn-error btn-xs" wire:click.prevent='deletePermission({{ $permitid }})'>hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('partial.setting.create-role')
</div>
