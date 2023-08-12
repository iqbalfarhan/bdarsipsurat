<div class="flex flex-col gap-6">
    <div class="flex">
        @livewire('partial.kategori.create', ['datas' => $datas])
    </div>
    <div class="card card-compact bg-base-100 w-full">
        <div class="card-body">
            <div class="flex justify-between items-center">
                <div class="form-control">
                    <label class="label cursor-pointer flex gap-2">
                        <input type="checkbox" checked="checked" class="checkbox checkbox-sm" wire:model="showsub" />
                        <span class="label-text">Tampilkan subkategori</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="divider m-0 p-0"></div>
        <div class="card-body">
            <ul class="menu">
                @foreach ($datas as $data)
                    <li>
                        <details {{ $showsub ? 'open' : '' }}>
                            <summary>
                                {{ $data->id }}. {{ $data->name }} - <small>{{ $data->subs_count }} sub</small>
                            </summary>
                            <ul>
                                @foreach ($data->subs as $key => $sub)
                                    <li><a>- {{ $sub->name }}</a></li>
                                @endforeach
                            </ul>
                        </details>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
