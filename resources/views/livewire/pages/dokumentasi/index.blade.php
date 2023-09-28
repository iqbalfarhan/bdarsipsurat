<div class="fc6">
    <div class="flex justify-between gap-4">
        @livewire('partial.header', [
            'title' => 'Manual Book',
            'subtitle' => 'Buku panduan dan Video tutorial penggunaan aplikasi'
        ])

        @can('dokumentasi.create')
        <label class="btn btn-neutral" for="createDokumentasi">
            @livewire('component.icon', ['name' => 'plus'])
            <span class="hidden lg:block">Tambah dokumentasi</span>
        </label>
        @endcan
    </div>
    <div class="flex flex-col lg:flex-row gap-6">
        <ul class="menu bg-base-200 w-80 rounded-box gap-6">
            <div>
                <input type="text" class="input w-full" placeholder="pencarian" wire:model='cari'>
            </div>
            <li><button wire:click.prevent='resetText'>Home dokumentasi</button></li>
            @foreach ($datas as $title => $data)
            <li>
                <h2 class="menu-title capitalize">{{ $title }}</h2>
                <ul>
                    @foreach ($data as $item)
                        @can($item->permission)
                        <li><button wire:click.prevent="selectDoc({{ $item->id }})" class="whitespace-pre-wrap">{{ $item->title }}</button></li>
                        @endcan
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>

        <div class="w-full">
            <div class="card bg-base-100 shadow w-full">
                <div class="card-body">
                    <div class="fc6">
                        <div class="flex justify-between">
                            <h3 class="card-title">{{ $selected->title ?? "Selamat datanng di halaman dokumentasi" }}</h3>
                            @can('dokumentasi.edit')
                                @if ($selected)
                                    <button class="btn btn-xs" wire:click.prevent="editDokumentasi">
                                        @livewire('component.icon', ['name' => 'edit'])
                                    </button>
                                @endif
                            @endcan
                        </div>
                        <article class="prose lg:prose-lg">
                            {!! Str::markdown($selected->description ?? $text) !!}

                            <p>link video tutorial : <a href="{{ $selected->video ??  '' }}">{{ $selected->video ??  '' }}</a></p>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('pages.dokumentasi.create')
    @livewire('pages.dokumentasi.edit')
</div>