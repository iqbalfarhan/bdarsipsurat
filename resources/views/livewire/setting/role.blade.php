<div class="flex flex-col gap-6">
    <div class="flex justify-between">
        @livewire('partial.header', [
            "title" => "Pengaturan role dan permission",
            "subtitle" => "Asssign and revoke permission to role",
        ])
        <label class="btn btn-neutral" for="createRoleModal">
            @livewire('component.icon', ['name' => 'plus'])
            add permission
        </label>
    </div>
    <div class="flex justify-between">
        <input type="text" placeholder="Cari permission" wire:model='cari' class="input shadow">
    </div>
    <div class="overflow-x-auto bg-base-100 overflow-hidden rounded-xl shadow">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Permissions</th>
                @foreach ($roles as $rlid => $rl)
                <th class="capitalize">{{ $rl }}</th>
                @endforeach
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($permissions as $key => $permit)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $permit->name }}</td>
                    @foreach ($roles as $rlid => $rl)
                    <td>
                        <input type="checkbox" class="toggle" {{ $permit->hasRole($rl) ? "checked" : '' }} wire:click.prevent="assignRole({{ $permit->id }}, '{{ $rl }}')" />
                    </td>
                    @endforeach
                    <td>
                        <button class="btn btn-error btn-xs" wire:click.prevent='deletePermission({{ $permit->id }})'>hapus</button>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    @foreach ($roles as $rlid => $rl)
                    <td>
                        <button class="btn btn-error btn-xs" wire:click.prevent='deleteRole({{ $rlid }})'>hapus</button>
                    </td>
                    @endforeach
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    @livewire('partial.setting.create-role')
</div>
