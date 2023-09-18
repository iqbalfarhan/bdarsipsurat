<div class="fc6">
    <div class="flex justify-between">
        @livewire('partial.header', [
            'title' => 'Hai, '.auth()->user()->name,
            'subtitle' => 'Selamat datang di aplikasi '. config('app.name') .'.'
        ])
    </div>

    @livewire('component.stats')
    
    <div class="bg-base-300 rounded-xl overflow-hidden shadow">
        <div class="carousel w-full m-4 mb-0">
            @foreach ($kategories as $katid => $katname)
                <a class="tab tab-lifted tab-lg {{ $kat == $katid ? "tab-active" : "" }}" wire:click.prevent="setkat('{{ $katid }}', '{{ $katname }}')">
                    <span class="whitespace-nowrap">
                        {{ $katname }}
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
