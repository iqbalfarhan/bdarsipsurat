<div class="fc6">
    <div class="flex justify-between gap-4">
        @livewire('partial.header', [
            'title' => 'Manual Book',
            'subtitle' => 'Buku panduan dan Video tutorial penggunaan aplikasi'
        ])

        <label class="btn btn-neutral" for="createDokumentasi">
            @livewire('component.icon', ['name' => 'plus'])
            <span class="hidden lg:block">Tambah dokumentasi</span>
        </label>
    </div>
    <div class="flex flex-col lg:flex-row gap-6">
        <ul class="menu bg-base-200 w-80 rounded-box">
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

        <div class="">
            <div class="card bg-base-100 shadow w-full">
                <div class="card-body">
                    <div class="fc6">
                        <div class="flex justify-between">
                            <h3 class="card-title">{{ $judul }}</h3>
                            <button class="btn btn-xs">
                                @livewire('component.icon', ['name' => 'edit'])
                            </button>
                        </div>
                        <article class="prose lg:prose-lg">
                            {!! Str::markdown($text) !!}
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @livewire('pages.dokumentasi.create')
</div>