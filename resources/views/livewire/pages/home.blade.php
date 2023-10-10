<div class="fc6">
    <div class="flex justify-between">
        @livewire('partial.header', [
            'title' => 'Hai, '.auth()->user()->name,
            'subtitle' => 'Selamat datang di aplikasi '. config('app.name') .'.'
        ])
    </div>

    @livewire('component.stats')
    
    <div class="bg-base-100 rounded-xl shadow overflow-hidden">
        <div class="flex flex-wrap w-full m-4">
            @foreach ($kategories as $kategori)
                <a class="btn m-1 {{ $kat == $kategori->id ? "" : "opacity-40" }}" style="background-color: {{ $kategori->color }}" wire:click.prevent="setkat('{{ $kategori->id }}', '{{ $kategori->name }}')">
                    <span>
                        {{ $kategori->name }}
                    </span>
                </a>
            @endforeach
        </div>
        <ul class="menu bg-base-100">
            @if ($sub)
            @foreach ($surats as $suratid => $perihal)
            <li>
                <a
                href="{{ route('detailsurat', $suratid) }}">@livewire('component.icon', ['name' => 'mail'], key(uniqid())){{ Str::limit($perihal, 50) }}</a>
            </li>
            @endforeach
            @elseif ($kat)
            @foreach ($subkategories as $subid => $subname)
            <li>
                <button
                wire:click.prevent="setsub('{{ $subid }}', '{{ $subname }}')">@livewire('component.icon', ['name' => 'folder'], key(uniqid())){{ Str::limit($subname, 50) }}</button>
            </li>
            @endforeach
            @else
            @foreach ($kategories as $katid => $katname)
            <li>
                <button
                wire:click.prevent="setkat('{{ $katid }}', '{{ $katname }}')">@livewire('component.icon', ['name' => 'folder'], key(uniqid())){{ Str::limit($katname, 50) }}</button>
            </li>
            @endforeach
            @endif
        </ul>
    </div>
</div>
