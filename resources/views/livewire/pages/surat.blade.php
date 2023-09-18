<div class="flex flex-col gap-6">
    
    <div class="flex justify-between">
        @livewire('partial.header', [
            "title" => "Semua surat",
            "subtitle" => "tampilkan semua surat yang tersedia",
        ])
        <div class="flex gap-2">
            <a href="{{ route('createsurat') }}" class="btn btn-neutral">
                @livewire('component.icon', ['name' => 'plus'])
                <span>Tambah surat</span>
            </a>
            <button class="btn btn-primary" wire:click="$set('showFilter', {{ !$showFilter }})">
                @livewire('component.icon', ['name' => 'filter'])
            </button>
        </div>
    </div>

    <div class="flex justify-between">
        <input type="text" class="input bg-base-100" wire:model="perihal" placeholder="Pencarian cepat">
        <select class="select bg-base-100" wire:model='perpage'>
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
    </div>
    
    <div class="overflow-x-auto bg-base-100 overflow-hidden rounded-xl shadow">
        @if ($datas->hasPages())
        <div class="card-body border-b">
            {{ $datas->links() }}
        </div>
        @endif
        <table class="table">
            <thead class="bg-base-300">
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
                @forelse ($datas as $data)
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
                        <a href="{{ route('detailsurat', $data->id) }}" class="btn btn-xs">detail</a>
                        @if ($data->file)
                        <button class="btn btn-xs" wire:click.prevent="download('{{ $data->id }}')">
                            @livewire('component.icon', ['name' => 'filedownload'], key(uniqid()))
                        </button>
                        @endif
                    </td>
                </tr>
                @empty
                <p class="p-4">data tidak tersedia</p>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <input type="checkbox" id="filterSurat" class="modal-toggle" wire:model='showFilter' />
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Filter surat</h3>
            <div class="py-4 space-y-3">
                @if ($showFilter)
                    <select wire:model="unit_id" class="select w-full bg-base-200">
                        <option value="">Semua unit</option>
                        @foreach ($units as $unitid => $unitname)
                        <option value="{{ $unitid }}">{{ $unitname }}</option>
                        @endforeach
                    </select>
                    <select wire:model="kat_id" class="select w-full bg-base-200">
                        <option value="">pilih kategori</option>
                        @foreach ($kategories as $katid => $kat)
                        <option value="{{ $katid }}">{{ $kat }}</option>
                        @endforeach
                    </select>
                    <select wire:model="subkat_id" class="select w-full bg-base-200">
                        <option value="">Semua subkategori</option>
                        @foreach ($subkategories as $subkatid => $sub)
                        <option value="{{ $subkatid }}">{{ $sub }}</option>
                        @endforeach
                    </select>
                    <select wire:model="jenis" class="select w-full bg-base-200">
                        <option value="">Semua jenis surat</option>
                        <option value="masuk">Surat masuk</option>
                        <option value="keluar">Surat keluar</option>
                    </select>
                    <input type="text" class="input w-full bg-base-200" placeholder="Perihal">
                    <input type="date" class="input w-full bg-base-200" placeholder="tanggal">
                </tr>
                @endif
            </div>
            <div class="modal-action justify-between">
                <button type="button" class="btn btn-warning" wire:click.prevent="resetFilter">
                    reset filter
                </button>
                <label for="filterSurat" class="btn">Close!</label>
            </div>
        </div>
    </div>
    
</div>
