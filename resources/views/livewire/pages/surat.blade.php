<div class="flex flex-col gap-6">

    <div class="flex justify-between">
        <input type="text" class="input bg-base-100" wire:model="perihal" placeholder="Pencarian cepat">
        <button class="btn btn-primary" wire:click="$set('showFilter', {{ !$showFilter }})">Filter surat</button>
    </div>

    <div class="overflow-x-auto bg-base-100">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th></th>
                    <th>Unit</th>
                    <th>Kategori / Sub kategori</th>
                    <th>Jenis</th>
                    <th>Perihal</th>
                    <th>Created at</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @if ($showFilter)
                <tr class="bg-base-300">
                    <th>
                        @livewire('component.icon', ['name' => 'filter'])
                    </th>
                    <td>
                        <select wire:model="unit_id" class="select w-full select-sm">
                            <option value="">Semua unit</option>
                            @foreach ($units as $unitid => $unitname)
                                <option value="{{ $unitid }}">{{ $unitname }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td class="space-y-1">
                        <select wire:model="kat_id" class="select w-full select-sm">
                            <option value="">pilih kategori</option>
                            @foreach ($kategories as $katid => $kat)
                            <option value="{{ $katid }}">{{ $kat }}</option>
                            @endforeach
                        </select>
                        <select wire:model="subkat_id" class="select w-full select-sm">
                            <option value="">Semua subkategori</option>
                            @foreach ($subkategories as $subkatid => $sub)
                                <option value="{{ $subkatid }}">{{ $sub }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select wire:model="jenis" class="select w-full select-sm">
                            <option value="">Semua jenis surat</option>
                            <option value="masuk">Surat masuk</option>
                            <option value="keluar">Surat keluar</option>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="input w-full input-sm" placeholder="Perihal">
                    </td>
                    <td>
                        <input type="date" class="input w-full input-sm" placeholder="tanggal">
                    </td>
                    <td>
                        <button class="btn btn-xs btn-warning btn-square" wire:click.prevent="resetFilter">
                            @livewire('component.icon', ['name' => 'x'])
                        </button>
                    </td>
                </tr>
                @endif
                @foreach ($datas as $data)
                    <tr>
                        <th>{{ $data->id }}</th>
                        <td>{{ Str::limit($data->unit->name ?? "", 20) }}</td>
                        <td>
                            <div class="flex flex-col">
                                <span>{{ Str::limit($data->subkategori->kategori->name ?? "", 20) }}</span>
                                <span>{{ Str::limit($data->subkategori->name, 20) }}</span>
                            </div>
                        </td>
                        <td class="@if($data->jenis == 'masuk') text-success @endif capitalize">{{ $data->jenis }}</td>
                        <td>{{ Str::limit($data->perihal, 20) }}</td>
                        <td>{{ $data->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="{{ route('detailsurat', $data->id) }}" class="btn btn-xs btn-square">
                                @livewire('component.icon', ['name' => 'eye'], key(uniqid()))
                            </a>
                            @if ($data->file)
                                <button class="btn btn-xs btn-square"
                                    wire:click.prevent="download('{{ $data->id }}')">
                                    @livewire('component.icon', ['name' => 'filedownload'], key(uniqid()))
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
