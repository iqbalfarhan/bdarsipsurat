<div class="fc6">
    <div class="flex justify-between">
        @livewire('partial.header', [
            "title" => "Pengatuan kategori",
            "subtitle" => "Atur data kategori dan subkategori",
        ])
        <div class="flex gap-2">
            @livewire('partial.kategori.create', ['datas' => $datas])
            <button class="btn btn-primary">
                @livewire('component.icon', ['name' => 'filter'])
            </button>
        </div>
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
                            <td rowspan="{{ $data->subs_count }}">{{ $data->name }}</td>
                        @endif
                        <td>- {{ $sub->name }}</td>
                        <td>{{ $sub->surats->count() }}</td>
                        <td>
                            <button class="btn btn-xs">detail</button>
                            <button class="btn btn-xs btn-success">edit</button>
                            <button class="btn btn-xs btn-error">delete</button>
                        </td>
                    </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</div>
