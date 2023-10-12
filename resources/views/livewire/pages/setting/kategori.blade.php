<div class="fc6">
    <div class="flex justify-between gap-4">
        @livewire('partial.header', [
        "title" => "Pengatuan kategori",
        "subtitle" => "Atur data kategori dan subkategori",
        ])
        <div class="flex gap-2">
            @livewire('partial.kategori.create', ['datas' => $datas])
        </div>
    </div>
    <div>
        <input type="text" class="input" wire:model='cari' placeholder="Cari kategori">
    </div>
    <div class="overflow-x-auto bg-base-100 overflow-hidden rounded-xl shadow">
        <table class="table whitespace-nowrap">
            <thead>
                <th>No</th>
                <th>Kategori</th>
                <th>Sub kategori</th>
                <th>Jumlah surat</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($datas as $number => $data)
                @foreach ($data->subs as $key => $sub)
                <tr>
                    @if ($key === 0)
                    <td rowspan="{{ $data->subs_count }}">{{ $number+1 }}</td>
                    <td rowspan="{{ $data->subs_count }}">
                        <div class="flex flex-col">
                            <div>
                                <button class="btn btn-sm" style="background-color: {{ $data->color }}" wire:click.prevent="$emit('editKat', {{ $data->id }})">
                                    <span>{{ $data->name }}</span>
                                    <x-tabler-edit class="w-4 h-4" />
                                </button>
                            </div>
                        </div>
                    </td>
                    @endif
                    <td>- {{ $sub->name }}</td>
                    <td>{{ $sub->surats->count() }}</td>
                    <td>
                        @can('subkategori.show')
                            <button wire:click.prevent="$emit('showKategori', {{ $sub->id }})" class="btn btn-xs">detail</button>
                        @endcan
                        @can('subkategori.edit')
                            <button wire:click.prevent="$emit('editsub', {{ $sub->id }})" class="btn btn-xs btn-success">edit</button>
                        @endcan
                        @can('subkategori.delete')
                            <button wire:click.prevent='deleteSubkat({{ $sub->id }})' class="btn btn-xs btn-error">delete</button>
                        @endcan
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    
    @livewire('partial.kategori.edit')

    @livewire('partial.kategori.show')
    @livewire('partial.kategori.editsub')
</div>
