<div class="grid grid-cols-5 gap-6">
    <div class="flex flex-col gap-4">
        <div class="card-title">
            filter data
        </div>
        <div class="flex flex-col gap-1">
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
            <select wire:model="jenis" class="select w-full select-sm">
                <option value="">Semua jenis surat</option>
                <option value="masuk">Surat masuk</option>
                <option value="keluar">Surat keluar</option>
            </select>
            <select wire:model="unit_id" class="select w-full select-sm">
                <option value="">Semua unit</option>
                @foreach ($units as $unitid => $unitname)
                    <option value="{{ $unitid }}">{{ $unitname }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <button class="btn btn-xs btn-warning" wire:click.prevent="resetFilter">
                @livewire('component.icon', ['name' => 'x'])
                reset filter
            </button>
        </div>
    </div>

    <div class="col-span-4 flex flex-col gap-3">

        <div>Total data yang ditampilkan : {{ $datas->count() }}</div>


        <div class="flex flex-col gap-3">
            <input type="text" class="input input-sm bg-base-100" wire:model="perihal"
                placeholder="Pencarian dengan perihal">
            <div class="overflow-x-auto w-full overflow-hidden bg-base-100 rounded-lg">
                <table class="table table-xs">
                    <!-- head -->
                    <thead>
                        <tr>
                            <th></th>
                            <th>Kategori</th>
                            <th>Subkategori</th>
                            <th>Jenis</th>
                            <th>Perihal</th>
                            <th>Unit</th>
                            <th>Unduh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <th>{{ $data->id }}</th>
                                <td>{{ Str::limit($data->subkategori->kategori->name, 30) }}</td>
                                <td>{{ Str::limit($data->subkategori->name, 30) }}</td>
                                <td>{{ $data->jenis }}</td>
                                <td>{{ Str::limit($data->perihal, 30) }}</td>
                                <td>{{ $data->unit->name }}</td>
                                <td>
                                    @if ($data->file)
                                        <button class="btn btn-xs"
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
    </div>

</div>
